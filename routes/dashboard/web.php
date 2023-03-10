<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' , 'admin']
    ],
    function () {

        Route::prefix('dashboard')->group(function () {
            // Home
            Route::get('/','HomeController@index')->name('home');
            // Route::get('import','HomeController@importDrivers');
            // Role
            Route::resource('role','RoleController');

            // ====================HR===========================================
            // Manager
            Route::resource('manager','ManagerController');
            // Driver
            Route::resource('driver','DriverController');
            // Client
            Route::resource('client','ClientController');
            // =====================Location====================================
            // Country
            // Route::resource('country','CountryController');
            // district
            Route::resource('district','DistrictController');
            // City
            Route::resource('city','CityController');
            // feture
            Route::resource('feature','FeatureController');
            // feture
            Route::resource('frontage','FrontageController');
            // category
            Route::resource('category','CategoryController');
            // mowthq
            Route::resource('mowthq','MowthqController');
             // ad
             Route::resource('ad','AdController')->only('index','show','destroy');
             // contract
             Route::resource('contract','ContractController')->only('index','show','destroy');
            // bank
            Route::resource('bank','BankController');
            // ======================Setting====================================
            // Notification
            Route::resource('notification','NotificationController')->only('index','show','store');
            // Setting
            Route::resource('setting','SettingController')->only('index','store');

            // Contact
            Route::resource('contact','ContactController')->only('index','show','store','destroy');
            Route::delete('reply/{reply_id}/delete','ContactController@deleteReply');

            // =============================Utilities=============================

            Route::get('search','HomeController@getSearch');

            Route::get('get_profile','ProfileController@create')->name('profile.get_profile');
            Route::post('update_profile','ProfileController@store')->name('profile.update_profile');
            Route::post('update_password','ProfileController@updatePassword')->name('profile.update_password');

            // ===========================AJAX==================================
            Route::prefix('ajax')->group(function () {

                Route::get('get_cities_by_country/{country_id}','AjaxController@getCitiesByCountry');

                Route::post('get_elm_reply/{driver_id}','AjaxController@getElmReply');
                Route::post('register_driver_to_elm/{driver_id}','AjaxController@registerDriverToElm');

                Route::get('get_users_by_type/{user_type}','AjaxController@getUsersByType');

                Route::get('main_search','AjaxController@getSearch');
                Route::get('get_new_orders','AjaxController@getNewOrders');
                Route::get('get_current_orders','AjaxController@getCurrentOrders');
                Route::get('get_finished_orders','AjaxController@getFinishedOrders');

                Route::post('update_order_status/{order_id}','AjaxController@updateOrderStatus');
                // Delete Images
                Route::delete('delete_app_image/{image_id}','AjaxController@deleteAppImage');

                // Generate Code
                Route::get('generate_code/{char_length?}/{char_type?}/{model?}/{col?}/{letter_type?}','AjaxController@generateCode');
            });
        });
    });
