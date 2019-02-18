<?php

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

// Route::get('/', function () {
//     return view('index');
// });
    
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/days', 'DayController@index')->name('day.index');
Route::get('/day/{slug?}', 'DayController@show')->name('day.show');
Route::post('/days', 'DayController@addEmail')->name('day.mail'); //ajax

if(Request::path() == '/') {
Route::get('/', ['uses' => 'PageController@indexSlug']);
}
else {
Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);
}

Route::post('/bot', 'BotController@index')->name('bot.index'); //bot index api
