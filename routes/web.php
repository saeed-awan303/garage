<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/login', function () {
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
// Frontend routes
Route::get('/', 'frontend\Homecontroller@index')->name('fronthome');
Route::get('/old','frontend\Homecontrollerold@index')->name('fronthomeold');
Route::get('/how-it-works', 'frontend\Homecontroller@howItWork')->name('howitworks');
Route::get('/about', 'frontend\Homecontroller@about')->name('aboutus');
Route::get('/bookingcar', 'frontend\Homecontroller@bookingCar')->name('bookingcar');
Route::post('/bookingcar','frontend\Homecontroller@postBookingCar')->name('bookingcar');
Route::get('/work-details', 'frontend\Homecontroller@workDetails')->name('workdetails');
Route::post('/work-details', 'frontend\Homecontroller@postworkDetails')->name('workdetails');
Route::get('/booking-details', 'frontend\Homecontroller@bookingDetails')->name('bookingdetails');
Route::post('/booking-details', 'frontend\Homecontroller@postBookingDetails')->name('bookingdetails');
Route::get('/payment-details', 'frontend\Homecontroller@paymentDetails')->name('paymentdetails');
Route::post('/payment-details', 'frontend\Homecontroller@postPaymentDetails')->name('paymentdetails');
Route::post('/form/next-2', 'frontend\Homecontrollerold@create_next2')->name('form.next2');
Route::post('old/api/fetch-models', 'frontend\Homecontrollerold@fetchModel');
Route::post('old/api/fetch-fuel', 'frontend\Homecontrollerold@fetchFuel');
Route::post('old/api/fetch-profile', 'frontend\Homecontrollerold@fetchProfile');
Route::post('old/api/fetch-rim', 'frontend\Homecontrollerold@fetchRim');
Route::post('old/api/fetch-speed', 'frontend\Homecontrollerold@fetchSpeed');

Route::get('/addmechanic', 'frontend\Homecontrollerold@addmechanic')->name('addmechanic');
Route::post('store-mechanic', 'frontend\Homecontrollerold@storeMechanic')->name('store.mechanic');
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

	//MEchanic Routes
	Route::resource('mechanics','MechanicController');
	Route::post('get-mechanics', 'MechanicController@getMechanics')->name('admin.getmechanics');
	Route::post('get-mechanic', 'MechanicController@mechanicDetail')->name('admin.getmechanic');
	Route::get('mechanic/delete/{id}', 'MechanicController@destroy');
	Route::post('delete-selected-mechanics', 'MechanicController@deleteSelectedClients')->name('admin.delete-selected-mechanics');

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

	//Tyre Routes
	Route::resource('tyres','TyreController');
	Route::post('get-tyres', 'TyreController@gettyres')->name('admin.gettyres');
	Route::post('get-tyre', 'TyreController@tyreDetail')->name('admin.gettyre');
	Route::get('tyre/delete/{id}', 'TyreController@destroy');
	Route::post('delete-selected-tyres', 'TyreController@deleteSelectedClients')->name('admin.delete-selected-tyres');

	//Tyre Width Routes
	Route::resource('tyre_widths','TyreWidthController');
	Route::post('get-tyres-widths', 'TyreWidthController@gettyres_widths')->name('admin.gettyres_widths');
	Route::post('get-tyre-width', 'TyreWidthController@tyreDetail')->name('admin.gettyre_width');
	Route::get('tyre-widths/delete/{id}', 'TyreWidthController@destroy');
	Route::post('delete-selected-tyres-widths', 'TyreWidthController@deleteSelectedClients')->name('admin.delete-selected-tyres-widths');

	//Tyre Profile Routes
	Route::resource('tyre_profiles','TyreProfileController');
	Route::post('get-tyres-profiles', 'TyreProfileController@gettyres_profiles')->name('admin.gettyres_profiles');
	Route::post('get-tyre-profile', 'TyreProfileController@tyreprofilesDetail')->name('admin.gettyre_profile');
	Route::get('tyre-profiles/delete/{id}', 'TyreProfileController@destroy');
	Route::post('delete-selected-tyres-profiles', 'TyreProfileController@deleteSelectedClients')->name('admin.delete-selected-tyres-profiles');

	//Tyre Rims Routes
	Route::resource('rims','TyreRimController');
	Route::post('get-rims', 'TyreRimController@getRims')->name('admin.getrims');
	Route::post('get-rim', 'TyreRimController@rimDetail')->name('admin.getrim');
	Route::get('rim/delete/{id}', 'TyreRimController@destroy');
	Route::post('delete-selected-rims', 'TyreRimController@deleteSelectedClients')->name('admin.delete-selected-rims');

	//Tyre Speed Routes
	Route::resource('tyre_speeds','TyreSpeedController');
	Route::post('get-tyres-speeds', 'TyreSpeedController@gettyres_speed')->name('admin.gettyres_speed');
	Route::post('get-tyre-speed', 'TyreSpeedController@tyrespeedDetail')->name('admin.gettyre_speed');
	Route::get('tyre-speed/delete/{id}', 'TyreSpeedController@destroy');
	Route::post('delete-selected-tyres-speed', 'TyreSpeedController@deleteSelectedClients')->name('admin.delete-selected-tyres-speed');

});

