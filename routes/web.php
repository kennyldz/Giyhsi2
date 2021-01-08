<?php

use Illuminate\Support\Facades\Route;



//Kullanıcı Girişi Yapmak için
Route::prefix('kullanici')->name('kullanici.')->middleware('isLogin')->group(function(){
    Route::get('giris','App\Http\Controllers\kullanici\kullanici@Userlogin')->name('Userlogin');
    Route::get('uyeol','App\Http\Controllers\kullanici\kullanici@Userregister')->name('UserRegister');

});
//Kullanıcı Girişi yapıldıktan sonra
Route::prefix('kullanici')->name('kullanici.')->middleware('isUser')->group(function(){
   Route::get('hesabim','App\Http\Controllers\kullanici\kullanici@account')->name('account');

   /*Ürün*/
    //Yükle Sayfa
   Route::get('hesabim/urunyukle','App\Http\Controllers\kullanici\kullanici@ProductAdd')->name('ProductAdd');
    //ürünü yükle
    Route::post('hesabim','App\Http\Controllers\kullanici\kullanici@CreateProduct')->name('Create.Product');
    //ürünler sayfası
    Route::get('hesabim/urunlerim','App\Http\Controllers\kullanici\kullanici@Products')->name('Products');
    //Ürün İptal
    Route::post('hesabim/urunlerim','App\Http\Controllers\kullanici\kullanici@CancelProduct')->name('Product.Cancel');
   /* */
   //Siparişlerim
   Route::get('hesabim/siparislerim','App\Http\Controllers\kullanici\kullanici@Orders')->name('Orders');
   Route::post('hesabim/siparislerim','App\Http\Controllers\kullanici\kullanici@CancelOrder')->name('Order.Cancel');
   //Lokum Geçmişi
   Route::get('hesabim/lokum','App\Http\Controllers\kullanici\kullanici@DelightsList')->name('Delights.List');

   //Profil
    Route::get('hesabim/profilim','App\Http\Controllers\kullanici\kullanici@Profile')->name('Profile');
    Route::post('hesabim/profilim','App\Http\Controllers\kullanici\kullanici@ProfileUpdate')->name('Profile.Update');
    //Gelen İstekler
    Route::get('hesabim/istekler','App\Http\Controllers\kullanici\kullanici@RequestProduct')->name('Request.Product');
    Route::post('hesabim/istekler','App\Http\Controllers\kullanici\kullanici@RequestUptade')->name('RequestUptade');
    //Satın Al
   Route::get('satinal/{slug}','App\Http\Controllers\kullanici\SepetController@index')->name('satin.al');
   Route::post('satinal','App\Http\Controllers\kullanici\SepetController@CreateOrder')->name('Create.Order');
   //Hediye lokum yükle
   Route::get('hediyelokum','App\Http\Controllers\kullanici\kullanici@CreateDelight')->name('Create.Delight');


});

/*
Admin
 * */
//Admin Sayfalar
Route::prefix('admin')->middleware('isAdmin')->group(function() {
    Route::get('dashboard', 'App\Http\Controllers\admin\IndexController@Index')->name('admin');
#Ürünler->işlemler-Onay-Düzenleme
    Route::resource('urunislemler', 'App\Http\Controllers\admin\ProductController');
#siparişler->işlemler-düzenleme
    Route::resource('siparisislemler', 'App\Http\Controllers\admin\OrderController');
#üyeler->işlemler
    Route::resource('uyeislemler', 'App\Http\Controllers\admin\UserController');
#Kategoriler -> işlemler
    Route::resource('kategoriislemler', 'App\Http\Controllers\admin\CategoryController');
#Sliders->işlemler
    Route::resource('sliderislemler', 'App\Http\Controllers\admin\SliderController');
#sosyal medya->işlemler
    Route::resource('sosyalmedya', 'App\Http\Controllers\admin\SocialController');
#Gelen mesajlar->işlemler
    Route::resource('gelenmesajlar', 'App\Http\Controllers\admin\MessageController');
});


/*
|Front
 */
Route::get('/','App\Http\Controllers\Front\HomePage@index')->name('HomePage');
//Ürün detay için
Route::get('/UrunDetay/{slug}','App\Http\Controllers\Front\HomePage@ProductDetail')->name('UrunDetay');
//KAtegori sayfası için
Route::get('/Kategori/{slug}','App\Http\Controllers\Front\CategoryHomePage@index')->name('Kategori');
//iletişim sayfası için
Route::get('/iletisim','App\Http\Controllers\Front\HomePage@contact')->name('contact');
//İletişim Sayfası contact gönder
Route::post('/iletisim','App\Http\Controllers\Front\HomePage@contactpost')->name('contact.post');

Route::get('/bildirim','App\Http\Controllers\kullanici\kullanici@bildirim')->name('bildirim');
