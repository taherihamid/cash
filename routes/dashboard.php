<?php

use Illuminate\Routing\Route as IlluminateRoute;
use App\Classes\CaseInsensitiveUriValidator;
use Illuminate\Routing\Matching\UriValidator;

$validators = IlluminateRoute::getValidators();
$validators[] = new CaseInsensitiveUriValidator;
IlluminateRoute::$validators = array_filter($validators, function ($validator) {
    return get_class($validator) != UriValidator::class;
});


Route::group(['middleware' => ['admin', 'minify']], function () {
    Route::get('/panel', 'DashboardController@index')->name('dashboard');

    Route::prefix('agent')->name('agent.')->group(function () {
        Route::get('/index', 'AgentController@index')->name('index');
        Route::get('/create', 'AgentController@create')->name('create');
        Route::post('/store', 'AgentController@store')->name('store');


        Route::post('/updateAgentInfo', 'AgentController@updateAgentInfo');
        Route::post('/sentAgentEmail', 'AgentController@sentAgentEmail');
        Route::post('/updateSettlementRequest', 'AgentController@updateSettlementRequest');

        Route::get('/filter', 'AgentController@filter')->name('filter');
        Route::get('/updateAvailableCredit', 'AgentController@updateAvailableCredit')->name('updateAvailableCredit');
    });


    Route::prefix('merchant')->name('merchant.')->group(function () {

        Route::get('/index', 'MerchantController@index')->name('index');
        Route::get('/create', 'MerchantController@create')->name('create');
        Route::post('/store', 'MerchantController@store')->name('store');




        Route::post('/updateMerchantInfo', 'MerchantController@updateMerchantInfo');
        Route::post('/sentMerchantEmail', 'MerchantController@sentMerchantEmail');
        Route::get('/fetchSettlementRequest', 'MerchantController@fetchSettlementRequest')->name('fetchSettlementRequest');
        Route::post('/updateSettlementRequest', 'MerchantController@updateSettlementRequest');
    });


    Route::get('/partnership', 'PartnerRequestController@index')->name('partner.index');
    Route::get('/top-up-request', 'ClientRequestController@topUp')->name('top_request');
    Route::get('/settlement-request', 'ClientRequestController@settlement')->name('settlement');
    Route::get('/fetchAgentSett', 'ClientRequestController@fetchAgentSett')->name('fetchAgentSett');

    Route::get('/top-request-list', 'ClientRequestController@topRequestList')->name('top_request.index');
    Route::post('/updateTopRequestStatus', 'ClientRequestController@updateTopRequestStatus')->name('updateTopRequestStatus');

    Route::get('/partnership-request-list', 'PartnerRequestController@partnerRequestList')->name('partner_request.index');

    Route::post('/updateClientStatus', 'PartnerRequestController@updateClientStatus')->name('updateClientStatus');




    Route::resource('/system', 'SystemController');


    Route::prefix('notifications')->name('notifications.')->group(function () {

    });

    Route::resource('/login-attempt', 'LoginAttemptController');

    Route::resource('/admin', 'AdminController');
    Route::resource('/roles', 'RoleController');


    Route::prefix('setting')->name('setting.')->group(function () {

    });
    Route::prefix('menu')->name('menu.')->group(function () {

        Route::get('/', 'MenuController@index')->name('index');
        Route::get('/subMenu', 'MenuController@subMenu')->name('subMenu');
        Route::get('/editSubMenu', 'MenuController@editSubMenu')->name('editSubMenu');
        Route::post('/main-menu-store', 'MenuController@mainMenuStore')->name('main_menu_store');
        Route::post('/store', 'MenuController@store')->name('store');
        Route::post('/update-sub-menu', 'MenuController@updateSubMenu')->name('update_sub_menu');


        Route::get('/editMenu', 'MenuController@editMenu')->name('editMenu');
        Route::post('/updateMenu', 'MenuController@updateMenu')->name('updateMenu');

        Route::get('/dropMainMenu/{id}', 'MenuController@dropMainMenu')->name('dropMainMenu');
        Route::get('/dropSubMenuItem/{id}', 'MenuController@dropSubMenuItem')->name('dropSubMenuItem');
    });

    Route::resource('/setting', 'SettingController');
});
