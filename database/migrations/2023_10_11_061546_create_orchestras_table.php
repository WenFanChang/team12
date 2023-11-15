<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrchestrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orchestras', function (Blueprint $table) {
            $table->id()->comment('編號');
            $table->string('name')->comment('團體名稱');
            $table->string('company')->comment('公司名稱');
            $table->string('city')->comment('公司位置');
            $table->string('style')->comment('曲風類別');
            $table->timestamps();
            //$table->string("test");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orchestras');
    }
};
