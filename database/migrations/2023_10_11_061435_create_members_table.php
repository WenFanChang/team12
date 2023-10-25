<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id()->comment('編號');
            $table->string("name")->comment('人員名稱');
            $table->foreignId("oid")->comment('團體(外部建)');
            $table->foreign('oid')->references('id')->on('orchestra')->onDelete('cascade');
            $table->string("position")->comment('位置');
            $table->double("height")->unsigned()->nullable()->comment('身高');
            $table->double("weight")->unsigned()->nullable()->comment('體重');
            $table->integer("year")->unsigned()->nullable()->comment('年資');
            $table->integer("age")->unsigned()->default(16)->comment('年齡');
            $table->string("nationality")->default('韓國')->comment('國籍');
            //$table->string("test");

            $table->timestamps();
        });
    }
    /*test */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
