<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Arr;
use Auth;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Highlight;
use App\Models\Livestream;
use App\Models\Category;
use App\Models\Social;
use App\Models\Channel;
use App\Models\Newsfeed;
use App\Models\Fight;
use App\Models\Video;
class ClientController extends Controller
{
    public function index()
    {
        $Channel = Channel::latest()->limit(9)->get();
        $Newsfeed = Newsfeed::latest()->limit(9)->get();
        $Article = Article::latest()->limit(9)->get();
        $Highlight = Highlight::latest()->limit(9)->get();
        $Category = Category::get();
        foreach ($Category as $roll => $row) {
            $data[]=[
                'data' =>   Channel::where('category',$row->id)->latest()->limit(8)->get(),
                'category_name' =>   $row->name,
            ];
        }
        $Highlights = $data ?? [];
        $Banner = Banner::first();
        $ChannelByCategory = Channel::join('category', 'channel.category', '=', 'category.id')
        ->select('category.id as category_id', 'category.name as category_name')
        ->where('category.status', 0)
        ->groupBy('category.id', 'category.name')
        ->orderBy('category.row', 'asc')
        ->get();
        $ChannelsPlay = Channel::latest()->first();
        return view('client.view.dashboard', compact('Channel','Newsfeed','Article','ChannelsPlay','Category','Highlight','Highlights','Banner','ChannelByCategory'));
    }
    public function listfight(Request $request)
    {
        // Get filters from request
        $category_id = $request->get('category_id', null);
        $start_date  = $request->get('start_date', date('Y-m-d'));
        $end_date    = $request->get('end_date', date('Y-m-d'));

        // Get categories that have fights
        $ByCategory = Fight::join(
            'category',
            'fights.category_id',
            '=',
            'category.id'
        )
        ->select(
            'fights.category_id as category_id',
            'category.name as category_name'
        )
        ->groupBy(
            'fights.category_id',
            'category.name',
            'category.row'
        )
        ->orderBy('category.row', 'asc');

        // Base query for fights
        $fightsQuery = Fight::with('category')
            ->where('status', 1);

        // Filter by category
        if (!empty($category_id)) {
            $fightsQuery->where('category_id', $category_id);
        }

        // Filter by date range
        if ($start_date && $end_date) {
            $fightsQuery->whereBetween('created_at', [
                $start_date . ' 00:00:00',
                $end_date . ' 23:59:59'
            ]);

            $ByCategory->whereBetween('fights.created_at', [
                $start_date . ' 00:00:00',
                $end_date . ' 23:59:59'
            ]);
        }

        // Get fights
        $fights = $fightsQuery
            ->orderBy('id', 'desc')
            ->get();

        $groupedFights = $fights;

        // Get categories
        $ChannelByCategory = $ByCategory->get();

        return view('client.view.listfight', compact(
            'groupedFights',
            'ChannelByCategory',
            'category_id',
            'start_date',
            'end_date'
        ));
    }

