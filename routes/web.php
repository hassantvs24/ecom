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

Route::get('/', 'Front\HomeController@index')->name('site')->middleware('website');

Route::get('shop', 'Front\ProductController@index')->name('site-shop')->middleware('website');
Route::get('product/list', 'Front\ProductController@product_list')->name('product-list')->middleware('website');
Route::get('product/{id}', 'Front\ProductController@product_details')->name('details-product')->middleware('website');

Route::get('redeem', 'Front\RedemptionController@index')->name('site-redeem')->middleware('website');
Route::get('redeem/item/{id}', 'Front\RedemptionController@product_list')->name('item-redeem')->middleware('website');
Route::get('redeem/cart', 'Front\RedemptionController@add_cart')->name('cart-redeem')->middleware('website');
Route::post('redeem/bulk', 'Front\RedemptionController@add_bulk')->name('bulk-redeem')->middleware('website');
Route::get('redeem/del/{id}', 'Front\RedemptionController@del_cart')->name('del-redeem-cart')->middleware('website');

Route::get('promotion', 'Front\PromotionController@index')->name('site-promotion')->middleware('website');

Route::get('cart', 'Front\CartController@index')->name('cart')->middleware('website');
Route::get('cart/add', 'Front\CartController@add_cart')->name('add-cart')->middleware('website');
Route::post('cart/add', 'Front\CartController@add_bulk')->name('add-cart-bulk')->middleware('website');
Route::get('cart/show', 'Front\CartController@show_cart')->name('show-cart')->middleware('website');
Route::get('cart/proceed', 'Front\CartController@before_checkout')->name('proceed')->middleware('website');
Route::get('cart/summary/{id}', 'Front\CartController@summary')->name('summary')->middleware('website');
Route::post('cart/checkout', 'Front\CartController@checkout')->name('checkout')->middleware('website');
Route::get('cart/del/{id}', 'Front\CartController@del_cart')->name('del-cart')->middleware('website');


Route::get('user_access', 'Front\LoginRegisterController@index')->name('login-register')->middleware('website');
Route::get('refer/{id}', 'Front\LoginRegisterController@referral_code')->name('login-ref')->middleware('website');
Route::post('user_save', 'Front\LoginRegisterController@save')->name('user-save')->middleware('website');
Route::post('user_login', 'Front\LoginRegisterController@login')->name('user-login')->middleware('website');
Route::get('user/profile', 'Front\LoginRegisterController@profile')->name('profile')->middleware('website');
Route::get('user/profile/show', 'Front\LoginRegisterController@show_profile_update')->name('profile-up-show')->middleware('website');
Route::post('user/profile/update', 'Front\LoginRegisterController@update_profile')->name('profile-update')->middleware('website');

Route::post('user/summery/distributor', 'Front\LoginRegisterController@show_summary_distributor')->name('summery-distributor')->middleware('website');
Route::post('user/summery/customer', 'Front\LoginRegisterController@show_summary_customer')->name('summery-customer')->middleware('website');


Route::get('chat', 'Front\ChatController@index')->name('chat')->middleware('website');
Route::post('chat', 'Front\ChatController@chat_req')->name('chat-start')->middleware('website');
Route::post('chat/customer', 'Front\ChatController@chat_customer')->name('chat-customer')->middleware('website');
Route::get('chat/history/{id}', 'Front\ChatController@chat_history')->name('chat-history')->middleware('website');
Route::get('chat/adname/{id}', 'Front\ChatController@admin_name')->name('chat-adname')->middleware('website');
Route::get('chat/end/{id}', 'Front\ChatController@end_chat')->name('chat-end')->middleware('website');

