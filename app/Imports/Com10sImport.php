<?php

namespace App\Imports;

use App\Models\Com10;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class Com10sImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $com10s = [
            'tven'         => $row["tven"],
            'clin'         => $row["clin"],
            'tdir'         => $row["tdir"],
            'nfon'         => $row["nfon"],
            'cven'         => $row["cven"],
            'nlibele'      => $row["nlibele"],
            'nlibmil'      => $row["nlibmil"],
            'qfacom'       => $row["qfacom"],
            'ccargo'       => $row["ccargo"],
            'csup'         => $row["csup"],
            'csisven'      => $row["csisven"],
            'r1'           => $row["r1"],
            'r2'           => $row["r2"],
            'r3'           => $row["r3"],
            'r4'           => $row["r4"],
            'r5'           => $row["r5"],
            'r6'           => $row["r6"],
            'r7'           => $row["r7"],
            'czon'         => $row["czon"],
            'cind'         => $row["cind"],
            'ctipmod'      => $row["ctipmod"],
            'cjefv'        => $row["cjefv"],
            'cadm'         => $row["cadm"],
            'codpla'       => $row["codpla"],
            'ccanal'       => $row["ccanal"],
            'cuser'        => $row["cuser"],
            'cidpr'        => $row["cidpr"],
            'fupgr'        => $row["fupgr"] ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr'        => $row["tupgr"],
        ];
        return new Com10($com10s);
    }

    public function batchSize(): int
    {
        return 300;
    }

    public function uniqueBy()
    {
        return ['cequiv'];
    }

    public function chunkSize(): int
    {
        return 300;
    }
}
