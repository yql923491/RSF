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

Route::get('/','AdminController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test',function(){
return "看什么看？没看过人家创业么？！这是测试内容！！";
});


Route::get('/testview',function(){
	return view('testview');
});


Route::get('/admin/index','AdminController@index');
Route::get('/admin/permission','AdminController@permission_index')->name('permission_indexss');
Route::get('/admin/role','AdminController@role_index')->name('role_indexss');
Route::get('/admin/add_permission',function(){
	return view('/admin/AddPermission');
});
Route::get('/admin/add_role',function(){
	return view("/admin/addRole");
});

Route::get('/admin/add_permission_fun','AdminController@AddPermissionFun');
Route::get('/admin/add_role_func',"AdminController@addRoleFunc");
Route::get('/admin/delete_role',"AdminController@delete_role");