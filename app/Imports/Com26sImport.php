<?php

namespace App\Imports;

use App\Models\Com26;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class Com26sImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $datos = [
            'cprom'     => $row["cprom"],
            'tprom'     => $row["tprom"],
            'clin'      => $row["clin"],
            'qprecio'   => $row["qprecio"],
            'qpordes'   => $row["qpordes"],
            'finipro'   => $row["finipro"],
            'ffinpro'   => $row["ffinpro"],
            'ctipneg'   => $row["ctipneg"],
            'ctipro'    => $row["ctipro"],
            'ccodart1'  => $row["ccodart1"],
            'qprod1'    => $row["qprod1"],
            'cescom'    => $row["cescom"],
            'ccodart2'  => $row["ccodart2"],
            'qprod2'    => $row["qprod2"],
            'cuser'     => $row["cuser"],
            'cidpr'     => $row["cidpr"],
            'fupgr'     => $row["fupgr"] ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr'     => $row["tupgr"],
        ];

        return new Com26($datos);
    }

    public function batchSize(): int
    {
        return 400;
    }

    public function uniqueBy()
    {
        return ['cequiv'];
    }

    public function chunkSize(): int
    {
        return 400;
    }
}
