<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCom05sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com05s', function (Blueprint $table) {
            $table->id();
            $table->string("ccon")->nullable()->default("-");
            $table->string("tnom")->nullable()->default("-");
            $table->string("tdir")->nullable()->default("-");
            $table->string("nfon")->nullable()->default("-");
            $table->string("nlibele")->nullable()->default("-");
            $table->string("nlibmil")->nullable()->default("-");
            $table->string("nbre")->nullable()->default("-");
            $table->date("fcto")->nullable();
            $table->string("cveh")->nullable()->default("-");
            $table->string("flatit")->nullable()->default("-");
            $table->string("flatra")->nullable()->default("-");
            $table->string("qcons")->nullable()->default("-");
            $table->string("nruc")->nullable()->default("-");
            $table->date("fces")->nullable();
            $table->string("clin")->nullable()->default("-");
            $table->string("csisven")->nullable()->default("-");
            $table->string("ngui")->nullable()->default("-");
            $table->string("flctrcie")->nullable()->default("-");
            $table->string("qcaj")->nullable();
            $table->string("qnmped")->nullable()->default("-");
            $table->string("fmlpgc")->nullable()->default("-");
            $table->string("ctrans")->nullable()->default("-");
            $table->string("cuser")->nullable()->default("-");
            $table->string("cidpr")->nullable()->default("-");
            $table->date("fupgr")->nullable();
            $table->string("tupgr")->nullable()->default("-");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();

            $table->unique(['ccon']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('com05s');
    }
}
