<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
        $input=$request;
        $users = DB::select('select * from users', [1]);
        return response()->json($users);
    }

}