    public function livestreams()
    {
        // $Livestream = Livestream::latest()->paginate(10);
        $telegram = Social::where('category','0')->first();
        $facebook = Social::where('category','1')->first();
        return view('client.view.livestreams', compact('facebook','telegram'));
    }
    public function livestreamsDetail($id,Request $request)
    {
        $Livestream = Livestream::whereId($id)->get();
        $livestream = Livestream::whereId($id)->firstOrFail();
        $telegram = Social::where('category','0')->first();
        $facebook = Social::where('category','1')->first();
        $Facebook = \Share::page($request->getSchemeAndHttpHost().'/livestreams/'.$id.'',$livestream->title,)->facebook()->twitter()->telegram();
        return view('client.view.livestreams-detail', compact('Livestream','facebook','telegram'));
    }
    public function news()
    {
        $Article = Article::latest()->paginate(10);
        $telegram = Social::where('category','0')->first();
        $facebook = Social::where('category','1')->first();
        return view('client.view.news', compact('Article','facebook','telegram'));
    }
    public function NewsDetail($id,Request $request)
    {
        $Article = Article::whereId($id)->get();
        $article = Article::whereId($id)->first();
        if ($article) {
            $article->view++;
            $article->save();
        }
        $telegram = Social::where('category','0')->first();
        $facebook = Social::where('category','1')->first();
        $data=[
            'id'           => $article->id,
            'title'        => $article->title,
            'description'  => $article->detail,
            'image'        => $article->photo,
            'url'          => $request->getSchemeAndHttpHost().'/news/'.$article->id,
        ];
        $Facebook = \Share::page(
            $request->getSchemeAndHttpHost().'/news/'.$article->id,
            $data['title'],
        )->facebook()->telegram();
        return view('client.view.news-detail', compact('Article','data','Facebook','article','facebook','telegram'));
    }
    public function newsfeed()
    {
        $Article = Newsfeed::select('newsfeed.*', 'users.photo as photoauth', 'users.name', 'users.id as authid')
        ->join('users', 'newsfeed.create_by', '=', 'users.id')
        ->latest('newsfeed.created_at')
        ->paginate(10);
        $telegram = Social::where('category','0')->first();
        $facebook = Social::where('category','1')->first();
        if (Auth::check() && Auth::user()->total_post >= Auth::user()->limit_post) {
            $status_post = false;
        } else {
            $status_post = true;
        }
      
        return view('client.view.newsfeed', compact('Article','facebook','telegram','status_post'));
    }
    public function NewsfeedDetail($id,Request $request)
    {
        // $Article = Newsfeed::whereId($id)->get();
        $Article = Newsfeed::where('newsfeed.id', $id)->select('newsfeed.*', 'users.photo as photoauth', 'users.name', 'users.id as authid')
        ->join('users', 'newsfeed.create_by', '=', 'users.id')->get();
        $article = Newsfeed::whereId($id)->first();
        if ($article) {
            $article->view++;
            $article->save();
        }
        $telegram = Social::where('category','0')->first();
        $facebook = Social::where('category','1')->first();
        $data=[
            'id'           => $article->id,
            'title'        => $article->title,
            'description'  => $article->detail,
            'image'        => $article->photo,
            'url'          => $request->getSchemeAndHttpHost().'/feeds/'.$article->id,
        ];
        $Facebook = \Share::page(
            $request->getSchemeAndHttpHost().'/feeds/'.$article->id,
            $data['title'],
        )->facebook()->telegram();
        return view('client.view.newsfeed-detail', compact('Article','data','Facebook','article','facebook','telegram'));
    }
    public function channels(Request $request)
    {
        $telegram = Social::where('category','0')->first();
        $facebook = Social::where('category','1')->first();
        $ChannelByCategory = Channel::join('category', 'channel.category', '=', 'category.id')
        ->select('category.id as category_id', 'category.name as category_name')
        ->where('category.status', 0)
        ->groupBy('category.id', 'category.name')
        ->orderBy('category.row', 'asc')
        ->get();
        if ($request->has('params')) {
                $Channels = [];
                $ListChannel = Channel::where('category',$request->input('category'))->latest()->limit(8)->get();
                $ChannelsPlay = Channel::where('category',$request->input('category'))->latest()->first();
            return view('client.view.channels', compact('Channels','facebook','telegram','ChannelsPlay','ListChannel','ChannelByCategory'));
        } else {
                $ListChannel = Channel::latest()->limit(8)->get();
                $Channels = Channel::latest()->paginate(10);
                $ChannelsPlay = Channel::latest()->first();
            return view('client.view.channels', compact('Channels','facebook','telegram','ChannelsPlay','ListChannel','ChannelByCategory'));
        }
    }
    public function ChannelByCategory(Request $request,$id){
        $telegram = Social::where('category','0')->first();
        $facebook = Social::where('category','1')->first();
        $ListChannel = Channel::where('category',$id)->latest()->limit(8)->get();
        $ChannelsPlay = Channel::where('category',$id)->latest()->first();
        $ChannelByCategory = Channel::join('category', 'channel.category', '=', 'category.id')
        ->select('category.id as category_id', 'category.name as category_name')
        ->where('category.status', 0)
        ->groupBy('category.id', 'category.name')
        ->orderBy('category.row', 'asc')
        ->get();
        $data=[
            'id'           => $ChannelsPlay->id,
            'title'        => $ChannelsPlay->title,
            'description'  => $ChannelsPlay->detail,
            'image'        => $ChannelsPlay->photo,
            'url'          => $request->getSchemeAndHttpHost().'/channels/'.$ChannelsPlay->id,
        ];
        $FacebookTelegram = \Share::page(
            $request->getSchemeAndHttpHost().'/channels/'.$ChannelsPlay->id,
            $data['title'],
        )->facebook()->telegram();
        return view('client.view.channel_id', compact('data','facebook','FacebookTelegram','telegram','ChannelsPlay','ListChannel','ChannelByCategory','id'));
    }
    public function ChannelsDetail($id,Request $request)
    {
        $Channel = Channel::whereId($id)->get();
        $channel = Channel::whereId($id)->first();
        // $ListChannel = Channel::inRandomOrder()->limit(8)->get();
        $ListChannel = Channel::where('id', '!=', $id)
        ->orderBy('id', 'desc')
        ->take(8)
        ->get();
        if ($channel) {
            $channel->view++;
            $channel->save();
        }
        $telegram = Social::where('category','0')->first();
        $facebook = Social::where('category','1')->first();
        $data=[
            'id'           => $channel->id,
            'title'        => $channel->title,
            'description'  => $channel->detail,
            'image'        => $channel->photo,
            'url'          => $request->getSchemeAndHttpHost().'/channels/'.$channel->id,
        ];
        $Facebook = \Share::page(
            $request->getSchemeAndHttpHost().'/channels/'.$channel->id,
            $data['title'],
        )->facebook()->telegram();
        return view('client.view.channels-detail', compact('Channel','data','Facebook','facebook','telegram','ListChannel'));
    }
    public function highlights(Request $request)
    {
        $telegram = Social::where('category','0')->first();
        $facebook = Social::where('category','1')->first();
        if ($request->has('params')) {
                $Highlights = [];
                $ListHighlight = Highlight::where('category',$request->input('category'))->latest()->limit(8)->get();
                $HighlightsPlay = Highlight::where('category',$request->input('category'))->latest()->first();
            return view('client.view.highlights', compact('Highlights','facebook','telegram','HighlightsPlay','ListHighlight'));
        } else {
                $ListHighlight = Highlight::latest()->limit(8)->get();
                $Highlights = Highlight::latest()->paginate(10);
                $HighlightsPlay = Highlight::latest()->first();
            return view('client.view.highlights', compact('Highlights','facebook','telegram','HighlightsPlay','ListHighlight'));
        }
    }
    public function HighlightsDetail($id,Request $request)
    {
        $Highlight = Highlight::whereId($id)->get();
        $highlight = Highlight::whereId($id)->first();
        $ListHighlight = Highlight::inRandomOrder()->limit(8)->get();
        if ($highlight) {
            $highlight->view++;
            $highlight->save();
        }
        $telegram = Social::where('category','0')->first();
        $facebook = Social::where('category','1')->first();
        $data=[
            'id'           => $highlight->id,
            'title'        => $highlight->title,
            'description'  => $highlight->detail,
            'image'        => $highlight->photo,
            'url'          => $request->getSchemeAndHttpHost().'/highlights/'.$highlight->id,
        ];
        $Facebook = \Share::page(
            $request->getSchemeAndHttpHost().'/highlights/'.$highlight->id,
            $data['title'],
        )->facebook()->telegram();
        return view('client.view.highlights-detail', compact('Highlight','data','Facebook','facebook','telegram','ListHighlight'));
    }
    public function livescore()
    {
        return view('client.view.livescore');
    }
    public function livescoreDetail($id)
    {
        return view('client.view.livescore-detail', compact('id'));
    }
}
