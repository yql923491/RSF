<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\BankCard;
use App\BankPromotion;
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

    public function add_bank(){
    	return view('/bank/add_bank');
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

}
