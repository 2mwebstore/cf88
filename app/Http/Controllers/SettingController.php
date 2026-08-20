<?php



namespace App\Http\Controllers;

use App\Models\Bot;
use App\Models\Social;
use App\Models\Category;
use App\Models\Footer;
use App\Models\Banner;
use App\Models\Logo;
use App\Models\Telegram;
use App\Models\Topic;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Str;

class SettingController extends Controller

{
    function __construct()
    {
         $this->middleware('permission:bot-list', ['only' => ['bot']]);
         $this->middleware('permission:bot-create', ['only' => ['bot_store']]);
         $this->middleware('permission:bot-edit', ['only' => ['bot_update']]);
         $this->middleware('permission:bot-delete', ['only' => ['bot_question','bot_destroy']]);

         $this->middleware('permission:category-list', ['only' => ['category']]);
         $this->middleware('permission:category-create', ['only' => ['category_store']]);
         $this->middleware('permission:category-edit', ['only' => ['category_update']]);
         $this->middleware('permission:category-delete', ['only' => ['category_question','category_destroy']]);

         $this->middleware('permission:logo-list', ['only' => ['logo']]);
         $this->middleware('permission:logo-create', ['only' => ['logo_store']]);
         $this->middleware('permission:logo-edit', ['only' => ['logo_update']]);
         $this->middleware('permission:logo-delete', ['only' => ['logo_question','logo_destroy']]);

         $this->middleware('permission:social-list', ['only' => ['social']]);
         $this->middleware('permission:social-create', ['only' => ['social_store']]);
         $this->middleware('permission:social-edit', ['only' => ['social_update']]);
         $this->middleware('permission:social-delete', ['only' => ['social_question','social_destroy']]);

        //  $this->middleware('permission:topic-list', ['only' => ['topic']]);
        //  $this->middleware('permission:topic-create', ['only' => ['topic_store']]);
        //  $this->middleware('permission:topic-edit', ['only' => ['topic_update']]);
        //  $this->middleware('permission:topic-delete', ['only' => ['topic_question','topic_destroy']]);
    }

    public function server(Request $request)
    {
        return view('admin/file/store');
    }
    public function footer()

    {

        $Footer = Footer::select('id', 'name','link','photo')->latest()->get();

        return view('admin/setting/footer', compact('Footer'));

    }
    public function footer_store(Request $request)

    {
        if ($request->photo) {
            $photo = time() .'-' .$request->photo->getClientOriginalName();
            $request->photo->move('upload', $photo);
        }
        Footer::create([
            'photo'       => $photo ?? '',
            'name'       => $request->name,
            'link'       => $request->link,
        ]);
        Alert::success('Create footer Successful');

        return redirect('/footer');

    }

    public function footer_update(Request $request, Footer $footer)

    {

        $id = $request->id;

        $Footer = Footer::whereId($id)->first();
        $data = [

            'name'        => $request->name   ,
            'link'        => $request->link ,  
            'photo'        => $request->photo ,  
        ];
        if (!$request->photo) {
            $data['photo'] = $Footer->photo;
        }
        elseif ($request->photo) {
            File::delete('upload/' .$Footer->photo);
            $photo = time() . '-' . $request->photo->getClientOriginalName();
            $request->photo->move('upload', $photo);
            $data['photo'] = $photo;
        }

        $Footer->update($data);
        Alert::success('Successful', 'Footer is Edited');
        return redirect('/footer');

    }
    
    public function footer_destroy(Footer $footer ,$id)

