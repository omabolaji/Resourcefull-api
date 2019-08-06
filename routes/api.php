<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('register', 'AuthController@register');
// Route::post('login', 'AuthController@login');
// Route::apiResource('books', 'BookController');
// Route::post('books/{book}/ratings', 'RatingController@store');

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('users', 'AuthController@users');
// Route::get('open', 'DataController@open');
Route::apiResource('books', 'BookController');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'AuthController@getAuthenticatedUser');
    Route::post('books/{book}/ratings', 'RatingController@store');
        // Route::get('closed', 'DataController@closed');
    });