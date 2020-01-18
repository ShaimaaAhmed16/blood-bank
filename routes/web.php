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

//Route::get('/', function () {
//    $user = \App\User::create(
//        [
//            'name' => 'shimaa',
//            'email' => 'admin@admin.com',
//            'password' => bcrypt(12345678)
//        ]
//    );
//   return view('welcome');
//});

Route::group(['namespace'=>'Front'],function (){
    Route::get('signup','AuthController@register');
    Route::post('sinup','AuthController@registerSave')->name('sinup');
    Route::get('login-user','AuthController@login');
    Route::post('login-user','AuthController@loginsave')->name('sigin');
    Route::get('reset-password-user','MainController@rsetpassword');
    Route::get('sendMessage','MainController@sendMessage');
    Route::post('changePassword','MainController@changePassword');
    Route::get('password-client','AuthController@changePasswordView');
    Route::post('password-client','AuthController@changePassword');
    Route::group(['middleware'=>'auth:client-web'],function () {
        Route::get('index', 'MainController@home');
        Route::get('about', 'MainController@about');
        Route::get('donate/{id}', 'MainController@donate');
        Route::get('profile-user/{id}', 'AuthController@Profile');
        Route::post('profile-update/{id}', 'AuthController@profileUpdate');
        Route::get('donations', 'MainController@donation');
        Route::get('contacts', 'MainController@contact');
        Route::post('contactus', 'MainController@contacts');
        Route::get('logout-user', 'AuthController@logout');
        Route::get('weare', 'MainController@weare');
        Route::get('search', 'MainController@Search');
        Route::get('settingnotification','MainController@settingnotifcation');
        Route::get('add','MainController@add');
        Route::post('create','MainController@create');
        Route::post('notification-settings','MainController@notificationSettings');
        Route::post('toggle-favourite', 'MainController@toggleFavourite')->name('toggle-favourite');
    });
});
//,'middleware'=>'auth:client-web'
Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('login'));
});
//Route::get('/change', function () {
//    return view('admin/change');
//});
Auth::routes();
//Route::get('hash' , function ()
//{
//    return \Illuminate\Support\Facades\Hash::make(123123123);
//});
Route::group(['middleware' => ['auth:web','auto-check-permission']] , function ()
{
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/reset-password', 'HomeController@resetPassword')->name('resetPassword');
    Route::get('/reset-password', 'HomeController@resetPasswordView')->name('resetPassword');
    Route::resource('governorate','GovernorateController');
    Route::resource('city','CityController');
    Route::resource('client','ClientController');
    Route::resource('post','PostController');
    Route::resource('category','CategoryController');
    Route::resource('contact','ContactController');
    Route::resource('setting','SettingController');
    Route::resource('user','UserController');
    Route::resource('role','RoleController');
    Route::resource('donation','DonationController');
    Route::get('client/{id}/active','ClientController@active');
    Route::get('client/{id}/deactive','ClientController@deactive');

});



