<?php

namespace App\Http\Controllers;

use App\Models\Fight;
use App\Models\Category;
use App\Models\Bot;
use App\Models\Topic;
use App\Jobs\BroadcastFightToSubscribers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FightController extends Controller
{
        private function deactivateOtherFights($exceptId = null)
    {
        Fight::where('status', 1)
            ->when($exceptId, fn($q) => $q->where('id', '!=', $exceptId))
            ->update(['status' => 0]);
    }
    // List fights with search & filter
    public function index(Request $request)
    {
        $query = Fight::with('category');

        // Search by fighter name (Red or Blue)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('red_fighter', 'like', "%{$search}%")
                  ->orWhere('blue_fighter', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by date range
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ]);
        }

        $query->orderBy('id', 'desc');

        $perPage = $request->input('length', 10);
        $fights = $query->paginate($perPage)->appends([
            'search' => $request->search,
            'length' => $perPage,
            'category_id' => $request->category_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        $categories = Category::where('status', 0)->orderBy('row')->get();

        return view('admin.fights.index', compact('fights', 'categories'));
    }

    // Show create form
    public function create()
    {
        $categories = Category::where('status', 0)->orderBy('row')->get();
        $Topic = Topic::latest()->get();
        return view('admin.fights.create', compact('categories', 'Topic'));
    }

    // Store new fight
    public function store(Request $request)
    {
        $request->validate([
            'no'            => 'required',
            'red_fighter'   => 'required',
            'blue_fighter'  => 'required',
            'category_id'   => 'required|exists:category,id',
        ]);

        // Create fight
        $fight = Fight::create([
            'no'              => $request->no,
            'category_id'     => $request->category_id,
            'red_fighter'     => $request->red_fighter,
            'red_image'       => $request->red_image ?? '',
            'red_score'       => $request->red_score ?? 0,
            'blue_fighter'    => $request->blue_fighter,
            'blue_image'      => $request->blue_image ?? '',
            'blue_score'      => $request->blue_score ?? 0,
            'thumbnail_link'  => $request->thumbnail_link ?? '',
            'status'          => 0,
        ]);

        // Get all configured Telegram bots
        $bots = Bot::all();

        if ($bots->isEmpty()) {
            Log::warning(
                'Fight created but no bots configured; nothing posted or broadcast.',
                ['fight_id' => $fight->id]
            );
        }

        foreach ($bots as $bot_data) {

            $token    = $bot_data->token;
            $chat_id  = $bot_data->chat_id;
            $name_url = $bot_data->name_url;
            $link_url = $bot_data->link_url;
            $sponsor  = $bot_data->sponsor;
            $telegram = $bot_data->telegram;

            // Fight title
            $title = $request->red_fighter . ' VS ' . $request->blue_fighter;

            // Image
            $photoUrl = $request->thumbnail_link;

            // Fight page URL
            $articleUrl = rtrim($link_url, '/') . '/fights/' . urlencode($fight->id);

            // Sponsor URL
            $sponsorUrl = $link_url;
            $group= 'Group';

            // Telegram caption
            $caption = $title . "\n"
                . "[" . $name_url . "](" . $articleUrl . ")\n"
                . "---------------------------\n"
                . "នាំមកជូនដោយ : [" . $sponsor . "](" . $sponsorUrl . ")\n"
                . "Telegram : [" . $group . "](" . $telegram . ")";

            // Send photo to Telegram
            $response = Http::post(
                "https://api.telegram.org/bot{$token}/sendPhoto",
                [
                    'chat_id'    => $chat_id,
                    'photo'      => $photoUrl,
                    'caption'    => $caption,
                    'parse_mode' => 'Markdown',
                ]
            );

            if ($response->failed()) {
                Log::error('Telegram API error', [
                    'bot_id'   => $bot_data->id,
                    'chat_id'  => $chat_id,
                    'response' => $response->body(),
                ]);
            }

            // Broadcast the fight to subscribers
            BroadcastFightToSubscribers::dispatch(
                $caption,
                $photoUrl,
                $bot_data->id
            );
        }

        Alert::success('Success', 'Fight created successfully.');

        return redirect()->route('fights');
    }
        public function setActive($id)
    {
        $fight = Fight::findOrFail($id);

        $this->deactivateOtherFights($id);

        $fight->status = 1;
        $fight->save();

        Alert::success('Success', 'Fight set as the current active fight.');
        return redirect()->route('fights');
    }

    // Show edit form
    public function edit($id)
    {
        $fight = Fight::findOrFail($id);
        $categories = Category::where('status', 0)->orderBy('row')->get();
        return view('admin.fights.edit', compact('fight', 'categories'));
    }

    // Update fight
    public function update(Request $request, $id)
    {
        $fight = Fight::findOrFail($id);
        $fight->timestamps = false; 
        $request->validate([
            'no' => 'required',
            'red_fighter' => 'required',
            'blue_fighter' => 'required',
            'category_id' => 'required|exists:category,id',
        ]);
        if ($request->created_at) {
            $created_at = date('Y-m-d H:i:s', strtotime($request->created_at));
        } else {
            $created_at = $fight->created_at;
        }
        // $status = $request->status ?? 1;

        // if ($status == 1) {
        //     $this->deactivateOtherFights($id);
        // }

        $fight->update([
            'no'          => $request->no,
            'created_at'  => $created_at,
            'category_id' => $request->category_id,
            'red_fighter' => $request->red_fighter,
            'red_image'   => $request->red_image ?? '',
            'red_score'   => $request->red_score ?? 0,
            'blue_fighter'=> $request->blue_fighter,
            'blue_image'  => $request->blue_image ?? '',
            'blue_score'  => $request->blue_score ?? 0,
            'thumbnail_link' => $request->thumbnail_link ?? '',
            'status'      => 0,
        ]);

        Alert::success('Success', 'Fight updated successfully.');
        return redirect()->route('fights');
    }

    // Delete fight
    public function destroy($id)
    {
        $fight = Fight::findOrFail($id);
        $fight->delete();

        Alert::success('Success', 'Fight deleted successfully.');
        return redirect()->route('fights');
    }

    // Bulk delete selected fights
    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            Alert::error('Failed', 'No Fight selected');
            return redirect()->route('fights');
        }

        Fight::whereIn('id', $ids)->delete();

        Alert::success('Success', count($ids) . ' Fight(s) deleted successfully.');
        return redirect()->route('fights');
    }

    // Delete fights older than 1 or 3 months (keeps status=1 active fight untouched only if not in range; still deletes if old)
    public function deleteOld($months)
    {
        $months = (int) $months;
        if (!in_array($months, [1, 3])) {
            Alert::error('Failed', 'Invalid period');
            return redirect()->route('fights');
        }

        $cutoff = now()->subMonths($months);

        $count = Fight::where('created_at', '<', $cutoff)->delete();

        Alert::success('Success', $count . ' Fight(s) older than ' . $months . ' month(s) deleted.');
        return redirect()->route('fights');
    }
}