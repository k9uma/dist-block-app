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
    Route::get('dp/application/index',['as'=>'dp.application.index','uses'=>'ApplicationDpController@index']);
    Route::get('dp/application/create',['as'=>'dp.application.create','uses'=>'ApplicationDpController@create']);
    Route::post('dp/application/create',['as'=>'dp.application.store','uses'=>'ApplicationDpController@store']);
    Route::get('dp/application/{id}',['as'=>'dp.application.show','uses'=>'ApplicationDpController@show']);
    Route::post('dp/application/assign_dp/{id}',['as'=>'dp.application.edit','uses'=>'ApplicationDpController@edit']);
    Route::post('dp/application/{id}',['as'=>'dp.application.update','uses'=>'ApplicationDpController@update']);
    Route::delete('dp/application/{id}',['as'=>'dp.application.destroy','uses'=>'ApplicationDpController@destroy']);
    /**
    End Application Module Routing
     **/

    /**
    Begin Application Tickets Module Routing
     **/
    Route::get('my-tickets',['as'=>'tickets.index','uses'=>'TicketsController@index']);
    Route::get('tickets',['as'=>'tickets.admin.index','uses'=>'TicketsController@admin']);
    Route::get('tickets/show/{id}',['as'=>'tickets.show','uses'=>'TicketsController@show']);
    Route::post('tickets/assign/{id}',['as'=>'tickets.admin.update','uses'=>'TicketsController@assign']);
    /**
    End Application Tickets Module Routing
     **/

    /**
    Begin Fault Application Module Routing
     **/
    Route::get('fault/application',['as'=>'fault.application','uses'=>'FaultController@index']);
    Route::get('fault/application/index',['as'=>'fault.application.index','uses'=>'FaultController@admin']);
    Route::get('fault/application/create',['as'=>'fault.application.create','uses'=>'FaultController@create']);
    Route::post('fault/application/create',['as'=>'fault.application.store','uses'=>'FaultController@store']);
    Route::get('fault/application/{id}',['as'=>'fault.application.show','uses'=>'FaultController@show']);
    Route::get('fault/application/{id}/edit',['as'=>'fault.application.edit','uses'=>'FaultController@edit']);
    Route::patch('fault/application/{id}',['as'=>'fault.application.update','uses'=>'FaultController@update']);
    Route::delete('fault/application/{id}',['as'=>'fault.application.destroy','uses'=>'FaultController@destroy']);

    //Tickets
    Route::get('fault/tickets',['as'=>'faults.tickets','uses'=>'FaultController@ticket_index']);
    Route::get('fault/application/assign/tickets',['as'=>'faults.tickets.admin.index','uses'=>'FaultController@ticket_admin']);
    Route::get('fault/application/assign/tickets/show/{id}',['as'=>'tickets.show','uses'=>'FaultController@ticket_show']);
    Route::post('fault/application/assign/tickets/assign/{id}',['as'=>'faults.tickets.admin.update','uses'=>'FaultController@ticket_assign']);
    Route::post('fault/application/update/{id}',['as'=>'fault.application.resolution.update','uses'=>'FaultController@resolutionUpdate']);
    /**
    End Fault Application Module Routing
     **/

    Route::get('reports',['as'=>'reports.index','uses'=>'ReportController@index']);

});
