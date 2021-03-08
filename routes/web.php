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

Route::get('/', function () {
	return view('welcome');
});

Route::get('/quan-tri/category/search', 'CategoryController@search')->name('admin.category.search');
Route::get('/quan-tri/product/search', 'ProductController@search')->name('admin.product.search');
Route::get('/quan-tri/article/search', 'ArticlesController@search')->name('admin.article.search');
Route::get('/quan-tri/banner/search', 'BannerController@search')->name('admin.banner.search');
Route::get('/quan-tri/vendors/search', 'VendorsController@search')->name('admin.vendors.search');
//Route::get('/quan-tri/contact/search', 'ContactController@search')->name('admin.contact.search');
Route::get('/quan-tri/user/search', 'UserController@search')->name('admin.user.search');
Route::get('/quan-tri/order/search', 'OrderController@search')->name('admin.order.search');
Route::get('/quan-tri/setting/search', 'SettingController@search')->name('admin.setting.search');

Route::get('/category/{cate}/delete', 'CategoryController@destroy');
Route::get('/product/{del}/delete', 'ProductController@destroy');
Route::get('/order/{del}/delete', 'OrderController@destroy');
Route::get('/banner/{del}/delete', 'BannerController@destroy');
Route::get('/article/{del}/delete', 'ArticlesController@destroy');
Route::get('/vendors/{del}/delete', 'VendorsController@destroy');
Route::get('/about/{del}/delete', 'AboutController@destroy');
Route::get('/contact/{del}/delete', 'ContactController@destroy');
Route::get('/material/{del}/delete', 'MaterialController@destroy');
Route::get('/user/{del}/delete', 'UserController@destroy');
Route::get('/setting/{del}/delete', 'SettingController@destroy');


Route::get('/log-in', 'AdminController@login')->name('admin.login');
Route::get('/log-out', 'AdminController@logout')->name('admin.logout');
Route::post('/show-dashboard', 'AdminController@show_dashboard')->name('admin.show_dashboard');

Route::group(['prefix' => 'quan-tri', 'as' => 'quan-tri.' , 'middleware'=>'AdminLogin'], function (){
	Route::get('/', 'AdminController@index')->name('admin');
	Route::resource('category','CategoryController');
	Route::resource('product', 'ProductController');
    Route::resource('order', 'OrderController');
	Route::resource('banner', 'BannerController');
	Route::resource('vendors', 'VendorsController');
	Route::resource('material', 'MaterialController');
	Route::resource('article', 'ArticlesController');
    Route::resource('about', 'AboutController');
    Route::resource('contact', 'ContactController');
    Route::resource('user', 'UserController');
    Route::resource('setting', 'SettingController');
    Route::get('user/show-profile/{id}', 'UserController@show_profile')->name('user.show_profile');
    Route::get('user/edit-password/{id}', 'UserController@edit_password')->name('user.edit_password');
    Route::put('user/edit-password/{id}', 'UserController@update_password')->name('user.update_password');
});

Route::get('/', 'XuongMocController@home')->name('xuongmoc');
Route::get('/dang-nhap', 'XuongMocController@login')->name('xuongmoc.login');
Route::post('/dang-nhap', 'XuongMocController@postLogin')->name('xuongmoc.postLogin');
Route::get('/dang-xuat', 'XuongMocController@logout')->name('xuongmoc.logout');
Route::get('/dang-ky', 'XuongMocController@register')->name('xuongmoc.register');
Route::post('/dang-ky', 'XuongMocController@postRegister')->name('xuongmoc.postRegister');
Route::get('/tai-khoan-cua-ban', 'XuongMocController@myProfile')->name('xuongmoc.myProfile');
Route::get('/thong-tin-dia-chi', 'XuongMocController@myAddress')->name('xuongmoc.myAddress');
Route::post('/cap-nhat-thong-tin', 'XuongMocController@updateInfo')->name('xuongmoc.updateInfo');
Route::get('/gioi-thieu', 'XuongMocController@about')->name('xuongmoc.about');
Route::get('/san-pham', 'XuongMocController@product')->name('xuongmoc.product');
Route::get('/chi-tiet-san-pham/{slug}', 'XuongMocController@chiTietSanPham')->name('xuongmoc.chitietsanpham');
Route::get('/tin-tuc', 'XuongMocController@article')->name('xuongmoc.article');
Route::get('/tin-tuc/{slug}', 'XuongMocController@chiTietTinTuc')->name('xuongmoc.chitiettintuc');
Route::get('/doi-tac', 'XuongMocController@vendor')->name('xuongmoc.vendor');
Route::get('/lien-he', 'XuongMocController@contact')->name('xuongmoc.contact');
Route::post('/lien-he', 'XuongMocController@createContact')->name('xuongmoc.create-contact');
Route::get('/ajax-search/{key}', 'XuongMocController@searchAuto')->name('xuongmoc.search-auto');
Route::get('/tim-kiem', 'XuongMocController@search')->name('xuongmoc.search');
Route::get('/gio-hang', 'XuongMocController@cart')->name('xuongmoc.cart');
Route::get('/them-vao-gio-hang/{id}', 'XuongMocController@addcart')->name('xuongmoc.add-cart');
Route::get('/giam-so-luong/{id}', 'XuongMocController@subcart')->name('xuongmoc.sub-cart');
Route::get('/xoa-khoi-gio-hang/{id}', 'XuongMocController@delete')->name('xuongmoc.del-cart');
Route::get('/thanh-toan', 'XuongMocController@checkout')->name('xuongmoc.checkout');
Route::post('/thanh-toan', 'XuongMocController@postCheckOut')->name('xuongmoc.postCheckout');
Route::get('/{slug}', 'XuongMocController@danhmuc')->name('xuongmoc.danhmuc');

