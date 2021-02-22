<?php

use Illuminate\Support\Facades\Route;

// verify 邮箱验证参数 开启-true
Auth::routes(['verify' => true]);

// Route::get('/', 'PagesController@root')->name('root')->middleware('verified');
// Route::get('/', 'PagesController@root')->name('root');
Route::redirect('/', '/products')->name('root');
Route::get('products', 'ProductsController@index')->name('products.index');
// 商品详情
Route::get('products/{product}', 'ProductsController@show')->name('products.show')->where(['product' => '[0-9]+']);

// auth 中间件代表需要登录，verified中间件代表需要经过邮箱验证
Route::group(['middleware' => ['auth', 'verified']], function() {
    // 地址列表
    Route::get('user_addresses', 'UserAddressesController@index')->name('user_addresses.index');
    //  新建地址页面
    Route::get('user_addresses/create', 'UserAddressesController@create')->name('user_addresses.create');
    // 新建地址
    Route::post('user_addresses', 'UserAddressesController@store')->name('user_addresses.store');
    // 编辑地址页面
    Route::get('user_addresses/{user_address}', 'UserAddressesController@edit')->name('user_addresses.edit');
    // 编辑地址
    Route::put('user_addresses/{user_address}', 'UserAddressesController@update')->name('user_addresses.update');
    // 删除地址
    Route::delete('user_addresses/{user_address}', 'UserAddressesController@destroy')->name('user_addresses.destroy');

    // 收藏&取消收藏商品
    Route::post('products/{product}/favorite', 'ProductsController@favor')->name('products.favor');
    Route::delete('products/{product}/favorite', 'ProductsController@disfavor')->name('products.disfavor');
    // 收藏列表
    Route::get('products/favorites', 'ProductsController@favorites')->name('products.favorites');
    // 购物车
    Route::post('cart', 'CartController@add')->name('cart.add');
    Route::get('cart', 'CartController@index')->name('cart.index');
    Route::delete('cart/{sku}', 'CartController@remove')->name('cart.remove');

    // 创建订单
    Route::post('orders', 'OrdersController@store')->name('orders.store');
    // 用户订单
    Route::get('orders', 'OrdersController@index')->name('orders.index');
    // 订单详情
    Route::get('orders/{order}', 'OrdersController@show')->name('orders.show');
});
