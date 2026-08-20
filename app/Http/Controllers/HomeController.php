<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\Social;
use App\Models\Newsfeed;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            $Newsfeed = Newsfeed::latest()->limit(9)->where('create_by',Auth::user()->id)->get();
            $telegram = Social::where('category','0')->first();
            $facebook = Social::where('category','1')->first();
            if (Auth::check() && Auth::user()->total_post >= Auth::user()->limit_post) {
                $status_post = false;
            } else {
                $status_post = true;
            }
            return view('client.view.profile', compact('facebook','telegram','Newsfeed','status_post'));
        }else{
            return view('dashboard');
        }
    }
}
