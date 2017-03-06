<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_setting',function (Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->integer('slidercount')->default(10);
            $table->integer('localcount')->default(10);
            $table->integer('categorycount')->default(10);
            $table->integer('highlighted_product_count')->default(10);
            $table->integer('product_photo_count')->default(10);
            $table->boolean('active')->default(false);
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_setting');
    }
}
