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

// RAGA NA ROBA IMPORTANTE... NOI DA BRAVI IGNORANTI STIAMO A FA TUTTE GET, PRIMA DI CONSEGNARE DOVREMMO AGGIUSTARE UN MINIMO CON POST, PATCH, PUT ETC IN BASE ALLA NECESSITA

Route::get('/', 'HomeController@index');

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/comic_detail/{id}','ComicController@comicDetail')->name('comicdetail');
Route::post('/comic_detail/{id}','ReviewController@add')->name('submitReview');

Route::get('/shoplist', 'ComicController@shoplistBase');
Route::get('/shoplist/type/{type}','ComicController@shoplistType');
Route::get('/shoplist/genre/{name_genre}','ComicController@shoplistGenre')->name('genreshoplist');
Route::get('/shoplist/price0','ComicController@shoplistPrice0')->name('prezzo0');
Route::get('/shoplist/price1','ComicController@shoplistPrice1')->name('prezzo1');
Route::get('/shoplist/price2','ComicController@shoplistPrice2')->name('prezzo2');
Route::get('/shoplist/price3','ComicController@shoplistPrice3')->name('prezzo3');
Route::get('/shoplist/price4','ComicController@shoplistPrice4')->name('prezzo4');
Route::get('/shoplist/sconto','ComicController@shoplistSale')->name('sconto');
Route::get('/shoplist/search/','ComicController@shoplistSearch')->name('searchroute');


Auth::routes();

//da qui sono da riordinare bene con i controller come ha fatto Gianluca sopra, per ora lasciamo così che funziona bene

Route::post('change.email', 'UserController@changeEmail')->name('change.email');

Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
Route::get('remove-method/{method}', 'PaymentMethodController@remove')->name('remove.method');
Route::get('remove-address/{address}', 'ShippingAddressController@remove')->name('remove.address');
Route::get('addMethod', function (){return view('AddMethod');})->name('addMethod');
Route::post('submitAddMethod', 'PaymentMethodController@add')->name('submitAddMethod');
Route::get('addAddress', function (){return view('addAddress');})->name('addAddress');
Route::post('submitAddAddress', 'ShippingAddressController@add')->name('submitAddAddress');

Route::get('/logout', function () {
    return \App\Http\Controllers\Auth\LoginController::logout();
});

Route::get('/accountArea', function () {
    $user = \Illuminate\Support\Facades\Auth::user();
    return view('/accountArea')
        ->with(compact('user'));
});

Route::get('/aboutUs',function(){
    return view('aboutus');
});

Route::get('/adminArea/dashboard', 'AdminController@dashboard')->name('admindashboard');
Route::get('/adminArea/users', 'AdminController@adminUsers')->name('adminusers');
Route::get('/adminArea/comics', 'AdminController@adminComics')->name('admincomics');
Route::get('/adminArea/reviews', 'AdminController@adminReviews')->name('adminreviews');


Route::get('/vendor', function () {
    $user = \Illuminate\Support\Facades\Auth::user();
    return view('/vendor')
        ->with(compact('user'));
});

Route::get('/accountArea/notificaLetta/{id}', 'NotificationController@notificationRead')->name('notificaLetta'); //per farlo andare per adesso, poi dovremo fare in modo che ad ogni notifica corrisponda un link di reindirizzamento (in base alla notifica). Sta roba effettivamente potrebbe non essere semplice.


Route::get('cart', function(){
    return view('/cart');
});

Route::get('add-to-cart/{id}', 'ComicController@addToCart');

Route::get('add-to-cart-case-1/{id}', 'ComicController@addToCart1');

Route::get('update-cart/{id}', 'ComicController@updateCart');

Route::get('remove-from-cart/{id}', 'ComicController@removeFromCart');

Route::get('remove-all', 'ComicController@removeAll');

Route::post('submitOrder', 'OrderController@submitOrder')->name('submitOrder');

Route::get('/orderSuccess', function () {return view('/orderSuccess');});

Route::get('/orderFailure', function () {return view('/orderFailure');});

Route::get('/accountArea/orderDetail/{id}', 'OrderController@orderDetail')->name('orderDetail');

Auth::routes(); //ehm... perché è stato scritto due volte? nel caso mi leggete rispondetemi su WA DF

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user-delete/{id}','UserController@destroy')->name('user-delete');
Route::get('comic-delete/{id}','ComicController@destroy')->name('comic-delete');
Route::get('review-delete/{id}','ReviewController@destroy')->name('review-delete');
Route::get('review-deletelocal/{id}','ReviewController@destroylocal')->name('review-delete-local');

Route::get('/blog', function(){return view('/blogHome');});
