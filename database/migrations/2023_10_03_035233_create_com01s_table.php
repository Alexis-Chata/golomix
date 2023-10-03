<?php

use App\Models\TipoProducto;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('com01s', function (Blueprint $table) {
            $table->id();
            $table->string("cclaart")->nullable()->default("-");
            $table->string("csubcla")->nullable()->default("-");
            $table->string("ncorart")->nullable()->default("-");
            $table->string("cequiv")->nullable()->default("-");
            $table->string("tcor")->nullable()->default("-");
            $table->string("tabr")->nullable()->default("-");
            $table->string("cuni")->nullable()->default("-");
            $table->string("cpreuni")->nullable()->default("-");
            $table->string("qfaccon")->nullable()->default("-");
            $table->string("qfaccon1")->nullable()->default("-");
            $table->string("flagcre")->nullable()->default("-");
            $table->string("fcre")->nullable()->default("-");
            $table->date("fanu")->nullable();
            $table->date("frec")->nullable();
            $table->string("qprecio")->nullable()->default("-");
            $table->string("qpresie")->nullable()->default("-");
            $table->string("qsaldis")->nullable()->default("-");
            $table->string("qsalcom")->nullable()->default("-");
            $table->string("flagenv")->nullable()->default("-");
            $table->string("qbot")->nullable()->default("-");
            $table->string("qbot1")->nullable()->default("-");
            $table->string("ccodenv")->nullable()->default("-");
            $table->string("preliq")->nullable()->default("-");
            $table->string("npeso")->nullable()->default("-");
            $table->string("cequire")->nullable()->default("-");
            $table->string("qpuntos")->nullable()->default("-");
            $table->string("ctiblje")->nullable()->default("-");
            $table->string("ccblje")->nullable()->default("-");
            $table->string("cescom")->nullable()->default("-");
            $table->string("cc01")->nullable()->default("-");
            $table->string("cc02")->nullable()->default("-");
            $table->string("cc03")->nullable()->default("-");
            $table->string("cc04")->nullable()->default("-");
            $table->string("cc05")->nullable()->default("-");
            $table->string("qpisc")->nullable()->default("-");
            $table->string("qcapac")->nullable()->default("-");
            $table->string("qunafe")->nullable()->default("-");
            $table->string("qimpcap")->nullable()->default("-");
            $table->string("qpreref")->nullable()->default("-");
            $table->string("crubcj")->nullable()->default("-");
            $table->string("qfaccon2")->nullable()->default("-");
            $table->string("qbot2")->nullable()->default("-");
            $table->string("cum1")->nullable()->default("-");
            $table->string("cum2")->nullable()->default("-");
            $table->string("cgprnk")->nullable()->default("-");
            $table->string("qprecos")->nullable()->default("-");
            $table->string("ccodud1")->nullable()->default("-");
            $table->string("ccodud2")->nullable()->default("-");
            $table->string("flagcom")->nullable()->default("-");
            $table->string("flagcop")->nullable()->default("-");
            $table->string("qprecio2")->nullable()->default("-");
            $table->string("qprecio3")->nullable()->default("-");
            $table->string("qprecio4")->nullable()->default("-");
            $table->string("qprecio5")->nullable()->default("-");
            $table->string("qprecio6")->nullable()->default("-");
            $table->string("qprecio7")->nullable()->default("-");
            $table->string("cuser")->nullable()->default("-");
            $table->string("cidpr")->nullable()->default("-");
            $table->date("fupgr")->nullable();
            $table->string("tupgr")->nullable()->default("-");
            $table->foreignIdFor(TipoProducto::class)->default(1)->constrained();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->unique('cequiv');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('com01s');
    }
};
