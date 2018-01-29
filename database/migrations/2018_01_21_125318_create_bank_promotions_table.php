<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('promName');//活动名
            $table->string('promBank');//活动银行
            $table->string('promStartTime');//活动开始时间
            $table->string('promEndTime');//活动结束时间
            $table->string('promInfo');//活动详细信息
            $table->string('promUrl');//活动链接
            $table->string('promImgUrl');//活动图片保存路径
            $table->string('promImgName');//活动图片保存名
            $table->string('promImgInfo');//活动图片信息
            $table->string('bankInfo_id');//对应银行的外键
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
        Schema::dropIfExists('bank_promotions');
    }
}
