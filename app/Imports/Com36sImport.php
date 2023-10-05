<?php

namespace App\Imports;

use App\Models\Com36;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class Com36sImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $datosPedido = [
            'czon'      => $row["czon"],
            'crut'      => $row["crut"],
            'cletd'     => $row["cletd"],
            'ctip'      => $row["ctip"],
            'nfac'      => $row["nfac"],
            'cven'      => $row["cven"],
            'ccon'      => $row["ccon"],
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
            'cmod'      => $row["cmod"],
            'clistpr'   => $row["clistpr"],
            'cuser'     => $row["cuser"],
            'fupgr'     => $row["fupgr"] ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr'     => $row["tupgr"],
            'nped'      => $row["nped"]
        ];

        //$pedido = Com36::updateOrCreate($numeroPedido, $datosPedido);

        return new Com36($datosPedido);
    }

    public function batchSize(): int
    {
        return 150;
    }

    public function uniqueBy()
    {
        return 'nped';
    }

    public function chunkSize(): int
    {
        return 150;
    }
}
