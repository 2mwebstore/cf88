<?php
namespace App\Http\Controllers;
use App\Jobs\BroadcastChannelToSubscribers;
use App\Models\Category;
use App\Models\Telegram;
use App\Models\Channel;
use App\Models\Bot;
use App\Models\Topic;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class ChannelController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:channel-list', ['only' => ['index']]);
         $this->middleware('permission:channel-create', ['only' => ['create','store']]);
         $this->middleware('permission:channel-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:channel-delete', ['only' => ['question','destroy','bulkDestroy','deleteOld']]);
    }
    public function index(Request $request)
    {
        $query = Channel::query();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $query->orderBy('id', 'desc');
        $perPage = $request->input('length', 10);
        $Channel = $query->paginate($perPage)->appends([
            'search' => $request->search,
            'length' => $perPage
        ]);

        return view('admin/channel/index', compact('Channel'));
    }
    public function create()
    {
        $category = Category::select('id', 'name')->get();
        $Topic = Topic::latest()->get();
        return view('admin/channel/create', compact('category','Topic'));
    }
    public function store(Request $request)
    {
        // Validate required inputs
        $request->validate([
            'video'             => 'required',
            'message_thread_id' => 'required',
            'title'             => 'required',
            'photo'             => 'required',
            'category'          => 'required',
        ]);

        // Create channel and retrieve its ID
        $id = Channel::create([
            'video'     => $request->video,
            'photo'     => $request->photo,
            'date'      => date('Y-m-d H:i:s', strtotime($request->date)),
            'title'     => $request->title,
            'category'  => $request->category,
            'detail'    => $request->detail,
            'create_by' => Auth::id(),
        ])->id;

        // Prepare Telegram bot data
        $message_thread_id = $request->message_thread_id;

        $bots = Bot::all();
        if ($bots->isEmpty()) {
            Log::error('Channel created but no bots configured; nothing posted or broadcast.', ['channel_id' => $id]);
        }

        foreach ($bots as $bot_data) {
            $botToken = $bot_data->token;
            $chat_id  = $bot_data->chat_id;
            $name_url = $bot_data->name_url;
            $link_url = $bot_data->link_url;
            $sponsor  = $bot_data->sponsor;
            $telegram = $bot_data->telegram;

            // Caption and article links
            $videoUrl   = $request->video;
            $photoUrl   = $request->photo;
            $articleUrl = $link_url . '/channels/' . urlencode($id);
            $sponsorUrl = $link_url;
            $title      = $request->title;

            // Markdown-formatted caption
            $caption = $title . "\n"
                . "[" . $name_url . "](" . $articleUrl . ")" . "\n"
                . "---------------------------\n"
                . "នាំមកជូនដោយ : [" . $sponsor . "](" . $sponsorUrl . ")" . "\n"
                . "Telegram : [" . $name_url . "](" . $telegram . ")";

            $common = [
                'chat_id'           => $chat_id,
                'message_thread_id' => $message_thread_id,
                'caption'           => $caption,
                'parse_mode'        => 'Markdown',
            ];

            // 1) Post the video to this bot's group topic. Telegram fetches the .mp4 by URL
            //    (direct link, <= 20 MB). If that fails, fall back to the photo.
            $response = Http::post("https://api.telegram.org/bot{$botToken}/sendVideo", $common + [
                'video'              => $videoUrl,
                'thumbnail'          => $photoUrl,
                'supports_streaming' => true,
            ]);

            // Reuse this bot's own Telegram file_id for its broadcast so the file is not
            // re-downloaded once per subscriber. A file_id from one bot cannot be used by
            // another bot's token, so this must be fetched fresh per bot.
            $broadcastVideo = $videoUrl;

            if ($response->successful()) {
                $broadcastVideo = $response->json('result.video.file_id') ?: $videoUrl;
            } else {
                Log::warning('Telegram sendVideo failed, falling back to sendPhoto', ['bot_id' => $bot_data->id, 'response' => $response->body()]);
                $response = Http::post("https://api.telegram.org/bot{$botToken}/sendPhoto", $common + ['photo' => $photoUrl]);
                if ($response->failed()) {
                    Log::error('Telegram API error:', ['bot_id' => $bot_data->id, 'response' => $response->body()]);
                }
            }

            // 2) Send the same video to every user who has started this bot (queued).
            BroadcastChannelToSubscribers::dispatch($caption, $broadcastVideo, $photoUrl, $bot_data->id);
        }

        Alert::success('Create Channel Successful');
        return redirect('/channel');
    }
    public function question($id)
    {
        alert()->question('Delete Channel !', 'Are you sure?')
        ->showConfirmButton('<a href="/channel/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()
        ->showCancelButton('Back', '#aaa')->reverseButtons();

        return redirect('/channel');
    }
    public function destroy($id)
    {
        $channel = channel::select('photo', 'id')->whereId($id)->firstOrFail();
        File::delete('upload' . $channel->photo);
        $channel->delete();
        Alert::success('Successful', 'Channel is Deleted');
        return redirect('/channel');
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            Alert::error('Failed', 'No Channel selected');
            return redirect('/channel');
        }

        $channels = Channel::select('id', 'photo')->whereIn('id', $ids)->get();

        foreach ($channels as $channel) {
            File::delete('upload' . $channel->photo);
        }

        Channel::whereIn('id', $ids)->delete();

        Alert::success('Successful', count($ids) . ' Channel(s) Deleted');
        return redirect('/channel');
    }

    public function deleteOld($months)
    {
        $months = (int) $months;
        if (!in_array($months, [1, 3])) {
            Alert::error('Failed', 'Invalid period');
            return redirect('/channel');
        }

        $cutoff = now()->subMonths($months);

        $channels = Channel::select('id', 'photo')->where('date', '<', $cutoff)->get();

        foreach ($channels as $channel) {
            File::delete('upload' . $channel->photo);
        }

        $count = Channel::where('date', '<', $cutoff)->delete();

        Alert::success('Successful', $count . ' Channel(s) older than ' . $months . ' month(s) deleted');
        return redirect('/channel');
    }
    public function show(Channel $Channel)
    {
        //
    }
    public function edit(Channel $channel , $id)
    {
        $category = Category::select('id', 'name')->get();
        $channel = Channel::whereId($id)->firstOrFail();
        return view('admin/channel/edit', compact('category','channel'));
    }
    public function update(Request $request, Channel $Channel ,$id)
    {
        $Channel = Channel::select('photo','video', 'id')->whereId($id)->first();
        $request->validate([
            'video'       => 'required',
            'title'       => 'required',
            'photo'       => 'required',
            'category'       => 'required',
        ]);
        $data = [
            'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'category' => $request->category,
            'photo'    => $request->photo,
            'video'    => $request->video,
            'title'    => $request->title,
            'detail'   => $request->detail,
        ];
        $Channel->update($data);
        Alert::success('Successful', 'Channel is Edited');
        return redirect('/channel');
    }
}