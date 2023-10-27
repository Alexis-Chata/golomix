<?php

namespace Database\Seeders;

use App\Models\CodVendedorAsignado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodVendedorAsignadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $codVendedorAsignado = new CodVendedorAsignado();
        $codVendedorAsignado->user_id = 1;
        $codVendedorAsignado->cven = "163";
        $codVendedorAsignado->tipo = 'main';
        $codVendedorAsignado->save();

        $codVendedorAsignado = new CodVendedorAsignado();
        $codVendedorAsignado->user_id = 2;
        $codVendedorAsignado->cven = "001";
        $codVendedorAsignado->tipo = 'main';
        $codVendedorAsignado->save();
    }
}
