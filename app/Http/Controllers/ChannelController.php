<?php
namespace App\Http\Controllers;
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
class ChannelController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:channel-list', ['only' => ['index']]);
         $this->middleware('permission:channel-create', ['only' => ['create','store']]);
         $this->middleware('permission:channel-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:channel-delete', ['only' => ['question','destroy']]);
    }
    public function index(Request $request)
    {
        // $Channel = Channel::latest()->get();
        // return view('admin/channel/index', compact('Channel'));
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
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'video'       => 'required',
    //         'title'       => 'required',
    //         'photo'       => 'required',
    //         'category'       => 'required',
    //     ]);

    //     $id = Channel::create([
    //         // 'video'       => $video ?? '',
    //         'video'      => $request->video,
    //         'photo'      => $request->photo,
    //         // 'photo'       => $photo ?? '',
    //         'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
    //         'title'       => $request->title,
    //         'category'    => $request->category,
    //         'detail'      => $request->detail,
    //         'create_by'   => Auth::user()->id,
    //     ])->id;
    //     $title = $request->title;
    //     $bot_data = Bot::first();
    //     $BotIdandToken = $bot_data->token;
    //     $chat_id = $bot_data->chat_id;
    //     $name_url = $bot_data->name_url;
    //     $sponsor = $bot_data->sponsor;
    //     $create_acc_at = $bot_data->create_acc_at;

    //     $botBaseUrl = "https://api.telegram.org/bot" . $BotIdandToken . "/sendPhoto";
    //     $photoUrl = $request->photo;
    //     $articleUrl = $request->getSchemeAndHttpHost() . '/channels/' . urlencode($id);
    //     $sponsorUrl = $request->getSchemeAndHttpHost();
    //     $caption = $title . "\n"
    //         . "[" . $name_url . "](" . $articleUrl . ")" . "\n"
    //         . '---------------------------' . "\n"
    //         . 'នាំមកជូនដោយ' . " : [" . $sponsor . "](" . $sponsorUrl . ")" ;
    //         // . 'លីងបង្កើតអាខោន' . " : " . $create_acc_at;
    //     $queryParams = [
    //         'chat_id'    => $chat_id,
    //         'photo'      => $photoUrl,
    //         'caption'    => $caption,
    //         'parse_mode' => 'Markdown'
    //     ];

    //     $botResponse = file_get_contents($botBaseUrl . '?' . http_build_query($queryParams));

    //     Alert::success('Create Channel Successful');
    //     return redirect('/channel');
    // }
    public function store(Request $request)
    {
        // Validate required inputs
        $request->validate([
            'video'    => 'required',
            'message_thread_id'       => 'required',
            'title'    => 'required',
            'photo'    => 'required',
            'category' => 'required',
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

        $bot_data = Bot::first();
        $token = $bot_data->token;
        $chat_id = $bot_data->chat_id;
        $name_url = $bot_data->name_url;
        $sponsor = $bot_data->sponsor;
        $create_acc_at = $bot_data->create_acc_at;

        // Telegram API base URL
        $botBaseUrl = "https://api.telegram.org/bot{$token}/sendPhoto";

        // Caption and article links
        $photoUrl = $request->photo;
        $articleUrl = 'https://cf88.news/channels/' . urlencode($id);
        $sponsorUrl = 'https://cf88.news';
        $title = $request->title;

        // Markdown-formatted caption
        $caption = $title . "\n"
            . "[" . $name_url . "](" . $articleUrl . ")" . "\n"
            . "---------------------------\n"
            . "នាំមកជូនដោយ : [" . $sponsor . "](" . $sponsorUrl . ")";

        // Send Telegram photo
        $queryParams = [
            'chat_id'    => $chat_id,
            'message_thread_id' => $message_thread_id,
            'photo'      => $photoUrl,
            'caption'    => $caption,
            'parse_mode' => 'Markdown'
        ];

        // Handle Telegram API errors
        $response = Http::get($botBaseUrl, $queryParams);
        if ($response->failed()) {
            \Log::error('Telegram API error:', ['response' => $response->body()]);
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
