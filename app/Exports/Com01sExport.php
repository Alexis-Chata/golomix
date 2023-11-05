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
        $this->cabecera = ($listaPrecio == '001') ? ['Codigo Producto', 'Producto Bodega', 'Precio Cj', 'Codigo Marca', 'Cant Cj', 'Precio Unid', 'Marca',] : ['Codigo Producto', 'Producto Mayorista', 'Precio Cj', 'Codigo Marca', 'Cant Cj', 'Precio Unid', 'Marca',];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        // Lista Sin Productos Discontinuados
        $com01s = Com01::whereNotIn('flagcre', ['1'])->get('id');
        $com01s = $com01s->concat(Com01::where('flagcre', '1')->whereNotIn('tipo_producto_id', ['5'])->where('fanu', '>', now()->subMonth(5))->whereNotIn('qprecio', ['0.01'])->get('id'));
        $com01s = Com01::whereIn('id', $com01s->pluck('id'))->orderBy('cc04')->orderBy('tcor')->orderBy('qprecio')->orderBy('cequiv');

        if ($this->listaPrecio == '001') {
            $com01s = $com01s->get(['cequiv', 'tcor', 'qprecio', 'cc04', 'qfaccon'])->append('precio001xunidad')->append('marcaproducto');
        } else {
            $com01s = $com01s->get(['cequiv', 'tcor', 'qprecio2', 'cc04', 'qfaccon'])->append('precio002xunidad')->append('marcaproducto');
        }
        //dd($com01s->first()->toArray());
        return $com01s;
    }

    public function headings(): array
    {
        return $this->cabecera;
    }
}
