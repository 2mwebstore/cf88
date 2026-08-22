<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LivestreamController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\NewsfeedController;
use App\Http\Controllers\FightController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VideoR2UploadController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::domain('admin.cf88.me')->group(function () {
//     Route::get('/', function () {
//         return redirect('/dashboard');
//     });
// });

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
Route::get('/locale/{locale}', function ($locale) {
    Session::put('locale',$locale);
    return redirect()->back();
});
// Auth::routes();
// Route::get('/', function () {
//     return view('auth/login');
// });
// Route::get('/article_detail/{id}', [ArticleController::class, 'view']);
Route::get('/', [ClientController::class, 'index']);
Route::get('/livescore', [ClientController::class, 'livescore']);
Route::get('/livescore/{id}', [ClientController::class, 'livescoreDetail']);
Route::get('/livestreams', [ClientController::class, 'Livestreams']);
Route::get('/livestreams/{id}', [ClientController::class, 'LivestreamsDetail']);
Route::get('/news', [ClientController::class, 'News']);
Route::get('/news/{id}', [ClientController::class, 'NewsDetail']);
Route::get('/feeds', [ClientController::class, 'Newsfeed']);
Route::get('/feeds/{id}', [ClientController::class, 'NewsfeedDetail']);
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');
Route::post('/post', [UpdateController::class, 'post'])->name('feeds.post');   

// Route::post('/feeds/post', [NewsfeedController::class,'post'])->name('feeds.post');

Route::get('/highlights', [ClientController::class, 'Highlights']);
Route::get('/highlights/{id}', [ClientController::class, 'HighlightsDetail']);
Route::get('/channels', [ClientController::class, 'Channels']);
Route::get('/channels/{id}', [ClientController::class, 'ChannelsDetail']);
Route::get('/channels/category/{id}', [ClientController::class, 'ChannelByCategory']);
Route::post('/user/register',[RegisterController::class,'user_create']);
Route::get('/listfight', [ClientController::class, 'listfight']);

// Route::get('/getvideos', [VideoController::class, 'getindex'])->name('videos.index');
Route::get('/getvideos', [VideoController::class, 'getVideos'])->name('videos.index');
Route::post('/vote/{id}', [VideoController::class, 'vote'])->name('videos.vote')->middleware('auth');
Route::get('/getvideos/{id}', [VideoController::class, 'show']);
Auth::routes(['register' => false]);

Route::prefix('admin')->group(function () {
    Route::get('video-r2-upload', [VideoR2UploadController::class, 'index'])->name('video-r2-upload.index');
    Route::post('video-r2-upload', [VideoR2UploadController::class, 'store'])->name('video-r2-upload.store');
    Route::delete('video-r2-upload/{id}', [VideoR2UploadController::class, 'destroy'])->name('video-r2-upload.destroy');

    Route::post('video-r2-upload/presign-upload', [VideoR2UploadController::class, 'presignUpload'])->name('video-r2-upload.presign');
    Route::get('video-r2-upload/list', [VideoR2UploadController::class, 'getindex'])->name('video-r2-upload.list');
});
 

Route::middleware(['auth', 'check.admin.domain'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard'); 

    Route::get('/profile/{id}', [PeopleController::class, 'profile']);
    Route::post('/profile/update/{id}', [PeopleController::class, 'update'])->name('profile.update');

    Route::view('/404-page','admin.404-page')->name('404-page');
    Route::view('/blank-page','admin.blank-page')->name('blank-page');
    Route::view('/buttons','admin.buttons')->name('buttons');
    Route::view('/cards','admin.cards')->name('cards');
    Route::view('/utilities-colors','admin.utilities-color')->name('utilities-colors');
    Route::view('/utilities-borders','admin.utilities-border')->name('utilities-borders');
    Route::view('/utilities-animations','admin.utilities-animation')->name('utilities-animations');
    Route::view('/utilities-other','admin.utilities-other')->name('utilities-other');
    Route::view('/chart','admin.chart')->name('chart');
    Route::view('/tables','admin.tables')->name('tables');
    Route::view('/404-page','admin.404-page')->name('404-page');
    //user 

    Route::get('/user', [PeopleController::class,'user'])->name('user');
    Route::post('/user/create', [PeopleController::class, 'user_create']);
    Route::post('/user/update', [PeopleController::class, 'user_update']);
    Route::get('/user/{id}/question', [PeopleController::class, 'question']);
    Route::get('/user/{id}/destroy', [PeopleController::class, 'destroy']);
    Route::get('/user/{id}/permission', [PeopleController::class, 'permission']);
    Route::post('/user/permission/{id}', [PeopleController::class, 'permissionbyid']);
    Route::resource('roles', RoleController::class);
    //Highlight
    Route::get('/highlight', [HighlightController::class,'index'])->name('highlight');
    Route::get('/highlight/create', [HighlightController::class, 'create'])->name('highlight/create');
    Route::post('/highlight/store', [HighlightController::class,'store']);
    Route::get('/highlight/{id}/question', [HighlightController::class, 'question']);
    Route::delete('/highlight/{id}/destroy', [HighlightController::class, 'destroy'])->name('highlight.destroy');
    Route::get('/highlight/{id}/edit', [HighlightController::class, 'edit']);
    Route::patch('/highlight/{id}/update', [HighlightController::class, 'update']);
    //Channel
    Route::get('/channel', [ChannelController::class,'index'])->name('channel');
    Route::get('/channel/create', [ChannelController::class, 'create'])->name('channel/create');
    Route::post('/channel/store', [ChannelController::class,'store']);
    Route::get('/channel/{id}/question', [ChannelController::class, 'question']);
    Route::delete('/channel/{id}/destroy', [ChannelController::class, 'destroy'])->name('channel.destroy');
    Route::get('/channel/{id}/edit', [ChannelController::class, 'edit']);
    Route::patch('/channel/{id}/update', [ChannelController::class, 'update']);
    //Newsfeed
    Route::get('/newsfeed', [NewsfeedController::class,'index'])->name('newsfeed');
    Route::get('/newsfeed/create', [NewsfeedController::class, 'create'])->name('newsfeed/create');
    Route::post('/newsfeed/store', [NewsfeedController::class,'store']);
    Route::delete('/newsfeed/{id}/destroy', [NewsfeedController::class, 'destroy'])->name('newsfeed.destroy');
    Route::get('/newsfeed/{id}/edit', [NewsfeedController::class, 'edit']);
    Route::patch('/newsfeed/{id}/update', [NewsfeedController::class, 'update']);

    // Video
    Route::get('/videos', [VideoController::class, 'index'])->name('video');
    Route::get('/videos/create', [VideoController::class, 'create'])->name('video.create');
    Route::post('/videos/store', [VideoController::class, 'store'])->name('video.store');
    Route::delete('/videos/{id}/destroy', [VideoController::class, 'destroy'])->name('video.destroy');
    Route::get('/videos/{id}/edit', [VideoController::class, 'edit']);
    Route::patch('/videos/{id}/update', [VideoController::class, 'update'])->name('video.edit');

    //Fight
    Route::get('/fight', [FightController::class,'index'])->name('fights');
    Route::get('/fight/create', [FightController::class, 'create'])->name('fights.create');
    Route::post('/fight/store', [FightController::class,'store'])->name('fights.store');
    Route::delete('/fight/{id}/destroy', [FightController::class, 'destroy'])->name('fights.destroy');
    Route::get('/fight/{id}/edit', [FightController::class, 'edit'])->name('fights.edit');
    Route::patch('/fight/{id}/update', [FightController::class, 'update'])->name('fights.update');
    Route::post('/fights/{id}/set-active', [FightController::class, 'setActive'])->name('fights.setActive');

    //Article
    Route::get('/article', [ArticleController::class,'index'])->name('article');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article/create');
    Route::post('/article/store', [ArticleController::class,'store']);
    Route::get('/article/{id}/question', [ArticleController::class, 'question']);
    Route::delete('/article/{id}/destroy', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::get('/article/{id}/edit', [ArticleController::class, 'edit']);
    Route::patch('/article/{id}/update', [ArticleController::class, 'update']);

    //banner
    Route::get('/banner', [BannerController::class,'index'])->name('banner');
    Route::get('/banner/create', [BannerController::class, 'create'])->name('banner/create');
    Route::post('/banner/store', [BannerController::class,'store']);
    Route::get('/banner/{id}/question', [BannerController::class, 'question']);
    Route::get('/banner/{id}/destroy', [BannerController::class, 'destroy']);
    Route::get('/banner/{id}/edit', [BannerController::class, 'edit']);
    Route::patch('/banner/{id}/update', [BannerController::class, 'update']);
    //livestream
    Route::get('/livestream', [LivestreamController::class,'index'])->name('livestream');
    Route::get('/livestream/create', [LivestreamController::class, 'create'])->name('livestream/create');
    Route::post('/livestream/store', [LivestreamController::class,'store']);
    Route::get('/livestream/{id}/question', [LivestreamController::class, 'question']);
    Route::get('/livestream/{id}/destroy', [LivestreamController::class, 'destroy']);
    Route::get('/livestream/{id}/edit', [LivestreamController::class, 'edit']);
    Route::patch('/livestream/{id}/update', [LivestreamController::class, 'update']);

    //Bot
    Route::get('/bot', [SettingController::class,'bot'])->name('bot');
    Route::post('/bot/store', [SettingController::class, 'bot_store']);
    Route::post('/bot/update', [SettingController::class, 'bot_update']);
    Route::get('/bot/{id}/question', [SettingController::class, 'bot_question']);
    Route::get('/bot/{id}/destroy', [SettingController::class, 'bot_destroy']);
    //Category
    Route::get('/category', [SettingController::class,'category'])->name('category');
    Route::post('/category/store', [SettingController::class, 'category_store']);
    Route::post('/category/update', [SettingController::class, 'category_update']);
    Route::get('/category/{id}/question', [SettingController::class, 'category_question']);
    Route::get('/category/{id}/destroy', [SettingController::class, 'category_destroy']);

    //Telegram
    Route::get('/telegram', [SettingController::class,'telegram'])->name('telegram');
    Route::post('/telegram/store', [SettingController::class, 'telegram_store']);
    Route::post('/telegram/update', [SettingController::class, 'telegram_update']);
    Route::get('/telegram/{id}/question', [SettingController::class, 'telegram_question']);
    Route::get('/telegram/{id}/destroy', [SettingController::class, 'telegram_destroy']);
    //Topic
    Route::get('/topic', [SettingController::class,'topic'])->name('topic');
    Route::post('/topic/store', [SettingController::class, 'topic_store']);
    Route::post('/topic/update', [SettingController::class, 'topic_update']);
    Route::get('/topic/{id}/question', [SettingController::class, 'topic_question']);
    Route::get('/topic/{id}/destroy', [SettingController::class, 'topic_destroy']);

    //footer
    Route::get('/footer', [SettingController::class,'footer'])->name('footer');
    Route::post('/footer/store', [SettingController::class, 'footer_store']);
    Route::post('/footer/update', [SettingController::class, 'footer_update']);
    Route::get('/footer/{id}/question', [SettingController::class, 'footer_question']);
    Route::get('/footer/{id}/destroy', [SettingController::class, 'footer_destroy']);

    //logo
    Route::get('/logo', [SettingController::class,'logo'])->name('logo');
    Route::post('/logo/store', [SettingController::class, 'logo_store']);
    Route::post('/logo/update', [SettingController::class, 'logo_update']);
    Route::get('/logo/{id}/question', [SettingController::class, 'logo_question']);
    Route::get('/logo/{id}/destroy', [SettingController::class, 'logo_destroy']);
        
    Route::get('/social', [SettingController::class,'social'])->name('social');
    Route::post('/social/store', [SettingController::class, 'social_store']);
    Route::post('/social/update', [SettingController::class, 'social_update']);
    Route::get('/social/{id}/question', [SettingController::class, 'social_question']);
    Route::get('/social/{id}/destroy', [SettingController::class, 'social_destroy']);

    Route::get('/d', [SettingController::class, 'server']);
    Route::get('/d/{id}', [SettingController::class, 'server']);

});

