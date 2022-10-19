<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCom30sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com30s', function (Blueprint $table) {
            $table->id();
            $table->string("crut")->nullable()->default("-");
            $table->string("clin")->nullable()->default("-");
            $table->string("cter")->nullable()->default("-");
            $table->string("creg")->nullable()->default("-");
            $table->string("ccendis")->nullable()->default("-");
            $table->string("ccono")->nullable()->default("-");
            $table->string("care")->nullable()->default("-");
            $table->string("czon")->nullable()->default("-");
            $table->string("npdv")->nullable()->default("-");
            $table->string("crutdis")->nullable()->default("-");
            $table->string("tdes")->nullable()->default("-");
            $table->string("csisven")->nullable()->default("-");
            $table->string("ncompvt")->nullable()->default("-");
            $table->string("ctipmod")->nullable()->default("-");
            $table->string("cdis")->nullable()->default("-");
            $table->string("cuser")->nullable()->default("-");
            $table->string("cidpr")->nullable()->default("-");
            $table->string("fupgr")->nullable()->default("-");
            $table->date("tupgr")->nullable();
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
        Schema::dropIfExists('com30s');
    }
}
