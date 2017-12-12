<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrativeAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrative_area', function (Blueprint $table) {
            $table->increments('id');
            $table->string('province_name');
            $table->string('city_name');
            $table->string('area_nmae');
            $table->string('province_code');
            $table->string('city_code');
            $table->string('reference_code');
            $table->string('alias');
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
        Schema::dropIfExists('administrative_area');
    }
}
