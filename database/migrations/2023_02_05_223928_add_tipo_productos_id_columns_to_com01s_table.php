<?php

use App\Models\TipoProducto;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoProductosIdColumnsToCom01sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('com01s', function (Blueprint $table) {
            $table->foreignIdFor(TipoProducto::class)->default(1)->after('tupgr')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('com01s', function (Blueprint $table) {
            $table->dropForeign('com01s_tipo_producto_id_foreign');
            $table->dropColumn(['tipo_producto_id']);
        });
    }
}
