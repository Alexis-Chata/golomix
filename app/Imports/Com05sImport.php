<?php

namespace App\Imports;

use App\Models\Com05;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class Com05sImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $com10s = [
            'ccon'         => $row["ccon"],
            'tnom'         => $row["tnom"],
            'tdir'         => $row["tdir"],
            'nfon'         => $row["nfon"],
            'nlibele'      => $row["nlibele"],
            'nlibmil'      => $row["nlibmil"],
            'nbre'         => $row["nbre"],
            'fcto'         => $row["fcto"] ? Carbon::createFromFormat('d/m/Y', $row["fcto"]) : null,
            'cveh'         => $row["cveh"],
            'flatit'       => $row["flatit"],
            'flatra'       => $row["flatra"],
            'qcons'        => $row["qcons"],
            'nruc'         => $row["nruc"],
            'fces'         => $row["fces"] ? Carbon::createFromFormat('d/m/Y', $row["fces"]) : null,
            'clin'         => $row["clin"],
            'csisven'      => $row["csisven"],
            'ngui'         => $row["ngui"],
            'flctrcie'     => $row["flctrcie"],
            'qcaj'         => $row["qcaj"],
            'qnmped'       => $row["qnmped"],
            'fmlpgc'       => $row["fmlpgc"],
            'ctrans'       => $row["ctrans"],
            'cuser'        => $row["cuser"],
            'cidpr'        => $row["cidpr"],
            'fupgr'        => $row["fupgr"] ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr'        => $row["tupgr"],
        ];
        return new Com05($com10s);
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function uniqueBy()
    {
        return ['cequiv'];
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
