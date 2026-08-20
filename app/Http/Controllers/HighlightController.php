<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Highlight;
use App\Models\Bot;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Telegram;
use App\Models\Topic;
use Illuminate\Support\Facades\Http;
class HighlightController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:highlight-list', ['only' => ['index']]);
         $this->middleware('permission:highlight-create', ['only' => ['create','store']]);
         $this->middleware('permission:highlight-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:highlight-delete', ['only' => ['question','destroy']]);
    }
    public function index(Request $request)
    {
        // $Highlight = Highlight::orderBy('id', 'desc')->get();
        $query = Highlight::query();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $query->orderBy('id', 'desc');
        $perPage = $request->input('length', 10);
        $Highlight = $query->paginate($perPage)->appends([
            'search' => $request->search,
            'length' => $perPage
        ]);

        return view('admin/highlight/index', compact('Highlight'));
    }
    public function create()
    {
        $category = Category::select('id', 'name')->get();
        $Topic = Topic::latest()->get();
        return view('admin/highlight/create', compact('category','Topic'));
    }
    public function store(Request $request)
    {
       $request->validate([
            'video'       => 'required',
            'message_thread_id'       => 'required',
            'title'       => 'required',
            'photo'       => 'required',
        ]);
        
        $id =  Highlight::create([
            // 'video'       => $video ?? '',
            'video'      => $request->video,
            'photo'      => $request->photo,
            // 'photo'       => $photo ?? '',
            'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'title'       => $request->title,
            'detail'      => $request->detail,
            'create_by'   => Auth::user()->id,
        ])->id;
        $title = $request->title;
        $message_thread_id = $request->message_thread_id;

        $bot_data = Bot::first();
        $BotIdandToken = $bot_data->token;
        $chat_id = $bot_data->chat_id;
        $name_url = $bot_data->name_url;
        $sponsor = $bot_data->sponsor;
        $create_acc_at = $bot_data->create_acc_at;

        $botBaseUrl = "https://api.telegram.org/bot" . $BotIdandToken . "/sendPhoto";
        $photoUrl = $request->photo;
        $articleUrl = 'https://cf88.news/highlights/' . urlencode($id);
        $sponsorUrl = 'https://cf88.news';
        $caption = $title . "\n"
            . "[" . $name_url . "](" . $articleUrl . ")" . "\n"
            . '---------------------------' . "\n"
            . 'នាំមកជូនដោយ' . " : [" . $sponsor . "](" . $sponsorUrl . ")" ;
            // . 'លីងបង្កើតអាខោន' . " : " . $create_acc_at;
        $queryParams = [
            'chat_id'    => $chat_id,
            'message_thread_id' => $message_thread_id,
            'photo'      => $photoUrl,
            'caption'    => $caption,
            'parse_mode' => 'Markdown'
        ];

        $response = Http::get($botBaseUrl, $queryParams);
        if ($response->failed()) {
            \Log::error('Telegram API error:', ['response' => $response->body()]);
        }

        Alert::success('Create HighLight Successful');
        return redirect('/highlight');
    }

    public function question($id)
    {
        alert()->question('Delete HighLight !', 'Are you sure?')
        ->showConfirmButton('<a href="/highlight/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()
        ->showCancelButton('Back', '#aaa')->reverseButtons();

        return redirect('/highlight');
    }
    public function destroy($id)
    {
        $Highlight = Highlight::select('photo', 'id')->whereId($id)->firstOrFail();
        File::delete('upload' . $Highlight->photo);
        $Highlight->delete();
        Alert::success('Successful', 'HighLight is Deleted');
        return redirect('/highlight');
    }
    public function show(Highlight $highlight)
    {
        //
    }
    public function edit(Highlight $highlight , $id)
    {
        $category = Category::select('id', 'name')->get();
        $highlight = Highlight::whereId($id)->firstOrFail();
        return view('admin/highlight/edit', compact('category','highlight'));
    }
    public function update(Request $request, Highlight $highlight ,$id)
    {
        $Highlight = Highlight::select('photo','video', 'id')->whereId($id)->first();
        $request->validate([
            'video'       => 'required',
            'title'       => 'required',
            'photo'       => 'required',
        ]);
        $data = [
            'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'photo'    => $request->photo,
            'video'    => $request->video,
            'title'    => $request->title,
            'detail'   => $request->detail,
        ];
        $Highlight->update($data);
        Alert::success('Successful', 'HighLight is Edited');
        return redirect('/highlight');
    }
}
