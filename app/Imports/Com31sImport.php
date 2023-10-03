<?php

namespace App\Imports;

use App\Models\Com31;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class Com31sImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = [
            'crut'          => $row["crut"],
            'nsecprev'      => $row["nsecprev"],
            'ccli'          => $row["ccli"],
            'ctipmod'       => $row["ctipmod"],
            'cmod'          => $row["cmod"],
            'nsecmod'       => $row["nsecmod"],
            'ctipfv'        => $row["ctipfv"],
            'cuser'         => $row["cuser"],
            'cidpr'         => $row["cidpr"],
            'fupgr'         => $row["fupgr"] ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr'         => $row["tupgr"],
        ];
        return new Com31($data);
    }

    public function batchSize(): int
    {
        return 300;
    }

    public function uniqueBy()
    {
        return ['ccli', 'crut'];
    }

    public function chunkSize(): int
    {
        return 300;
    }
}
