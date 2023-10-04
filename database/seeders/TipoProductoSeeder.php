<?php

namespace Database\Seeders;

use App\Models\TipoProducto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipo_producto = new TipoProducto();
        $tipo_producto->name = 'Venta Normal';
        $tipo_producto->save();

        $tipo_producto = new TipoProducto();
        $tipo_producto->name = 'Bonificaciones';
        $tipo_producto->save();

        $tipo_producto = new TipoProducto();
        $tipo_producto->name = 'Combos Winter';
        $tipo_producto->save();

        $tipo_producto = new TipoProducto();
        $tipo_producto->name = 'Producto discontinuado';
        $tipo_producto->save();

        $tipo_producto = new TipoProducto();
        $tipo_producto->name = 'Combos Winter Vencidos';
        $tipo_producto->save();
    }
}