Route::get('about', 'Front\AboutController@index')->name('about')->middleware('website');
Route::get('contact', 'Front\ContactController@index')->name('contact')->middleware('website');


Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard')->middleware('access');

        //Consumer
        Route::get('consumer/customer', 'Consumer\CustomerController@index')->name('customer')->middleware('access');
        Route::get('consumer/distributor', 'Consumer\DistributorController@index')->name('distributor')->middleware('access');
        Route::get('consumer/salesman', 'Consumer\SalesmanController@index')->name('salesman')->middleware('access');

        Route::get('consumer/show/{id}', 'Consumer\CustomerController@view_customer')->name('consumer-view')->middleware('access');

        Route::post('consumer/points', 'Consumer\CustomerController@points')->name('customer-points')->middleware('access');
        Route::post('consumer/commission', 'Consumer\CustomerController@commission')->name('customer-commission')->middleware('access');

        Route::post('consumer/save', 'Consumer\CustomerController@save')->name('consumer-save')->middleware('access');
        Route::post('consumer/ref/edit', 'Consumer\CustomerController@edit_ref')->name('consumer-ref-edit')->middleware('access');
        Route::post('consumer/profile/edit', 'Consumer\CustomerController@edit_profile')->name('consumer-profile-edit')->middleware('access');
        //Consumer


        //Advertise
        Route::get('advertise', 'Advertise\AdvertiseController@index')->name('advertise')->middleware('access');
        Route::post('advertise/save', 'Advertise\AdvertiseController@save')->name('advertise-save')->middleware('access');
        Route::post('advertise/edit', 'Advertise\AdvertiseController@edit')->name('advertise-edit')->middleware('access');
        Route::get('advertise/del/{id}', 'Advertise\AdvertiseController@del')->name('advertise-del')->middleware('access');
        Route::get('advertise/active/{id}', 'Advertise\AdvertiseController@active')->name('advertise-active')->middleware('access');
        //Advertise

        //Order
        Route::get('order/all', 'Order\AllOrderController@index')->name('orders')->middleware('access');
        Route::get('order/complete', 'Order\CompleteOrderController@index')->name('complete')->middleware('access');
        Route::get('order/paid', 'Order\PaidOrderController@index')->name('paid')->middleware('access');
        Route::get('order/process', 'Order\ProcessingOrderController@index')->name('process')->middleware('access');
        Route::get('order/shipped', 'Order\ShippedOrderController@index')->name('shipped')->middleware('access');
        Route::post('order/shipped', 'Order\ProcessingOrderController@shippedOrder')->name('track-update')->middleware('access');
        Route::get('order/cancel/list', 'Order\CompleteOrderController@cancel_list')->name('cancel')->middleware('access');

        Route::get('order/show/{id}', 'Order\AllOrderController@show')->name('order-show')->middleware('access');
        Route::get('order/status/{id}/{status}', 'Order\AllOrderController@status')->name('order-status')->middleware('access');
        Route::get('order/del/{id}', 'Order\AllOrderController@del')->name('order-del')->middleware('access');
        Route::get('order/cancel/{id}', 'Order\AllOrderController@cancel')->name('order-cancel')->middleware('access');

        Route::get('order/report', 'Order\CompleteOrderController@order_report')->name('orders-report')->middleware('access');
        Route::post('order/report', 'Order\CompleteOrderController@export_report')->name('export-report');

        Route::post('order/mark', 'Order\PaidOrderController@mark_action')->name('orders-mark')->middleware('access');
        //Order

        //Product
        Route::get('product/product', 'Product\ProductController@index')->name('product')->middleware('access');
        Route::post('product/save', 'Product\ProductController@save')->name('product-save')->middleware('access');
        Route::post('product/edit', 'Product\ProductController@edit')->name('product-edit')->middleware('access');
        Route::get('product/del/{id}', 'Product\ProductController@del')->name('product-del')->middleware('access');
        Route::get('product/product/swap/{id}/{col}', 'Product\ProductController@swap_img')->name('product-swap');//Swap Image

        Route::get('product/promotional', 'Product\PromotionalController@index')->name('promotional')->middleware('access');
        Route::post('product/promotional/save', 'Product\PromotionalController@save')->name('promotional-save')->middleware('access');
        Route::post('product/promotional/edit', 'Product\PromotionalController@edit')->name('promotional-edit')->middleware('access');
        Route::get('product/promotional/del/{id}', 'Product\PromotionalController@del')->name('promotional-del')->middleware('access');
        //Product

        //Redemption
        Route::get('redemption', 'Redemption\RedemptionController@index')->name('redemption')->middleware('access');
        Route::post('redemption/save', 'Redemption\RedemptionController@save')->name('redemption-save')->middleware('access');
        Route::post('redemption/edit', 'Redemption\RedemptionController@edit')->name('redemption-edit')->middleware('access');
        Route::get('redemption/del/{id}', 'Redemption\RedemptionController@del')->name('redemption-del')->middleware('access');

        Route::get('redemption/list/{id}', 'Redemption\RedemptionController@list')->name('redemption-list')->middleware('access');
        Route::post('redemption/list/save', 'Redemption\RedemptionController@save_list')->name('redemption-list-save')->middleware('access');
        Route::post('redemption/list/edit', 'Redemption\RedemptionController@edit_list')->name('redemption-list-edit')->middleware('access');
        Route::get('redemption/list/del/{id}', 'Redemption\RedemptionController@del_list')->name('redemption-list-del')->middleware('access');
        //Redemption


        //Shipping
        Route::get('shipping/rate', 'Shipping\RateRegistrarController@index')->name('rate')->middleware('access');
        Route::post('shipping/rate/save', 'Shipping\RateRegistrarController@save')->name('rate-save')->middleware('access');
        Route::post('shipping/rate/edit', 'Shipping\RateRegistrarController@edit')->name('rate-edit')->middleware('access');
        Route::get('shipping/rate/del/{id}', 'Shipping\RateRegistrarController@del')->name('rate-del')->middleware('access');

        Route::get('shipping/carrier', 'Shipping\CarrierController@index')->name('carrier')->middleware('access');
        Route::post('shipping/carrier/save', 'Shipping\CarrierController@save')->name('carrier-save')->middleware('access');
        Route::post('shipping/carrier/edit', 'Shipping\CarrierController@edit')->name('carrier-edit')->middleware('access');
        Route::get('shipping/carrier/del/{id}', 'Shipping\CarrierController@del')->name('carrier-del')->middleware('access');

        Route::get('shipping/location', 'Shipping\LocationController@index')->name('location')->middleware('access');
        Route::post('shipping/location/save', 'Shipping\LocationController@save')->name('location-save')->middleware('access');
        Route::post('shipping/location/edit', 'Shipping\LocationController@edit')->name('location-edit')->middleware('access');
        Route::get('shipping/location/del/{id}', 'Shipping\LocationController@del')->name('location-del')->middleware('access');
        //Shipping


        //Chat
        Route::get('chat', 'Chat\ChatController@index')->name('adchat')->middleware('access');
        Route::get('chat/start/{id}', 'Chat\ChatController@start')->name('adchat-start')->middleware('access');
        Route::post('chat/start', 'Chat\ChatController@messaging')->name('chat-messaging')->middleware('access');
        Route::get('chat/history/{id}', 'Chat\ChatController@chat_history')->name('adchat-history')->middleware('access');
        Route::get('chat/end/{id}', 'Chat\ChatController@end_chat')->name('adchat-end')->middleware('access');
        Route::get('chat/del/{id}', 'Chat\ChatController@del_chat')->name('adchat-del')->middleware('access');
        //Chat

        //Web Page
        Route::get('page/webpage', 'Page\PageController@index')->name('webpage')->middleware('access');
        Route::post('page/about', 'Page\PageController@about')->name('page-about')->middleware('access');
        Route::post('page/contact', 'Page\PageController@contact')->name('page-contact')->middleware('access');
        Route::post('page/bank', 'Page\PageController@bank')->name('page-bank')->middleware('access');

        Route::get('page/banner', 'Page\BannerController@index')->name('banner')->middleware('access');
        Route::post('page/banner', 'Page\BannerController@save')->name('banner-save')->middleware('access');
        //Web Page


        //User
        Route::get('user/all', 'User\UserController@index')->name('user')->middleware('access');
        Route::post('user/save', 'User\UserController@save')->name('users-save')->middleware('access');
        Route::post('user/edit', 'User\UserController@edit')->name('users-edit')->middleware('access');
        Route::get('user/del/{id}', 'User\UserController@del')->name('users-del')->middleware('access');

        Route::get('user/role', 'User\RoleController@index')->name('role')->middleware('access');
        Route::post('user/role/save', 'User\RoleController@save')->name('role-save')->middleware('access');
        Route::post('user/role/edit', 'User\RoleController@edit')->name('role-edit')->middleware('access');
        Route::get('user/role/del/{id}', 'User\RoleController@del')->name('role-del')->middleware('access');
        Route::get('user/role/permission/{id}', 'User\RoleController@permission')->name('role-permission')->middleware('access');
        Route::post('user/update/permission', 'User\RoleController@update_permission')->name('update-permission')->middleware('access');
        //User

    });
});

Route::get('user/verify/{token}', 'Auth\RegisterController@verifyUser');



//=============== Cookie Controller =======================
Route::get('uniq_id', 'Front\HomeController@create_session')->name('uniq-id');
//=============== /Cookie Controller =======================

//=============== Test Controller =======================
Route::get('test', 'TestController@index');
//=============== /Test Controller =======================


//==================== Toggle Sidebar =======================
Route::get('savestate', 'MainController@saveState');
//Route::get('key', 'MainController@key');
//==================== /Toggle Sidebar =======================

Route::get('/catch', function () {
    Artisan::call('config:cache');
    Artisan::call('view:cache');
   // Artisan::call('cache:clear');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/exp', function () {
    return view('errors.exp');
})->name('exp');

Route::get('/access', function () {
    return view('errors.access');
})->name('access');
