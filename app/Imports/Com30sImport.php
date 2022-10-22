<?php

namespace App\Imports;

use App\Models\Com30;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Com30sImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $numeroRuta = ['crut'      => $row["crut"] ];
        $datosRuta = [
            'clin'     => $row["clin"],
            'cter'     => $row["cter"],
            'creg'     => $row["creg"],
            'ccendis'  => $row["ccendis"],
            'ccono'    => $row["ccono"],
            'care'     => $row["care"],
            'czon'     => $row["czon"],
            'npdv'     => $row["npdv"],
            'crutdis'  => $row["crutdis"],
            'tdes'     => $row["tdes"],
            'csisven'  => $row["csisven"],
            'ncompvt'  => $row["ncompvt"],
            'ctipmod'  => $row["ctipmod"],
            'cdis'     => $row["cdis"],
            'cuser'    => $row["cuser"],
            'cidpr'    => $row["cidpr"],
            'fupgr'    => $row["fupgr"] ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr'    => $row["tupgr"],
            'crut'      => $row["crut"]
        ];

        //$ruta = Com30::updateOrCreate($numeroRuta, $datosRuta);

        return new Com30($datosRuta);
    }

    public function batchSize(): int
    {
        return 200;
    }

    public function uniqueBy()
    {
        return ['crut'];
    }

    public function chunkSize(): int
    {
        return 200;
    }
}
