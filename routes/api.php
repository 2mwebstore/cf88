<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/footer',[ApiController::class,'getFooter']);
Route::get('/logo',[ApiController::class,'getLogo']);
Route::get('/popular',[ApiController::class,'getPopular']);
Route::get('/popular/{id}',[ApiController::class, 'getPopularWhere']);
Route::get('/highlight',[ApiController::class,'getHighlight']);
Route::get('/highlight/{id}',[ApiController::class, 'getHighlightWhere']);
Route::get('/highlight/category/{id}',[ApiController::class, 'getHighlightCategory']);
Route::get('/article',[ApiController::class,'getArticle']);
Route::get('/article/{id}',[ApiController::class, 'getArticleWhere']);
Route::get('/livestream/{id}',[ApiController::class, 'getLiveWhere']);
Route::get('/category',[ApiController::class,'getCategory']);
Route::get('/banner',[ApiController::class,'getBanner']);
Route::get('/livestream',[ApiController::class,'getLivestream']);
Route::post('/post',[ApiController::class,'post']);
Route::get('/getpost/{id}',[ApiController::class,'getdata']);
Route::get('/feed/{id}',[ApiController::class, 'feed_delete']);
Route::post('/user/create',[ApiController::class,'user_create']);

Route::get('/channel',[ApiController::class,'getChannel']);
Route::get('/channel/{id}',[ApiController::class, 'getChannelWhere']);

Route::get('/fight',[ApiController::class,'getFight']);
Route::get('/fight/{id}',[ApiController::class, 'getFightWhere']);
Route::get('/fightactive', [ApiController::class, 'getActiveFight']);
