<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1' , 'namespace' =>'Api'],function (){
    Route::post('register','AthController@register');
    Route::post('login','AthController@login');

    Route::group(['middleware'=>'auth:api'],function (){
        Route::get('governorates','MainController@governorates');
        Route::get('cities','MainController@cities');
        Route::get('posts','MainController@posts');
        Route::post('donations','MainController@donations');
        Route::post('profile','MainController@profile');
        Route::post('registerToken','AthController@registerToken');
        Route::post('removeToken','AthController@removeToken');
        Route::post('notificationsettings','AthController@notificationSettings');
        Route::get('viewnotificationsettings','AthController@viewNotificationSettings');
        Route::post('togglefavourite','AthController@toggleFavourite');
        Route::get('favourite','AthController@favourite');
        Route::post('donationwithsearch','MainController@donationWithSearch');
        Route::post('isread','MainController@isRead');
        //confairme password
        Route::post('sendMessage','MainController@sendMessage');
        Route::post('changePassword','AthController@changePassword');
        // end confairme
        Route::get('categories','MainController@categories');
        Route::get('bloodType','MainController@bloodType');
        Route::post('postWithSearch','MainController@postWithSearch');
        Route::post('contactUs','MainController@contactUs');
        Route::get('setting','MainController@setting');
    });
});