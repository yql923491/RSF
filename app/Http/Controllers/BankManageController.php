<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\BankCard;
use App\BankPromotion;
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
    public function add_bank(Request $request){
        if($request->bank_id != null){
            $res=BankInfo::find($request['bank_id']);
            return view('/bank/add_bank')->with('bank',$res);
        }else{
            return view('/bank/add_bank');
        }
    	



    }
    public function addBankCardPage(Request $request){//跳转到银行卡添加或编辑界面
        $bankCardId=$request['bankCardId'];
        if ($bankCardId!=null) {//根据是否传入卡id动态回显
            $bankCard=BankCard::find($bankCardId);
        }else{
            $bankCard=new bankCard;
        }
        return view('/bank/addOrEditBankCardPage')->with('bankCard',$bankCard);
    }
    public function bank_cards_manage(Request $request){//银行卡管理界面入口
        $type=$request['cardType'];
        $search=$request['search'];
        $res=BankCard::where('cardName','like','%'.$search.'%')->where('cardType','like','%'.$type.'%')->paginate(3);
        return view('/bank/bank_cards_manage')->with('bankCards',$res)->with('search',$search)->with('title','银行卡信息管理')->with('cardType',$type);
    }
    public function addOrEditBankCard(Request $request){
        $bankCard=new bankCard;
        $bankCardId=$request['bankCardId'];
        if (!empty($bankCardId)) {//id存在，则编辑
            $existBankCard=BankCard::find($bankCardId);
            $existBankCard->cardName=$request['cardName'];
            $existBankCard->cardType=$request['cardType'];
            $existBankCard->cardInfo=$request['cardInfo'];
            $existBankCard->cardBank=$request['cardBank'];
            $bankCard->cardImgUrl="";
            $bankCard->cardImgName="";
            $bankCard->cardImgInfo="";
            $bankCard->cardImgUrl="";
            $bankCard->bankInfo_id="";
            $ex=$existBankCard->save();
        }else{//id不存在，则添加
            $bankCard=new bankCard;
            $bankCard->cardName=$request['cardName'];
            $bankCard->cardType=$request['cardType'];
            $bankCard->cardInfo=$request['cardInfo'];
            $bankCard->cardBank=$request['cardBank'];
            $bankCard->cardImgUrl="";
            $bankCard->cardImgName="";
            $bankCard->cardImgInfo="";
            $bankCard->cardImgUrl="";
            $bankCard->bankInfo_id="";
            $ex=$bankCard->save();
        }
    }

    // 银行添加功能
    public function add_bank_func(Request $request){
        $bankinfo= new BankInfo;
        $bankinfo->bank_name=$request->bank_name;
        $bankinfo->bank_type=$request->bank_type;
        $bankinfo->bank_level=$request->bank_level;
        $bankinfo->bank_addr1=$request->bank_addr1;
        $bankinfo->bank_addr2=$request->bank_addr2;
        $bankinfo->bank_logo=$request->bank_logo;
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


    public function delete_bank_info(Request $request){
        $res=BankInfo::destroy($request['bank_id']); //返回删除的条数
        return $res;
    }


}
