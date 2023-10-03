<?php

namespace App\Imports;

use App\Models\ugr01;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class Ugr01sImport implements ToModel
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
        return new ugr01($data);
    }

    public function batchSize(): int
    {
        return 200;
    }

    public function uniqueBy()
    {
        return ['cind', 'ccod'];
    }

    public function chunkSize(): int
    {
        return 200;
    }
}
