<?php

namespace App\Exports;

use App\Models\Com01;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Com01sExport implements FromCollection, WithHeadings
{
    public function __construct($listaPrecio = '001')
    {
        $this->listaPrecio = $listaPrecio;
        $this->cabecera = ($listaPrecio=='001') ? ['Codigo Producto', 'Producto Bodega', 'Precio Cj', 'Codigo Marca', 'Cant Cj', 'Precio Unid', 'Marca',] : ['Codigo Producto', 'Producto Mayorista', 'Precio Cj', 'Codigo Marca', 'Cant Cj', 'Precio Unid', 'Marca',];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $com01s = Com01::all('cequiv', 'tcor', 'qprecio', 'cc04', 'qfaccon')->append('precio001xunidad')->append('marcaproducto');
        if ($this->listaPrecio == '002') {
            $com01s = Com01::all('cequiv', 'tcor', 'qprecio2', 'cc04', 'qfaccon')->append('precio002xunidad')->append('marcaproducto');
        }
        //dd($com01s->first()->toArray());
        return $com01s;
    }

    public function headings(): array
    {
        return $this->cabecera;
    }
}
