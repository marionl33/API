<?php

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

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

// List articles
Route::get('tags','ArticleController@index');

// List single article
Route::get('tags/{id}','ArticleController@show');

// Create new article
Route::post('tags','ArticleController@store');

//Update article
Route::put('tags','ArticleController@store');

//Delete article
Route::delete('tags/{id}','ArticleController@destroy');
