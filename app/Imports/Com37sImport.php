<?php

namespace App\Imports;

use App\Models\Com37;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class Com37sImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $datosDetallePedido = [

            'fmov'      => isset($row["fmov"]) ? Carbon::createFromFormat('d/m/Y', $row["fmov"]) : null,
            'ccli'      => $row["ccli"],
            'qpreuni'   => $row["qpreuni"],
            'cletd'     => $row["cletd"] ?? "NP",
            'ctip'      => $row["ctip"],
            'nfac'      => $row["nfac"],
            'clistpr'   => $row["clistpr"],
            'cuser'     => $row["cuser"],
            'fupgr'     => $row["fupgr"] ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr'     => $row["tupgr"],
            'qimp'      => $row["qimp"] ? $row["qimp"] : 0,
            'qcanped'   => number_format($row["qcanped"], 2),
            'tdes'      => $row["tdes"],
            'citem'     => $row["citem"],
            'cprom'     => $row["cprom"],
            'nped'      => $row["nped"],
            'ccodart'   => $row["ccodart"]
        ];

        //$detallePedido = Com37::updateOrCreate($numeroDetallePedido, $datosDetallePedido);

        return new Com37($datosDetallePedido);
    }

    public function batchSize(): int
    {
        return 300;
    }

    public function uniqueBy()
    {
        return ['nped', 'ccodart'];
    }

    public function chunkSize(): int
    {
        return 300;
    }
}
