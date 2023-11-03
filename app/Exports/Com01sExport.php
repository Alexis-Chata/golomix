<?php

namespace App\Exports;

use App\Models\Com01;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Com01sExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Com01::all();
    }

    public function headings(): array
    {
        return [
            'Codigo Cliente',
            'Ruta',
            'Secuencia',
            'Modulo',
            'Nombre Ruta',
            'Zona',
            'Nombre Cliente',
            'Direccion',
            'Ruc',
            'Dni',
            'Lista',
            'Codigo Vendedor',
            'Vendedor',
            'Ultima Compra',
        ];
    }
}
