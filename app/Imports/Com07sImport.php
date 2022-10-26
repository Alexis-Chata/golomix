<?php

namespace App\Imports;

use App\Models\Com07;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class Com07sImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $clientes = [
            'ccli'          => $row["ccli"],
            'ccia'          => $row["ccia"],
            'cter'          => $row["cter"],
            'creg'          => $row["creg"],
            'ccendis'       => $row["ccendis"],
            'tnomrep'       => $row["tnomrep"],
            'tdir'          => $row["tdir"],
            'tcli'          => $row["tcli"],
            'ntel'          => $row["ntel"],
            'nfax'          => $row["nfax"],
            'le'            => $row["le"],
            'cdis'          => $row["cdis"],
            'ctipneg'       => $row["ctipneg"],
            'ctipcli'       => $row["ctipcli"],
            'ctipseg'       => $row["ctipseg"],
            'flagche'       => $row["flagche"],
            'cpop'          => $row["cpop"],
            'flagact'       => $row["flagact"],
            'fcre'          => $row["fcre"] ? Carbon::createFromFormat('d/m/Y', $row["fcre"]) : null,
            'cruc'          => $row["cruc"],
            'cban'          => $row["cban"],
            'ncta'          => $row["ncta"],
            'cfac'          => $row["cfac"],
            'fnac'          => $row["fnac"],
            'crub'          => $row["crub"],
            'flcre'         => $row["flcre"],
            'qmincaj'       => $row["qmincaj"],
            'qmincred'      => $row["qmincred"],
            'fven'          => $row["fven"] ? Carbon::createFromFormat('d/m/Y', $row["fven"]) : null,
            'flven'         => $row["flven"],
            'ncarcob'       => $row["ncarcob"],
            'qporcom'       => $row["qporcom"],
            'fultcom'       => $row["fultcom"] ? Carbon::createFromFormat('d/m/Y', $row["fultcom"]) : null,
            'ncjscom'       => $row["ncjscom"],
            'crutd'         => $row["crutd"],
            'qporconc'      => $row["qporconc"],
            'qmaxche'       => $row["qmaxche"],
            'flcen'         => $row["flcen"],
            'qcjobjp'       => $row["qcjobjp"],
            'cobjp'         => $row["cobjp"],
            'flenc'         => $row["flenc"],
            'ctipco'        => $row["ctipco"],
            'ccade'         => $row["ccade"],
            'fligv'         => $row["fligv"],
            'cserie'        => $row["cserie"],
            'tdocid'        => $row["tdocid"],
            'otrdoc'        => $row["otrdoc"],
            'ccate1'        => $row["ccate1"],
            'ccate2'        => $row["ccate2"],
            'csidoc'        => $row["csidoc"],
            'ctipfv'        => $row["ctipfv"],
            'ncordx'        => $row["ncordx"],
            'ncordy'        => $row["ncordy"],
            'ccli1'         => $row["ccli1"],
            'codcbc'        => $row["codcbc"],
            'clistpr'       => $row["clistpr"],
            'cuser'         => $row["cuser"],
            'cidpr'         => $row["cidpr"],
            'fupgr'         => $row["fupgr"] ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr'         => $row["tupgr"]
        ];
        return new Com07($clientes);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function uniqueBy()
    {
        return ['ccli'];
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
