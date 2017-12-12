<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Permission;
use App\Role;
class BankManageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function bank_info_manage(){
    	return view('/bank/bank_info_manage')->with('title','银行信息管理');
    	
    }
}
