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
    return view('frontend.home');
});
Route::get('/services', function () {
    return view('frontend.services');
});
Route::get('/aboutus', function () {
    return view('frontend.aboutus');
});
Route::get('/contactus', function () {
    return view('frontend.contactus');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::redirect('/home', 'admin/dashboard', 301);

Route::get('admin/dashboard',function(){
    if(Auth::check())
    return view('dashboard');
    else
    return redirect()->route('login');
});


// Ajax Routes
Route::post('admin/ajax','AjaxController@root');
// Ajax Routes

Route::resource('admin/users', 'UsersController');

/* Developer Routers
here are the routes Developer can access
*/
Route::resource('admin/roles', 'RolesController');
Route::resource('admin/permissions', 'PermissionsController');
Route::resource('developer/modules', 'ModulesController');
Route::resource('developer/appfiles', 'AppfilesController');
Route::resource('developer/appcommands', 'AppcommandsController');
Route::post('developer/appfiles/savefile', 'AppfilesController@savefile');
Route::get('developer/modules/{id}/createcontroller','ModulesController@createcontroller');
Route::get('developer/modules/{id}/editcontroller','ModulesController@editcontroller');
Route::get('developer/modules/{id}/editmodel','ModulesController@editmodel');
Route::get('developer/modules/{id}/createmodel','ModulesController@createmodel');
Route::post('developer/modules/createmodel','ModulesController@postcreatemodel');
Route::get('developer/modules/{id}/createmigration','ModulesController@createmigration');
Route::get('developer/modules/{id}/editmigration','ModulesController@editmigration');
Route::post('developer/modules/createmigration','ModulesController@postcreatemigration');
Route::post('developer/modules/deletemodule','ModulesController@deletemoduledata');
Route::post('developer/modules/createcontroller','ModulesController@postcreatecontroller');
Route::post('developer/modules/savefile','ModulesController@savefile');

// End Developer Routes


/*
Application Tested Dynamic Routes
*/




/*
    Application Routes Defined Below
*/
Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::resource('settings', 'SettingsController');
    Route::resource('menus', 'MenusController');
    Route::resource('works', 'WorksController');
    Route::resource('ledgers', 'LedgersController');
    Route::resource('configs', 'ConfigsController');
    Route::resource('franchises', 'FranchisesController');
    Route::resource('distributors', 'DistributorsController');
    Route::resource('expenses', 'ExpensesController');
    Route::resource('requestworks', 'RequestworksController');
    Route::resource('orders', 'OrdersController');
    Route::get('changepw','UsersController@changepass');
    Route::post('changepw','UsersController@postchangepass');
    Route::get('ses/fiscal/{fis}',function($fis){
        session(['fiscal'=>$fis]);
        session(['fiscal_id'=>\App\Config::where('name',session('fiscal'))->first()->id]);
        return redirect()->back();
    });
    Route::get('ses/franchise/{frn}',function($frn){
        session(['franchise_id'=>$frn]);
        session(['franchise'=>\App\Franchise::find($frn)->name]);
        return redirect()->back();
    });
    Route::resource('sales', 'SalesController');
    Route::resource('tickets', 'TicketsController');
    Route::resource('recharges', 'RechargesController');
    Route::post('receipt/sales', 'SalesController@postreceipt');
    Route::post('status/sales', 'SalesController@poststatus');
    Route::get('wallet','OrdersController@wallet');

    Route::get('latest-updates',function(){
        return view('latest-updates');
    });

    Route::get('order/export','OrdersController@export');

    Route::get('order/status','OrdersController@orderStatus')->name('order-status');

    Route::get('online-recharge','RechargesController@showQRCode')->name('online-recharge');

});

