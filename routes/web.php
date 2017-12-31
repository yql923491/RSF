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
// Route::get('/admin/add_permission',function(){
// 	return view('/admin/AddPermission');
// });

Route::get('/admin/add_permission','AdminController@add_permission');
Route::get('/admin/add_role','AdminController@add_role');

Route::get('/admin/add_permission_fun','AdminController@AddPermissionFun');
Route::get('/admin/add_role_func',"AdminController@addRoleFunc");
Route::get('/admin/delete_role',"AdminController@delete_role");
Route::get('/admin/enable_role',"AdminController@enable_role");
Route::get('/admin/search_role',"AdminController@search_role");

// 删除权限路由，这里应该用 ResF 风格API？？？
Route::get('/admin/delete_permission',"AdminController@delete_permission");
Route::get('/admin/enable_permission',"AdminController@enable_permission");
Route::get('/bank/bank_info_manage',"BankManageController@bank_info_manage");
Route::get('/bank/add_bank',"BankManageController@add_bank");