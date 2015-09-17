<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::any('/',['as'=>'root','uses'=>'EmployeesController@index']);
/*Route::get('/', function()
{
	return View::make('hello');
});*/
Route::any('hello',function()
{
	return View::make('test.index');
});

//route for login
Route::any('login',['as'=>'employees.login','uses'=>'LoginController@index']);

//route for student controller
Route::any('student/create',['as'=>'student.create','uses'=>'StudentController@create']);
Route::any('student/store',['as'=>'student.store','uses'=>'StudentController@store']);



//route for employee
Route::any('employees/index',['as'=>'employees.index','uses'=>'EmployeesController@index']);
Route::any('employees/create',['as'=>'employees.create','uses'=>'EmployeesController@create']);
Route::any('employees/store',['as'=>'employees.store','uses'=>'EmployeesController@store']);
Route::any('employees/edit/{id}',['as'=>'employees.edit','uses'=>'EmployeesController@edit']);
Route::any('employees/update/{id}',['as'=>'employees.update','uses'=>'EmployeesController@update']);
Route::any('employees/destroy/{id}',['as'=>'employees.destroy','uses'=>'EmployeesController@destroy']);