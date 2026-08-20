<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Highlight;
use App\Models\Banner;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\User;
use App\Models\Category;
use App\Models\Article;
use App\Models\Newsfeed;
use App\Models\Livestream;
use App\Models\Channel;
use App\Models\Fight;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
class ApiController extends Controller
{

   public function getChannel(Request $request)
   {
      $Channel = Channel::whereDate('created_at', today())
         ->latest()
         ->paginate(10);

      return response()->json($Channel);
   }

   public function getChannelWhere(Request $request, $id)
   {
      $Channel = Channel::where('id', $id)->get();

      return response()->json($Channel);
   }

   public function getFight(Request $request)
   {
      $Fight = Fight::whereDate('created_at', today())
         ->latest()
         ->paginate(10);

      return response()->json($Fight);
   }

   public function getFightWhere(Request $request, $id)
   {
      $Fight = Fight::where('id', $id)->get();

      return response()->json($Fight);
   }
      public function getActiveFight(Request $request)
   {
      $Fight = Fight::where('status', 1)->latest()->first();

      return response()->json($Fight);
   }

   public function feed_delete($id)
   {
       $Newsfeed = Newsfeed::where('post_id',$id)->firstOrFail();
       $Newsfeed->delete();
       return response()->json([
         "status" => true,
         "message" => 'Successful'
      ]);
   }
   public function getdata($id){
      $user = User::findOrFail($id);
      if($user->total_post==$user->limit_post){
         return response()->json([
            "status" => true, 
            "message" => 'Please Contact admin for update your account to premium'
      ]);
      }else{
         return response()->json([
               "status" => false, 
               "message" => 'Post Successful'
         ]);
      }
   }
   public function post(Request $request){
      $validator = Validator::make($request->all(), [
            'id' => 'required',
            'title' => 'required',
            'photo' => 'required'
      ]);
      if ($validator->fails()){
            return response()->json([
               "status" => false,
               "message" => $validator->errors()
            ]);
      }
      $user = User::findOrFail($request->id);
      $data['total_post'] = $user->total_post+1;
      $user->update($data);
      Newsfeed::create([
         'photo'       => $request->photo,
         'date'        => date('Y-m-d H:i:s' , strtotime($request->date)),
         'create_by'   => $request->id,
         'title'       => $request->title,
         'post_id'       => $request->post_id,
     ]);
     return response()->json([
            "status" => true, 
            "message" => 'Post Successful'
      ]);
   }
   public function user_create(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'email1'   => 'required|unique:users,name',
         'password' => 'required',
         'phone'    => 'required|unique:users,phone'
      ]);
      if ($validator->fails()){
            return response()->json([
               "status" => false,
               "message" => $validator->errors()
            ]);
      }
      $data = $request->all();
      $data['password'] = Hash::make($data['password']);
      $data['name'] = $data['email1'];
      $user = User::create($data);
      $user->assignRole('user');
      return response()->json([
            "status"   => true, 
            "data"     =>  $user, 
            "password" =>  $request->password, 
            "message"  => 'Register Successful'
      ]);
   
   }
   public function getFooter(Request $request)
   {
      $Footer = Footer::get();
      return response()->json($Footer);
   }
   public function getLogo(Request $request)
   {
      $logo = Logo::get();
      return response()->json($logo);
   }
    public function getHighlight(Request $request)
    {
       $Highlight = Highlight::latest()->paginate(10);
       return response()->json($Highlight);
    }
    public function getHighlightWhere(Request $request,$id)
    {
       $Highlight =  Highlight::Where('id',$id)->get();
   
       return response()->json($Highlight);
    }
    public function getArticle(Request $request)
    {
      $Article = Article::latest()->paginate(10);
       return response()->json($Article);
    }
    public function getArticleWhere(Request $request,$id)
    {
       $Article =  Article::Where('id',$id)->get();
       return response()->json($Article);
    }
    public function getCategory(Request $request)
    {
       $category = Category::get();
       return response()->json($category);
    }
    public function getBanner(Request $request)
    {
       $Banner = Banner::get();
       return response()->json($Banner);
    }
    public function getHighlightCategory(Request $request,$id)
    {
        $HighlightCategory =  Highlight::Where('category',$id)->get();
      if($HighlightCategory != '[]'){
         $response =[
            'status' => true,
            'data' => $HighlightCategory,
         ];
       }
      else{
         $response =[
            'status' => false,
            'data' => null
         ];
      }
        return response()->json($response);
    }
    public function getLivestream(Request $request)
    {
       $Livestream = Livestream::select('id','date','title','live_id','server_id','photo','detail' )
       ->whereDate('date','>=', Carbon::today())->get();
      // $Livestream = Livestream::select('id','date','title','photo','detail' )->get();
       if($Livestream != '[]'){
         $response =[
            'status' => true,
            'data' => $Livestream,
         ];
       }
      else{
         $response =[
            'status' => false,
            'data' => null
         ];
      }
          
       return response()->json($response);
    }
    public function getLiveWhere(Request $request,$id)
    {
       $Livestream =  Livestream::Where('id',$id)->get();
       return response()->json($Livestream);
    }
}
