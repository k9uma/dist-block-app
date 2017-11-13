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


});
