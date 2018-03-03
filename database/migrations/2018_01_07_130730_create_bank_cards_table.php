<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cardName');
            $table->string('cardType');
            $table->string('cardBank');//卡所属银行
            $table->string('cardInfo');//卡信息简介
            $table->string('cardImgUrl')->nullable();//卡图片保存路径
            $table->string('cardImgName')->nullable();//卡图片保存文件名
            $table->string('cardImgInfo')->nullable();//卡图片详细信息            
            $table->string('bankInfo_id')->nullable();//对应银行的外键
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_cards');
    }
}
