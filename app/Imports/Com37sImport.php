<?php

namespace App\Imports;

use App\Models\Com37;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class Com37sImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $numeroPedido = ['nped'      => $row["nped"] ];
        $datosPedido = [

            'fmov'      => $row["fmov"] ? Carbon::createFromFormat('d/m/Y', $row["fmov"]) : null,
            'ccli'      => $row["ccli"],
            'qpreuni'   => $row["qpreuni"],
            'cletd'     => $row["cletd"],
            'ctip'      => $row["ctip"],
            'nfac'      => $row["nfac"],
            'clistpr'   => $row["clistpr"],
            'cuser'     => $row["cuser"],
            'fupgr'     => $row["fupgr"] ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr'     => $row["tupgr"],
            'qimp'      => $row["qimp"],
            'ccodart'   => $row["ccodart"],
            'qcanped'   => $row["qcanped"],
            'tdes'      => $row["tdes"],
            'citem'     => $row["citem"],
            'cprom'     => $row["cprom"],
        ];

        $pedido = Com37::updateOrCreate($numeroPedido, $datosPedido);

        return $pedido;
    }
}
