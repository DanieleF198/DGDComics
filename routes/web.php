<?php

use Illuminate\Support\Facades\Route;
use App\Comic;
use App\Genre;
use App\Notification;

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

Route::get('/', 'HomeController@index');

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/comic_detail/{id}','ComicController@comicDetail');

Route::get('/shoplist', 'ComicController@shoplistBase');
Route::get('/shoplist/type/{type}','ComicController@shoplistType');
Route::get('/shoplist/genre/{name_genre}','ComicController@shoplistGenre')->name('genreshoplist');
Route::get('/shoplist/price0','ComicController@shoplistPrice0')->name('prezzo0');
Route::get('/shoplist/price1','ComicController@shoplistPrice1')->name('prezzo1');
Route::get('/shoplist/price2','ComicController@shoplistPrice2')->name('prezzo2');
Route::get('/shoplist/price3','ComicController@shoplistPrice3')->name('prezzo3');
Route::get('/shoplist/price4','ComicController@shoplistPrice4')->name('prezzo4');
Route::get('/shoplist/search','ComicController@shoplistSearch')->name('searchroute');

Auth::routes();

Route::get('/logout', function () {
    return \App\Http\Controllers\Auth\LoginController::logout();
});

Route::get('/accountArea', function () {
    $user = \Illuminate\Support\Facades\Auth::user();
    return view('/accountArea')
        ->with(compact('user'));
});

Route::get('/accountArea/notificaLetta/{id}', 'NotificationController@notificationRead')->name('notificaLetta'); //per farlo andare per adesso, poi dovremo fare in modo che ad ogni notifica corrisponda un link di reindirizzamento (in base alla notifica). Sta roba effettivamente potrebbe non essere semplice.