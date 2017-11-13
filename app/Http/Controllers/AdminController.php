<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Flight;
use App\User;
use App\Permission;
class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/home');
    }

    public function permission_index()
    {
        return view('admin/permission_index');
    }

    public function AddPermissionFun(Request $request){
        
        
        $permission= new permission;
        $permission->permission_name=$request['permission_name'];
        $permission->permission_describe=$request['permission_describe'];
        $permission->permission_type=$request['permission_type']=='operation'?'operation':'meun';
        $permission->permission_status=$request['permission_status']==1?1:0;
        $res=$permission->save();
        dd($res);

        // $users = DB::select('select * from users where status = ?', [1]);
        // DB::insert('insert into users (name,email,password,status,created_at,updated_at) values (?,?,?,?)', ['wjwczyb','wjwczyb@163.com',md5('wjw2324884'),1]);
        // $affected = DB::update('update users set status = 1 where name = ?', ['wjwczyb']);
        // DB::statement('drop table users');


        // $flights = Flight::all();
        // $users = User::all();

        // return response()->json($users);
    }

}
