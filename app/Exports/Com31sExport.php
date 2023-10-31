<?php

namespace App\Exports;

use App\Models\Com31;
use App\Traits\QueryTrait;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Com31sExport implements FromCollection, WithHeadings
{
    use QueryTrait;

    public function __construct($cven, $crut)
    {
        $this->cven = $cven;
        $this->crut = $crut;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect($this->querylistaclientes($this->cven, $this->crut));
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
