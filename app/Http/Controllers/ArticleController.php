<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Bot;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Telegram;
use App\Models\Topic;
use Illuminate\Support\Facades\Http;
class ArticleController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:article-list', ['only' => ['index']]);
         $this->middleware('permission:article-create', ['only' => ['create','store']]);
         $this->middleware('permission:article-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:article-delete', ['only' => ['question','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Article::query();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $query->orderBy('id', 'desc');
        $perPage = $request->input('length', 10);
        $Article = $query->paginate($perPage)->appends([
            'search' => $request->search,
            'length' => $perPage
        ]);

        return view('admin/article/index', compact('Article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Topic = Topic::latest()->get();
        return view('admin/article/create', compact('Topic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'message_thread_id'       => 'required',
            'photo'       => 'required',
        ]);

        $articleId = Article::create([
            'photo'       => $request->photo ?? '',
            'photo1'       => $request->photo1 ?? '',
            'photo2'       => $request->photo2 ?? '',
            'photo3'       => $request->photo3 ?? '',
            'photo4'       => $request->photo4 ?? '',
            'photo5'       => $request->photo5 ?? '',
            'photo6'       => $request->photo6 ?? '',
            'photo7'       => $request->photo7 ?? '',
            'photo8'       => $request->photo8 ?? '',
            'photo9'       => $request->photo9 ?? '',
            'photo10'      => $request->photo10 ?? '',
            'photo11'      => $request->photo11 ?? '',
            'photo12'      => $request->photo12 ?? '',
            'photo13'      => $request->photo13 ?? '',
            'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'title'       => $request->title,
            'detail'      => $request->detail,
            'detail1'      => $request->detail1,
            'detail2'      => $request->detail2,
            'detail3'      => $request->detail3,
            'detail4'      => $request->detail4,
            'detail5'      => $request->detail5,
            'detail6'      => $request->detail6,
            'detail7'      => $request->detail7,
            'detail8'      => $request->detail8,
            'detail9'      => $request->detail9,
            'detail10'      => $request->detail10,
            'detail11'      => $request->detail11,
            'detail12'      => $request->detail12,
            'detail13'      => $request->detail13,
            'create_by'   => Auth::user()->id,


        ])->id;
        $title = $request->title;
        $message_thread_id = $request->message_thread_id;

        $bot_data = Bot::first();
        $BotIdandToken = $bot_data->token;
        if($BotIdandToken){
        $chat_id = $bot_data->chat_id;
        $name_url = $bot_data->name_url;
        $sponsor = $bot_data->sponsor;
        $create_acc_at = $bot_data->create_acc_at;

        $botBaseUrl = "https://api.telegram.org/bot" . $BotIdandToken . "/sendPhoto";
        $photoUrl = $request->photo;
        $articleUrl = 'https://cf88.news/news/' . urlencode($articleId);
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
        // $botResponse = file_get_contents($botBaseUrl . '?' . http_build_query($queryParams));
        }
        return redirect()->route('article')->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article,$id)
    {
        $Article = Article::whereId($id)->firstOrFail();
        return view('admin/article/edit', compact('Article'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article,$id)
    {
        $article = Article::whereId($id)->first();

        $date = date('Y-m-d H:i:s' , strtotime($request->date));
        $title = $request->title;
           
        //     $bot_data = Bot::first();
        //     $BotIdandToken = $bot_data->bot_id.':'.$bot_data->token;
        //     $chat_id = $bot_data->chat_id;
        //     $name_url = $bot_data->name_url;
        //     $link_url = $bot_data->link_url;
        //     $sponsor = $bot_data->sponsor;
        //     $create_acc_at = $bot_data->create_acc_at;
        //     $url = 'https://share-sport.2m-sport.com/upload/'.$article->photo;
            
        // $bot = file_GET_contents("https://api.telegram.org/bot".$BotIdandToken."/sendPhoto?chat_id=".$chat_id."&photo=https://share-sport.2m-sport.com/upload/".urlencode($article->photo)."&caption=".urlencode($title).'%0A'."<a href='".urlencode($link_url)."'style='color: yellow'>".urlencode($name_url)."</a>".'%0A'.'%0A'.'%0A'.'%0A'.'---------------------------'.'%0A'.'នាំមកជូនដោយ'." : ".urlencode($sponsor).'%0A'.'លីងបង្កើតអាខោន'." ៖ ".urlencode($create_acc_at)."&parse_mode=html");


        $data = [
            'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'photo'    => $request->photo,
            'photo1'    => $request->photo1,
            'photo2'    => $request->photo2,
            'photo3'    => $request->photo3,
            'photo4'    => $request->photo4,
            'photo5'    => $request->photo5,
            'photo6'    => $request->photo6,
            'photo7'    => $request->photo7,
            'photo8'    => $request->photo8,
            'photo9'    => $request->photo9,
            'photo10'    => $request->photo10,
            'photo11'    => $request->photo11,
            'photo12'    => $request->photo12,
            'photo13'    => $request->photo13,

            'title'     => $request->title,
            'detail'   => $request->detail,

            'detail1'      => $request->detail1,
            'detail2'      => $request->detail2,
            'detail3'      => $request->detail3,
            'detail4'      => $request->detail4,
            'detail5'      => $request->detail5,
            'detail6'      => $request->detail6,
            'detail7'      => $request->detail7,
            'detail8'      => $request->detail8,
            'detail9'      => $request->detail9,
            'detail10'      => $request->detail10,
            'detail11'      => $request->detail11,
            'detail12'      => $request->detail12,
            'detail13'      => $request->detail13,
        ];
        // if (!$request->photo) {
        //     $data['photo'] = $article->photo;
        // }
        // elseif ($request->photo) {
        //     File::delete('upload/' .$article->photo);
        //     $photo = time() . '-' . $request->photo->getClientOriginalName();
        //     $request->photo->move('upload', $photo);
        //     $data['photo'] = $photo;
        // }
        // if (!$request->photo1) {
        //     $data['photo1'] = $article->photo1;
        // }
        // elseif ($request->photo1) {
        //     File::delete('upload/' .$article->photo1);
        //     $photo1 = time() . '-' . $request->photo1->getClientOriginalName();
        //     $request->photo1->move('upload', $photo1);
        //     $data['photo1'] = $photo1;
        // }        if (!$request->photo1) {
        //     $data['photo1'] = $article->photo1;
        // }
        // elseif ($request->photo2) {
        //     File::delete('upload/' .$article->photo2);
        //     $photo2 = time() . '-' . $request->photo2->getClientOriginalName();
        //     $request->photo2->move('upload', $photo2);
        //     $data['photo2'] = $photo2;
        // }        if (!$request->photo2) {
        //     $data['photo2'] = $article->photo2;
        // }
        // elseif ($request->photo3) {
        //     File::delete('upload/' .$article->photo3);
        //     $photo3 = time() . '-' . $request->photo3->getClientOriginalName();
        //     $request->photo3->move('upload', $photo3);
        //     $data['photo3'] = $photo3;
        // }        if (!$request->photo3) {
        //     $data['photo3'] = $article->photo3;
        // }
        // elseif ($request->photo4) {
        //     File::delete('upload/' .$article->photo4);
        //     $photo4 = time() . '-' . $request->photo4->getClientOriginalName();
        //     $request->photo4->move('upload', $photo4);
        //     $data['photo4'] = $photo4;
        // }
        // if (!$request->photo5) {
        //     $data['photo5'] = $article->photo5;
        // }
        // elseif ($request->photo5) {
        //     File::delete('upload/' .$article->photo5);
        //     $photo5 = time() . '-' . $request->photo5->getClientOriginalName();
        //     $request->photo5->move('upload', $photo5);
        //     $data['photo5'] = $photo5;
        // }
        // if (!$request->photo6) {
        //     $data['photo6'] = $article->photo6;
        // }
        // elseif ($request->photo6) {
        //     File::delete('upload/' .$article->photo6);
        //     $photo6 = time() . '-' . $request->photo6->getClientOriginalName();
        //     $request->photo6->move('upload', $photo6);
        //     $data['photo6'] = $photo6;
        // }

        // if (!$request->photo7) {
        //     $data['photo7'] = $article->photo7;
        // }
        // elseif ($request->photo7) {
        //     File::delete('upload/' .$article->photo7);
        //     $photo7 = time() . '-' . $request->photo7->getClientOriginalName();
        //     $request->photo7->move('upload', $photo7);
        //     $data['photo7'] = $photo7;
        // }
        // if (!$request->photo8) {
        //     $data['photo8'] = $article->photo8;
        // }
        // elseif ($request->photo8) {
        //     File::delete('upload/' .$article->photo8);
        //     $photo8 = time() . '-' . $request->photo8->getClientOriginalName();
        //     $request->photo8->move('upload', $photo8);
        //     $data['photo8'] = $photo8;
        // }
        // if (!$request->photo9) {
        //     $data['photo9'] = $article->photo9;
        // }
        // elseif ($request->photo9) {
        //     File::delete('upload/' .$article->photo9);
        //     $photo9 = time() . '-' . $request->photo9->getClientOriginalName();
        //     $request->photo9->move('upload', $photo9);
        //     $data['photo9'] = $photo9;
        // }
        // if (!$request->photo10) {
        //     $data['photo10'] = $article->photo10;
        // }
        // elseif ($request->photo10) {
        //     File::delete('upload/' .$article->photo10);
        //     $photo10 = time() . '-' . $request->photo10->getClientOriginalName();
        //     $request->photo10->move('upload', $photo10);
        //     $data['photo10'] = $photo10;
        // }
        // if (!$request->photo11) {
        //     $data['photo11'] = $article->photo11;
        // }
        // elseif ($request->photo11) {
        //     File::delete('upload/' .$article->photo11);
        //     $photo11 = time() . '-' . $request->photo11->getClientOriginalName();
        //     $request->photo11->move('upload', $photo11);
        //     $data['photo11'] = $photo11;
        // }
        // if (!$request->photo12) {
        //     $data['photo12'] = $article->photo12;
        // }
        // elseif ($request->photo12) {
        //     File::delete('upload/' .$article->photo12);
        //     $photo12 = time() . '-' . $request->photo12->getClientOriginalName();
        //     $request->photo12->move('upload', $photo12);
        //     $data['photo12'] = $photo12;
        // }
        // if (!$request->photo13) {
        //     $data['photo13'] = $article->photo13;
        // }
        // elseif ($request->photo13) {
        //     File::delete('upload/' .$article->photo13);
        //     $photo13 = time() . '-' . $request->photo13->getClientOriginalName();
        //     $request->photo13->move('upload', $photo13);
        //     $data['photo13'] = $photo13;
        // }
        $article->update($data);
        
        return redirect()->route('article')->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */

     public function question($id)
     {
         alert()->question('Delete Article !', 'Are you sure?')
         ->showConfirmButton('<a href="/article/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()
         ->showCancelButton('Back', '#aaa')->reverseButtons();
 
         return redirect('/article');
     }
     public function destroy($id)
     {
         $Article = Article::whereId($id)->firstOrFail();
         File::delete('upload' . $Article->photo);
         File::delete('upload' . $Article->photo1);
         File::delete('upload' . $Article->photo2);
         File::delete('upload' . $Article->photo3);
         File::delete('upload' . $Article->photo4);
         File::delete('upload' . $Article->photo5);
         File::delete('upload' . $Article->photo6);
         File::delete('upload' . $Article->photo7);
         File::delete('upload' . $Article->photo8);
         File::delete('upload' . $Article->photo9);
         File::delete('upload' . $Article->photo10);
         File::delete('upload' . $Article->photo11);
         File::delete('upload' . $Article->photo12);
         File::delete('upload' . $Article->photo13);
         $Article->delete();
         Alert::success('Successful', 'Article is Deleted');
         return redirect('/article');
     }
     public function View($id)
     {
            $article = Article::whereId($id)->first();
            $data=[
                'id'           => $article->id,
                'title'        => $article->title,
                'description'  => $article->detail,
                'image'        => 'https://sharesport.news/upload/'.$article->photo,
                'url'          => 'https://sharesport.news/article/'.$article->id,
            ];
            $shareComponent = \Share::page(
                'https://sharesport.news/article/'.$article->id,
                $data['title'],
            )
            ->facebook();
            // ->linkedin()
            // ->telegram();
            // ->whatsapp()        
            // ->reddit();
            return view('admin/article/view', compact('data','shareComponent'));
     }
}

