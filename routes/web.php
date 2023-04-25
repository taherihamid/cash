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
});
Route::prefix('notifications')->name('dashboard.notifications.')->group(function (){


});

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/demo', 'HomeController@demo')->name('demo');
Route::post('/set_new_invoice', 'InvoiceController@setNewInvoice')->name('set_new_invoice');

//
//
////
//Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('user.login');
//Route::post('login', 'Auth\LoginController@login')->name('user.login');
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
//Route::post('register', 'Auth\RegisterController@register')->name('user.register.submit');

Route::prefix('agent')->name('agent.')->namespace('Agent\Auth')->group(function () {

    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
    Route::get('/login', 'LoginController@showLoginForm')->name('login');

    Route::post('/register', 'RegisterController@register')->name('registers');
    Route::post('/login', 'LoginController@login')->name('logins');

    Route::get('/logout', 'LoginController@agentLogout')->name('logouts');
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');

});
Route::prefix('merchant')->name('merchant.')->namespace('Merchant\Auth')->group(function () {

    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
    Route::get('/login', 'LoginController@showLoginForm')->name('login');

    Route::post('/register', 'RegisterController@register')->name('registers');
    Route::post('/login', 'LoginController@login')->name('logins');

    Route::get('/logout', 'LoginController@merchantLogout')->name('logouts');
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});


Route::group(['middleware' => ['agent']], function () {
    Route::get('/agent-panel', 'Agent\DashboardController@index')->name('agent.dashboard');
//    Route::get('/agentPanel', 'Agent\DashboardController@index')->name('agent.dashboard');

    Route::get('/agent-cash-out', 'Agent\DashboardController@cashOut')->name('agent.cash_out');
    Route::get('/agent-top-up', 'Agent\DashboardController@topUp')->name('agent.top_up');
    Route::get('/agent-contact-support', 'Agent\ContactController@index')->name('agent.contact_support.index');
    Route::post('/agent-contact-support', 'Agent\ContactController@store')->name('agent.contact_support.store');

    Route::post('/addAgentCashRequest', 'Agent\DashboardController@addAgentCashRequest')->name('addAgentCashRequest');
    Route::post('/addAgentTopRequest', 'Agent\DashboardController@addAgentTopRequest')->name('addAgentTopRequest');

});
Route::group(['middleware' => ['merchant']], function () {

//    Route::get('/merchantPanel', 'Merchant\DashboardController@index')->name('merchant.dashboard');
    Route::get('/merchant-panel', 'Merchant\DashboardController@index')->name('merchant.dashboard');
    Route::get('/merchant-cash-out', 'Merchant\DashboardController@cashOut')->name('merchant.cash_out');

    Route::post('/addMerchantCashRequest', 'Merchant\DashboardController@addMerchantCashRequest')->name('addMerchantCashRequest');

    Route::get('/merchant-contact-support', 'Merchant\ContactController@index')->name('merchant.contact_support.index');
    Route::post('/merchant-contact-support', 'Merchant\ContactController@store')->name('merchant.contact_support.store');
    Route::post('/merchantIndexFilter', 'Merchant\DashboardController@merchantIndexFilter')->name('merchantIndexFilter');
});
Route::prefix('agent')->name('agents.')->group(function () {

    Route::get('/payments', 'Agent\DashboardController@payments')->name('payments');
    Route::post('/get-agent-detail', 'Agent\DashboardController@getInvoiceDetail')->name('get_invoice_detail');
    Route::post('/get-agent-amount', 'Agent\DashboardController@getInvoiceAmount')->name('get_invoice_amount');

});


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


