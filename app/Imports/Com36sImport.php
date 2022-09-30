<?php

namespace App\Imports;

use App\Models\Com36;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Com36sImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $nuevoRegistro = [
            'czon'      => $row["czon"],
            'crut'      => $row["crut"],
            'cletd'     => $row["cletd"],
            'ctip'      => $row["ctip"],
            'nfac'      => $row["nfac"],
            'cven'      => $row["cven"],
            'ccli'      => $row["ccli"],
            'fmov'      => $row["fmov"] ? Carbon::createFromFormat('d/m/Y', $row["fmov"]) : null,
            'femi'      => $row["femi"] ? Carbon::createFromFormat('d/m/Y', $row["femi"]) : null,
            'tnomrep'   => $row["tnomrep"],
            'cruccli'   => $row["cruccli"],
            'tdir'      => $row["tdir"],
            'qdesigv'   => $row["qdesigv"],
            'qimptot'   => $row["qimptot"],
            'qimpvta'   => $row["qimpvta"],
            'qimpcom'   => $row["qimpcom"],
            'fven'      => $row["fven"] ? Carbon::createFromFormat('d/m/Y', $row["fven"]) : null,
            'tven'      => $row["tven"],
            'cruccia'   => $row["cruccia"],
            'fliq'      => $row["fliq"] ? Carbon::createFromFormat('d/m/Y', $row["fliq"]) : null,
            'ctipliq'   => $row["ctipliq"],
            'nped'      => $row["nped"],
            'cmod'      => $row["cmod"],
            'clistpr'   => $row["clistpr"],
            'cuser'     => $row["cuser"],
            'fupgr'     => $row["fupgr"] ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr'     => $row["tupgr"],
        ];

        return new Com36($nuevoRegistro);
    }
}
