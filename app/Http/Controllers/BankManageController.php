<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Permission;
use App\Role;
use App\BankInfo;
class BankManageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function bank_info_manage(Request $request){
        //echo 1;
        $bankinfo= new BankInfo;
        $res=$bankinfo::where('bank_name','like','%'.$request['search'].'%')->paginate(3);
        return view('bank/bank_info_manage')->with('title','银行信息管理')->with('banks',$res)->with('search',$request['search']);


    }

    // 银行添加页面
    public function add_bank(){
    	return view('/bank/add_bank');
    }

    // 银行添加功能
    public function add_bank_func(Request $request){
        $bankinfo= new BankInfo;
        $bankinfo->bank_name=$request->bank_name;
        $bankinfo->bank_type=$request->bank_type;
        $bankinfo->bank_level=$request->bank_level;
        $bankinfo->bank_addr1=$request->bank_addr1;
        $bankinfo->bank_addr2=$request->bank_addr2;
        $bankinfo->contacts=$request->contacts;
        $bankinfo->contact_phone=$request->contact_phone;
        $bankinfo->parent_bank_id=$request->parent_bank_id;
        $res_count=$bankinfo->where('bank_name',$request->bank_name)->get()->count();
        if($res_count>0){
            $res['insert_res']=false;
            $res['message']="请勿插入重复数据";
        }else{
            $tempres=$bankinfo->save();
            if($tempres){
                $res['insert_res']=true;
                $res['message']="插入成功";
            }else{
                $res['insert_res']=false;
                $res['message']="插入失败";
            }
            
        }
        return json_encode($res);
    }

    //图片上传测试
    public function add_bank_logo(Request $request){
        $file = $request->Filedata; // 不同环境可能获取方式有点不同，可以下打印观察一下 dd(Input());
        if($file->isValid())
        {
            // 上传目录。 public目录下 uploads/thumb 文件夹
            $dir = 'uploads/thumb/';
            // 文件名。格式：时间戳 + 6位随机数 + 后缀名
            $filename = time() . mt_rand(100000, 999999) . '.' . $file ->getClientOriginalExtension();
            $file->move($dir, $filename);
            $path = $dir . $filename;
            return $path;
        }
    }



}
