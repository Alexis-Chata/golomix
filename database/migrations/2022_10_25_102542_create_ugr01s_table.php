<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUgr01sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ugr01s', function (Blueprint $table) {
            $table->id();
            $table->string("cind")->nullable()->default("-");
            $table->string("ccod")->nullable()->default("-");
            $table->string("tdes")->nullable()->default("-");
            $table->string("cfac")->nullable()->default("-");
            $table->string("cuser")->nullable()->default("-");
            $table->string("cidpr")->nullable()->default("-");
            $table->date("fupgr")->nullable();
            $table->string("tupgr")->nullable()->default("-");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->unique(['cind', 'ccod']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ugr01s');
    }
}
