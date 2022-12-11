<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCom10sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com10s', function (Blueprint $table) {
            $table->id();
            $table->string("cven")->nullable()->default("-");
            $table->string("tven")->nullable()->default("-");
            $table->string("clin")->nullable()->default("-");
            $table->string("tdir")->nullable()->default("-");
            $table->string("nfon")->nullable()->default("-");
            $table->string("nlibele")->nullable()->default("-");
            $table->string("nlibmil")->nullable()->default("-");
            $table->string("qfacom")->nullable()->default("-");
            $table->string("ccargo")->nullable()->default("-");
            $table->string("csup")->nullable();
            $table->string("csisven")->nullable()->default("-");
            $table->string("r1")->nullable()->default("-");
            $table->string("r2")->nullable()->default("-");
            $table->string("r3")->nullable()->default("-");
            $table->string("r4")->nullable()->default("-");
            $table->string("r5")->nullable()->default("-");
            $table->string("r6")->nullable()->default("-");
            $table->string("r7")->nullable()->default("-");
            $table->string("czon")->nullable()->default("-");
            $table->string("cind")->nullable()->default("-");
            $table->string("ctipmod")->nullable();
            $table->string("cjefv")->nullable()->default("-");
            $table->string("cadm")->nullable()->default("-");
            $table->string("codpla")->nullable()->default("-");
            $table->string("ccanal")->nullable()->default("-");
            $table->string("cuser")->nullable()->default("-");
            $table->string("cidpr")->nullable()->default("-");
            $table->date("fupgr")->nullable();
            $table->string("tupgr")->nullable()->default("-");
            $table->timestamps();

            $table->unique(['cven']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('com10s');
    }
}