    {

        $footer = Footer::select('photo', 'id')->whereId($id)->firstOrFail();

        File::delete('upload/' . $footer->photo);

        $footer->delete();

        Alert::success('Successful', 'Footer is Deleted');

        return redirect('/footer');

    }
    public function footer_question($id)
    {

        alert()->question('Delete Footer !', 'Are you sure?')

        ->showConfirmButton('<a href="/footer/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()

        ->showCancelButton('Back', '#aaa')->reverseButtons();



        return redirect('/footer');

    }

    //  * Category 

    public function category()

    {

        $Category = Category::latest()->get();

        return view('admin/setting/category', compact('Category'));

    }
    public function add_banner()
    {
        return view('admin/setting/add_banner');
    }
    public function category_store(Request $request)

    {

        $request->validate([

            'row'       => 'required',
            'name'       => 'required',

            'code'       =>  ['required', 'unique:category'],

        ]);

        Category::create([

            'name'        => $request->name,
            'row'        => $request->row,

            'code'        => $request->code,

            'slug'        => Str::slug($request->code, '-')

        ]);

        Alert::success('Create Category Successful');

        return redirect('/category');

    }

    public function category_update(Request $request, Category $category)

    {

        $id = $request->id;

        $category = Category::whereId($id)->first();

    

        $request->validate([

            'row' => 'required',
            'name' => 'required',

            'code' => 'required',

        ]);

        $data = [

            'row'        => $request->row   ?? $category->row,
            'name'        => $request->name   ?? $category->name,

            'code'        => $request->code   ?? $category->code,
            'status'        => $request->status   ?? $category->status,

        ];
        $category->update($data);

        Alert::success('Successful', 'Category is Edited');

        return redirect('/category');

    }

    public function category_destroy(Category $category ,$id)

    {

        $category = Category::select('photo', 'id')->whereId($id)->firstOrFail();

        File::delete('upload/' . $category->photo);

        $category->delete();

        Alert::success('Successful', 'Category is Deleted');

        return redirect('/category');

    }

    public function category_question($id)
    {

        alert()->question('Delete Category !', 'Are you sure?')

        ->showConfirmButton('<a href="/category/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()

        ->showCancelButton('Back', '#aaa')->reverseButtons();



        return redirect('/category');

    }
 //  * Telegram 
 
  //  * Topic 

    public function topic()

    {

        $Topic = Topic::select('id', 'name','message_thread_id')->latest()->get();

        return view('admin/setting/topic', compact('Topic'));

    }
    public function topic_store(Request $request)

    {

        $request->validate([

            'name'       => 'required',

            'message_thread_id'       =>  ['required', 'unique:topic'],

        ]);

        Topic::create([
            'name'        => $request->name,
            'message_thread_id'        => $request->message_thread_id,
        ]);

        Alert::success('Create Topic Successful');

        return redirect('/topic');

    }

    public function topic_update(Request $request, Topic $topic)

    {

        $id = $request->id;

        $topic = Topic::select('id','name','message_thread_id')->whereId($id)->first();

    

        $request->validate([

            'name' => 'required',

            'message_thread_id' => 'required',

        ]);

        $data = [

            'name'        => $request->name   ?? $topic->name,

            'message_thread_id'        => $request->message_thread_id   ?? $topic->message_thread_id,

        ];

        $topic->update($data);

        Alert::success('Successful', 'Topic is Edited');

        return redirect('/topic');

    }

    public function topic_destroy(Topic $topic ,$id)
    {
        $topic = Topic::select('id')->whereId($id)->firstOrFail();
        $topic->delete();
        Alert::success('Successful', 'Topic is Deleted');
        return redirect('/category');

    }

    public function topic_question($id)
    {
        alert()->question('Delete Topic !', 'Are you sure?')
        ->showConfirmButton('<a href="/topic/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()
        ->showCancelButton('Back', '#aaa')->reverseButtons();
        return redirect('/topic');
    }
    
 //  * Topic 

 public function telegram()

 {

     $telegram = Telegram::latest()->get();

     return view('admin/setting/telegram', compact('telegram'));

 }
 public function telegram_store(Request $request)

 {
    $request->validate([
        'bot_api' => 'required',
        'group_id' => 'required',
    ]);
     Telegram::create([
         'bot_api'        => $request->bot_api,
         'group_id'        => $request->group_id,
     ]);

     Alert::success('Create Telegram Successful');

     return redirect('/telegram');

 }

 public function telegram_update(Request $request, telegram $telegram)
 {
     $id = $request->id;
     $telegram = Telegram::whereId($id)->first();
     $request->validate([
        'bot_api' => 'required',
        'group_id' => 'required',
    ]);
     $data = [
        'bot_api'        => $request->bot_api,
        'group_id'        => $request->group_id,
     ];
     $telegram->update($data);
     Alert::success('Successful', 'Telegram is Edited');
     return redirect('/telegram');
 }
 public function telegram_destroy(telegram $telegram ,$id)
 {
     $telegram = Telegram::whereId($id)->firstOrFail();
     $telegram->delete();
     Alert::success('Successful', 'Telegram is Deleted');
     return redirect('/telegram');
 }

 public function telegram_question($id)
 {
     alert()->question('Delete Telegram !', 'Are you sure?')
     ->showConfirmButton('<a href="/telegram/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()
     ->showCancelButton('Back', '#aaa')->reverseButtons();
     return redirect('/telegram');
 }
    //  * Banner 
    public function banner()
    {

        $banner = Banner::select('id', 'name','video','photo')->latest()->get();

        return view('admin/setting/banner', compact('banner'));

    }
    public function banner_store(Request $request)
    {
        if ($request->photo) {
            $photo = time() .'-' .$request->photo->getClientOriginalName();
            $request->photo->move('upload', $photo);
        }
        if ($request->video) {
            $video = time() .'-' .$request->video->getClientOriginalName();
            $request->video->move('upload', $video);
        }
        Banner::create([
            'photo'       => $photo ?? '',
            'video'       => $video ?? '',
            'name'       => $request->name,
        ]);
        Alert::success('Create Banner Successful');

        return redirect('/banner');

    }
    public function banner_update(Request $request, Banner $Banner)
    {
        $id = $request->id;

        $Banner = Banner::select('photo', 'id')->whereId($id)->first();
        $data = [
            'name'     => $request->name,
            'photo'    => $request->photo,
        ];
        if (!$request->photo) {
            $data['photo'] = $Banner->photo;
        }
        elseif ($request->photo) {
            File::delete('upload/' .$Banner->photo);
            $photo = time() . '-' . $request->photo->getClientOriginalName();
            $request->photo->move('upload', $photo);
            $data['photo'] = $photo;
        }
        $Banner->update($data);

        Alert::success('Successful', 'Banner is Edited');

        return redirect('/banner');

    }
    public function banner_question($id)
    {

        alert()->question('Delete Banner !', 'Are you sure?')

        ->showConfirmButton('<a href="/banner/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()

        ->showCancelButton('Back', '#aaa')->reverseButtons();



        return redirect('/banner');

    }
    public function banner_destroy(Banner $banner ,$id)
    {
        $banner = Banner::select('photo','video', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/' . $banner->photo);
        File::delete('upload/' . $banner->video);
        $banner->delete();
        Alert::success('Successful', 'Banner is Deleted');
        return redirect('/banner');
    }

        //  * logo 
        public function logo()
        {
    
            $logo = Logo::select('id', 'name','photo')->latest()->get();
    
            return view('admin/setting/logo', compact('logo'));
    
        }
        public function logo_store(Request $request)
        {
            if ($request->photo) {
                $photo = time() .'-' .$request->photo->getClientOriginalName();
                $request->photo->move('upload', $photo);
            }
            Logo::create([
                'photo'       => $photo ?? '',
                'name'       => $request->name,
            ]);
            Alert::success('Create logo Successful');
    
            return redirect('/logo');
    
        }
        public function logo_update(Request $request, Logo $logo)
        {
            $id = $request->id;
    
            $logo = Logo::select('photo', 'id')->whereId($id)->first();
            $data = [
                'name'     => $request->name,
                'photo'    => $request->photo,
            ];
            if (!$request->photo) {
                $data['photo'] = $logo->photo;
            }
            elseif ($request->photo) {
                File::delete('upload/' .$logo->photo);
                $photo = time() . '-' . $request->photo->getClientOriginalName();
                $request->photo->move('upload', $photo);
                $data['photo'] = $photo;
            }
            $logo->update($data);
    
            Alert::success('Successful', 'logo is Edited');
    
            return redirect('/logo');
    
        }
        public function logo_question($id)
        {
    
            alert()->question('Delete logo !', 'Are you sure?')
    
            ->showConfirmButton('<a href="/logo/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()
    
            ->showCancelButton('Back', '#aaa')->reverseButtons();
    
    
    
            return redirect('/logo');
    
        }
        public function logo_destroy(Logo $logo ,$id)
        {
            $logo = Logo::select('photo','id')->whereId($id)->firstOrFail();
            File::delete('upload/' . $logo->photo);
            $logo->delete();
            Alert::success('Successful', 'logo is Deleted');
            return redirect('/logo');
        }

        public function bot()

        {
    
            $bot = Bot::get();
    
            return view('admin/setting/bot', compact('bot'));
    
        }
    
        public function bot_store(Request $request)
    
        {
    
            $request->validate([
                'bot_id' => 'required',
                'token' => 'required',
                'chat_id' => 'required',
                'name_url' => 'required',
                'link_url' => 'required',
                'sponsor' => 'required',
                'create_acc_at' => 'required',
    
            ], [
                'bot_id.required' => 'The facebook field is required.',
                'token.required' => 'The token field is required.',
                'chat_id.required' => 'The chat_id field is required.',
                'name_url.required' => 'The name_url field is required.',
                'link_url.required' => 'The link_url field is required.',
                'sponsor.required' => 'The sponsor field is required.',
                'create_acc_at.required' => 'The photo field is required.',
            ]);
            Bot::create([
    
                'bot_id'    => $request->bot_id,
    
                'token'     => $request->token,
    
                'chat_id'   => $request->chat_id,
    
                'name_url'   => $request->name_url,
    
                'link_url'   => $request->link_url,
    
                'sponsor'   => $request->sponsor,
                'telegram'   => $request->telegram,
    
                'create_acc_at'   => $request->create_acc_at,
    
            ]);
    
            Alert::success('Create Bot Successful');
    
            return redirect('/bot');
    
        }
    
        public function bot_update(Request $request, Bot $bot)
    
        {
    
            $request->validate([
                'bot_id' => 'required',
                'token' => 'required',
                'chat_id' => 'required',
                'name_url' => 'required',
                'link_url' => 'required',
                'sponsor' => 'required',
                'create_acc_at' => 'required',
    
            ], [
                'bot_id.required' => 'The facebook field is required.',
                'token.required' => 'The token field is required.',
                'chat_id.required' => 'The chat_id field is required.',
                'name_url.required' => 'The name_url field is required.',
                'link_url.required' => 'The link_url field is required.',
                'sponsor.required' => 'The sponsor field is required.',
                'create_acc_at.required' => 'The photo field is required.',
            ]);
            $id = $request->id;
    
            $bot = Bot::whereId($id)->first();
    
            $data = [
                'bot_id'    => $request->bot_id,
    
                'token'     => $request->token,
    
                'chat_id'   => $request->chat_id,
    
                'name_url'   => $request->name_url,
    
                'link_url'   => $request->link_url,
                
                'sponsor'   => $request->sponsor,
                'telegram'   => $request->telegram,
                'create_acc_at'   => $request->create_acc_at,
    
            ];
    
            $bot->update($data);
    
            Alert::success('Successful', 'Bot is Edited');
    
            return redirect('/bot');
    
        }
    
        public function bot_question($id)
    
        {
    
            alert()->question('Delete Bot !', 'Are you sure?')
    
            ->showConfirmButton('<a href="/bot/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()
    
            ->showCancelButton('Back', '#aaa')->reverseButtons();
    
    
    
            return redirect('/bot');
    
        }
    
        public function bot_destroy(Bot $bot ,$id)
    
        {
    
            $bot = Bot::select('id')->whereId($id)->firstOrFail();
    
            $bot->delete();
    
            Alert::success('Successful', 'bot is Deleted');
    
            return redirect('/bot');
    
        }
    

    


    public function social()

    {
    
        $social = social::get();
    
        return view('admin/setting/social', compact('social'));
    
    }
    
    public function social_store(Request $request)
    
    {
    
        Social::create([
    
            'name'    => $request->name,
    
            'category'     => $request->category,
        ]);
    
        Alert::success('Create Social Successful');
    
        return redirect('/social');
    
    }
    
    public function social_update(Request $request, Social $Social)
    
    {
    
        $id = $request->id;
    
        $Social = Social::whereId($id)->first();
    
        $data = [
            'name'    => $request->name,
            'category'=> $request->category,
    
        ];
    
        $Social->update($data);
    
        Alert::success('Successful', 'Social is Edited');
    
        return redirect('/social');
    
    }
    
    public function social_question($id)
    
    {
    
        alert()->question('Delete Social !', 'Are you sure?')
    
        ->showConfirmButton('<a href="/social/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()
    
        ->showCancelButton('Back', '#aaa')->reverseButtons();
    
    
    
        return redirect('/social');
    
    }
    
    public function social_destroy(Social $Social ,$id)
    
    {
    
        $Social = Social::select('id')->whereId($id)->firstOrFail();
    
        $Social->delete();
    
        Alert::success('Successful', 'Social is Deleted');
    
        return redirect('/social');
    
    }
}

