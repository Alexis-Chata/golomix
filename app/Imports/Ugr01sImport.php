<?php

namespace App\Imports;

use App\Models\Ugr01;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class Ugr01sImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = [
            'cind'      => $row["cind"],
            'ccod'      => $row["ccod"],
            'tdes'      => $row["tdes"],
            'cfac'      => $row["cfac"],
            'cuser'     => $row["cuser"],
            'cidpr'     => $row["cidpr"],
            'fupgr'     => $row["fupgr"] ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr'     => $row["tupgr"],
        ];
        return new Ugr01($data);
    }

    public function batchSize(): int
    {
        return 600;
    }

    public function uniqueBy()
    {
        return ['cind', 'ccod'];
    }

    public function chunkSize(): int
    {
        return 600;
    }
}
