<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index');

    Route::resource('users','UserController');

    /**
    Begin Roles Module Routing
     **/
    Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
    Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);
    /**
    End Roles Module Routing
     **/

    /**
    Begin Distribution Point Module Routing
     **/
    Route::get('dp',['as'=>'dp.index','uses'=>'DistributionPointController@index','middleware' => ['permission:dp-list']]);
    Route::get('dp/create',['as'=>'dp.create','uses'=>'DistributionPointController@create','middleware' => ['permission:dp-create']]);
    Route::post('dp/create',['as'=>'dp.store','uses'=>'DistributionPointController@store','middleware' => ['permission:dp-create']]);
    Route::get('dp/{id}',['as'=>'dp.show','uses'=>'DistributionPointController@show']);
    Route::get('dp/{id}/edit',['as'=>'dp.edit','uses'=>'DistributionPointController@edit','middleware' => ['permission:dp-edit']]);
    Route::patch('dp/{id}',['as'=>'dp.update','uses'=>'DistributionPointController@update','middleware' => ['permission:dp-edit']]);
    Route::delete('dp/{id}',['as'=>'dp.destroy','uses'=>'DistributionPointController@destroy','middleware' => ['permission:dp-delete']]);
    /**
    End Roles Module Routing
     **/

    /**
    Begin Application Module Routing
     **/
    Route::get('dp/application/index',['as'=>'dp.application.index','uses'=>'ApplicationDpController@index','middleware' => ['permission:dp-list']]);
    Route::get('dp/application/create',['as'=>'dp.application.create','uses'=>'ApplicationDpController@create','middleware' => ['permission:dp-create']]);
    Route::post('dp/application/create',['as'=>'dp.application.store','uses'=>'ApplicationDpController@store','middleware' => ['permission:dp-create']]);
    Route::get('dp/application/{id}',['as'=>'dp.application.show','uses'=>'ApplicationDpController@show']);
    Route::get('dp/application/{id}/edit',['as'=>'dp.application.edit','uses'=>'ApplicationDpController@edit','middleware' => ['permission:dp-edit']]);
    Route::patch('dp/application/{id}',['as'=>'dp.application.update','uses'=>'ApplicationDpController@update','middleware' => ['permission:dp-edit']]);
    Route::delete('dp/application/{id}',['as'=>'dp.application.destroy','uses'=>'ApplicationDpController@destroy','middleware' => ['permission:dp-delete']]);
    /**
    End Application Module Routing
     **/

    /**
    Begin Application Tickets Module Routing
     **/
    Route::get('my-tickets',['as'=>'tickets.index','uses'=>'TicketsController@index','middleware' => ['permission:dp-list']]);
    Route::get('tickets',['as'=>'tickets.admin.index','uses'=>'TicketsController@admin','middleware' => ['permission:dp-create']]);
    Route::get('tickets/show/{id}',['as'=>'tickets.show','uses'=>'TicketsController@show']);
    Route::post('tickets/assign/{id}',['as'=>'tickets.admin.update','uses'=>'TicketsController@assign','middleware' => ['permission:dp-edit']]);
    /**
    End Application Tickets Module Routing
     **/

    /**
    Begin Application Module Routing
     **/
    Route::get('fault/application',['as'=>'fault.application','uses'=>'FaultController@index','middleware' => ['permission:dp-list']]);
    Route::get('fault/application/index',['as'=>'fault.application.index','uses'=>'FaultController@admin','middleware' => ['permission:dp-list']]);
    Route::get('fault/application/create',['as'=>'fault.application.create','uses'=>'FaultController@create','middleware' => ['permission:dp-create']]);
    Route::post('fault/application/create',['as'=>'fault.application.store','uses'=>'FaultController@store','middleware' => ['permission:dp-create']]);
    Route::get('fault/application/{id}',['as'=>'fault.application.show','uses'=>'FaultController@show']);
    Route::get('fault/application/{id}/edit',['as'=>'fault.application.edit','uses'=>'FaultController@edit','middleware' => ['permission:dp-edit']]);
    Route::patch('fault/application/{id}',['as'=>'fault.application.update','uses'=>'FaultController@update','middleware' => ['permission:dp-edit']]);
    Route::delete('fault/application/{id}',['as'=>'fault.application.destroy','uses'=>'FaultController@destroy','middleware' => ['permission:dp-delete']]);

    //Tickets
    Route::get('fault/application/tickets',['as'=>'faults.tickets','uses'=>'FaultController@ticket_index','middleware' => ['permission:dp-list']]);
    Route::get('fault/application/assign/tickets',['as'=>'faults.tickets.admin.index','uses'=>'FaultController@ticket_admin','middleware' => ['permission:dp-create']]);
    Route::get('fault/application/assign/tickets/show/{id}',['as'=>'tickets.show','uses'=>'FaultController@ticket_show']);
    Route::post('fault/application/assign/tickets/assign/{id}',['as'=>'tickets.admin.update','uses'=>'FaultController@ticket_assign','middleware' => ['permission:dp-edit']]);
    /**
    End Application Module Routing
     **/


});
