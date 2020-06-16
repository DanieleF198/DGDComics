<?php

use App\Order;
use App\PaymentMethod;
use App\ShippingAddress;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Comic;
use App\Genre;
use App\Notification;
use App\Review;

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
})->name('contact');

Route::get('/comic_detail/{id}','ComicController@comicDetail')->name('comicdetail');
Route::post('/submitReview/{id}','ReviewController@add')->name('submitReview');

Route::get('/vendor_detail/{id}' , 'RankingController@vendorRanking')->name('vendorpublic');



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
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
Route::get('remove-method/{method}', 'PaymentMethodController@remove')->name('remove.method');
Route::get('remove-address/{address}', 'ShippingAddressController@remove')->name('remove.address');
Route::get('addMethod', function (){return view('AddMethod');})->name('addMethod');
Route::post('submitAddMethod', 'PaymentMethodController@add')->name('submitAddMethod');
Route::get('addAddress', function (){return view('addAddress');})->name('addAddress');
Route::post('submitAddAddress', 'ShippingAddressController@add')->name('submitAddAddress');
Route::post('submitVendorAddAddress', function(Request $request){
    \App\Http\Controllers\ShippingAddressController::addVendorShippingAdress($request);
    \App\Http\Controllers\UserController::addPartitaIva($request);
    \App\Http\Controllers\GroupController::vendorUpdate();
    $user = \Illuminate\Support\Facades\Auth::user();
    $notifications = Notification::where('user_id', '=', $user->id)->paginate(6);
    $orders = Order::where('user_id', '=', $user->id)->paginate(6);
    $list = Wishlist::where('user_id', '=', $user->id)->paginate(6);
    $paymentMethods = PaymentMethod::where('user_id','=',$user->id)->paginate(6);
    $shippingAddresses =  ShippingAddress ::where('user_id','=',$user->id)->paginate(6);
    $orders_of_vendor = DB::table('orders')->join('comic_bought_order', 'orders.id', '=', 'comic_bought_order.order_id')->join('comic_boughts', 'comic_bought_order.comic_bought_id', '=', 'comic_boughts.id')->join('comics', 'comic_boughts.comic_id', '=', 'comics.id')->where('comics.user_id', '=', $user->id)->paginate(6);
    $comics_of_vendor = Comic::where('user_id', '=', $user->id)->paginate(6);

    return redirect('accountArea')
        ->with(compact('user'))
        ->with(compact('notifications'))
        ->with(compact('orders'))
        ->with(compact('list'))
        ->with(compact('paymentMethods'))
        ->with(compact('shippingAddresses'))
        ->with(compact('orders_of_vendor'))
        ->with(compact('comics_of_vendor'));
} )->name('submitAddVendorAddress');

Route::get('confirmOrder/{id}', 'ComicBoughtController@orderUpdateConfirm')->name('confirmOrder');
Route::get('sendOrder/{id}', 'ComicBoughtController@orderUpdateSend')->name('sendOrder');


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
Route::get('/accountArea/dashboard','UserController@dashboard')->name('userdashboard');
Route::get('/accountArea/orders','UserController@dashboard')->name('userorders');
Route::get('/accountArea/wishlist','UserController@dashboard')->name('userwishlist');
Route::get('/accountArea/paymentmethods','UserController@dashboard')->name('paymentmethods');
Route::get('/accountArea/addressedit','UserController@dashboard')->name('addressedit');
Route::get('/accountArea/account','UserController@dashboard')->name('accountinfo');
Route::get('/accountArea/venditore','UserController@dashboard')->name('venditoreinfo');
Route::get('/accountArea/venditoreaddproducts','UserController@dashboard')->name('venditoreaddproducts');
Route::get('/accountArea/menagementproducts','UserController@dashboard')->name('venditoremenagementproducts');


Route::get('/adminArea/dashboard', 'AdminController@dashboard')->name('admindashboard');
Route::get('/adminArea/users', 'AdminController@dashboard')->name('adminusers');
Route::get('/adminArea/comics', 'AdminController@dashboard')->name('admincomics');
Route::get('/adminArea/reviews', 'AdminController@dashboard')->name('adminreviews');


Route::get('/vendor', function () {
    $user = \Illuminate\Support\Facades\Auth::user();
    return view('/vendor')
        ->with(compact('user'));
});

Route::get('/accountArea/notificaLetta/{id}', 'NotificationController@notificationRead')->name('notificaLetta'); //per farlo andare per adesso, poi dovremo fare in modo che ad ogni notifica corrisponda un link di reindirizzamento (in base alla notifica). Sta roba effettivamente potrebbe non essere semplice.

Route::get('/shops','HomeController@onwork')->name('shops');
Route::get('/privacypolicy','HomeController@onwork')->name('privacypolicy');
Route::get('/info','HomeController@onwork')->name('info');
Route::get('/sellyourcomics','HomeController@onwork')->name('sellerinfo');
Route::get('/regulation','HomeController@onwork')->name('regulation');
Route::get('/contract_terms','HomeController@onwork')->name('contract_terms');


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

Route::get('/accountArea/orderDetailVendor/{id}', 'OrderController@orderDetailVendor')->name('orderDetailVendor');

Auth::routes(); //ehm... perché è stato scritto due volte? nel caso mi leggete rispondetemi su WA DF

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user-delete/{id}','UserController@destroy')->name('user-delete');
Route::get('comic-delete/{id}','ComicController@destroy')->name('comic-delete');
Route::get('comic-delete-vendor/{id}','ComicController@destroyForVendor')->name('comic-delete-vendor');
Route::get('review-delete/{id}','ReviewController@destroy')->name('review-delete');
Route::get('review-deletelocal/{id}','ReviewController@destroylocal')->name('review-delete-local');

Route::get('blog', 'ArticleController@getArticles');
Route::get('/blogDetail/{id}', 'ArticleController@getArticleById')->name('blogDetail');
Route::post('submitComment/{article}', 'CommentController@addToArticle')->name('submitComment');
Route::post('submitphpAnswer/{comment}', 'CommentController@addToComment')->name('submitAnswer');
Route::get('/writeArticle', 'AdminController@checkForWriteArticle')->name('writeArticle');
Route::post('submitArticle/{user_id}', 'ArticleController@addArticle')->name('submitArticle');
Route::get('comment-deletelocal/{id}','CommentController@destroyComment')->name('comment-delete-local');
Route::get('answer-deletelocal/{id}','CommentController@destroyAnswer')->name('answer-delete-local');
Route::get('article-deletelocal/{id}','ArticleController@destroyArticle')->name('article-delete-local');
Route::get('add-to-list/{id}', 'WishlistController@addToList');
Route::get('remove-from-list/{id}', 'WishlistController@removeToList');
Route::get('remove-from-list-case-lost/{id}', 'WishlistController@removeToListCaseLost');
Route::post('addComic', 'ComicController@addComic')->name('addComic');
Route::post('addImagesToComic', 'ImageController@addImagesToComic')->name('addImagesToComic');
Route::redirect('/accountArea', '/accountArea/dashboard');

