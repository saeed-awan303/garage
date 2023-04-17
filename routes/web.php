<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
Route::get('/user', function () {
    return view('auth.user');
});
Route::get('/clear',function(){
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
});

Auth::routes();

Route::group([
    'middleware'    => ['auth'],
    'prefix'        => 'client',
    'namespace'     => 'Client'
], function ()
{
    Route::get('/dashboard', 'ClientController@index')->name('client.dashboard');
	Route::get('/profile', 'ClientController@edit')->name('client-profile');
	Route::post('/admin-update', 'ClientController@update')->name('client-update');


});

Route::group([
    'middleware'    => ['auth','is_admin'],
    'prefix'        => 'admin',
    'namespace'     => 'Admin'
], function ()
{
    

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/profile', 'AdminController@edit')->name('admin-profile');
    Route::post('/admin-update', 'AdminController@update')->name('admin-update');
    //Setting Routes
    Route::resource('setting','SettingController');

	//User Routes
	Route::resource('clients','ClientController');
	Route::post('get-clients', 'ClientController@getClients')->name('admin.getClients');
	Route::post('get-client', 'ClientController@clientDetail')->name('admin.getClient');
	Route::get('client/delete/{id}', 'ClientController@destroy');
	Route::post('delete-selected-clients', 'ClientController@deleteSelectedClients')->name('admin.delete-selected-clients');

    //Roles
    Route::resource('roles','RoleController');
	Route::post('get-roles', 'RoleController@getRoles')->name('admin.getRoles');
	Route::post('get-role', 'RoleController@roleDetail')->name('admin.getRole');
	Route::get('role/delete/{id}', 'RoleController@destroy');
	Route::post('delete-selected-role', 'RoleController@deleteSelectedRoles')->name('admin.delete-selected-roles');

    //Permissions
    Route::resource('permissions','PermissionController');
	Route::post('get-permissions', 'PermissionController@getPermissions')->name('admin.getPermissions');
	Route::post('get-permission', 'PermissionController@permissionDetail')->name('admin.getPermission');
	Route::get('permission/delete/{id}', 'PermissionController@destroy');
	Route::post('delete-selected-permissions', 'PermissionController@deleteSelectedPermission')->name('admin.delete-selected-permissions');

    //categories Routes
	Route::resource('categories','CategoryController');
	Route::post('get-categories', 'CategoryController@getCategories')->name('admin.getCategories');
	Route::post('get-category', 'CategoryController@categoryDetail')->name('admin.getCategory');
	Route::get('category/delete/{id}', 'CategoryController@destroy');
	Route::post('delete-selected-categories', 'CategoryController@deleteSelectedClients')->name('admin.delete-selected-categories');

    //CUSTOME Routes
	Route::resource('customs','CustomQouteController');
	Route::post('get-customs', 'CustomQouteController@getCustoms')->name('admin.getCustoms');
	Route::post('get-custom', 'CustomQouteController@customDetail')->name('admin.getCustom');
	Route::get('custom/delete/{id}', 'CustomQouteController@destroy');
	Route::post('delete-selected-customs', 'CustomQouteController@deleteSelectedClients')->name('admin.delete-selected-customs');

    //faq_cats Routes
	Route::resource('faq_cats','FaqCategoryController');
	Route::post('get-faq_cats', 'FaqCategoryController@getFaq_cats')->name('admin.getFaq_cats');
	Route::post('get-faq_cat', 'FaqCategoryController@faq_catDetail')->name('admin.getFaq_cat');
	Route::get('faq_cats/delete/{id}', 'FaqCategoryController@destroy');
	Route::post('delete-selected-faq_cats', 'FaqCategoryController@deleteSelectedClients')->name('admin.delete-selected-faq_cats');

    //faqs Routes
	Route::resource('faqs','FaqController');
	Route::post('get-faqs', 'FaqController@getfaqs')->name('admin.getfaqs');
	Route::post('get-faq', 'FaqController@faqDetail')->name('admin.getfaq');
	Route::get('faq/delete/{id}', 'FaqController@destroy');
	Route::post('delete-selected-faqs', 'FaqController@deleteSelectedClients')->name('admin.delete-selected-faqs');

	 //makes Routes
	 Route::resource('makes','MakesController');
	 Route::post('get-makes', 'MakesController@getmakes')->name('admin.getmakes');
	 Route::post('get-make', 'MakesController@makeDetail')->name('admin.getmake');
	 Route::get('make/delete/{id}', 'MakesController@destroy');
	 Route::post('delete-selected-makes', 'MakesController@deleteSelectedClients')->name('admin.delete-selected-makes');

	 //model Routes
	 Route::resource('models','ModelController');
	 Route::post('get-models', 'ModelController@getmodels')->name('admin.getmodels');
	 Route::post('get-model', 'ModelController@modelDetail')->name('admin.getmodel');
	 Route::get('model/delete/{id}', 'ModelController@destroy');
	 Route::post('delete-selected-models', 'ModelController@deleteSelectedClients')->name('admin.delete-selected-models');

	 //Fuel_type Routes
	 Route::resource('fuels','FuelTypeController');
	 Route::post('get-fuels', 'FuelTypeController@getfuels')->name('admin.getfuels');
	 Route::post('get-fuel', 'FuelTypeController@fuelDetail')->name('admin.getfuel');
	 Route::get('fuel/delete/{id}', 'FuelTypeController@destroy');
	 Route::post('delete-selected-fuels', 'FuelTypeController@deleteSelectedClients')->name('admin.delete-selected-fuels');

	//Fuel_type Routes
	Route::resource('engines','EngineCapacityController');
	Route::post('get-engines', 'EngineCapacityController@getengines')->name('admin.getengines');
	Route::post('get-engine', 'EngineCapacityController@engineDetail')->name('admin.getengine');
	Route::get('engine/delete/{id}', 'EngineCapacityController@destroy');
	Route::post('delete-selected-engines', 'EngineCapacityController@deleteSelectedClients')->name('admin.delete-selected-engines');

	//Fuel_type Routes
	Route::resource('services','ServiceController');
	Route::post('get-services', 'ServiceController@getservices')->name('admin.getservices');
	Route::post('get-service', 'ServiceController@serviceDetail')->name('admin.getservice');
	Route::get('service/delete/{id}', 'ServiceController@destroy');
	Route::post('delete-selected-services', 'ServiceController@deleteSelectedClients')->name('admin.delete-selected-services');
});

