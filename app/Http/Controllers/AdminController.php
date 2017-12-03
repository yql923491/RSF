<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Flight;
use App\User;
use App\Permission;
use App\Role;
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

    public function permission_index(Request $request)   #权限
    {
        $permission=new permission;
        $res=$permission::where('permission_name','like','%'.$request['search'].'%')->paginate(3);
        return view('admin/permission_index')->with('permissions',$res)->with('search',$request['search']);
    }

    public function role_index(Request $request){      #角
        // $tmprole=new role;
        // $tempres=$tmprole::find(1)->permissions()->get();
        // dd($tempres);
        $role=new role;
        $res=$role::where('role_name','like','%'.$request['search'].'%')->paginate(3);
        return view('admin/role_index')->with('roles',$res)->with('search',$request['search']);
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
    public function addRoleFunc(Request $request){
        $role=new role;
        $role->role_name=$request['role_name'];
        $role->role_describe=$request['role_describe'];
        $role->role_type=$request['role_type']=='operation'?'operation':'menu';
        $role->role_status=$request['role_status']==1?1:0;
        $res=$role->save();
        
    }

}
