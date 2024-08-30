<?php

namespace App\Imports;

use App\Models\ScrHcom21;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ScrHcom21sImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $datos = [
            'ord' => $row['ord'],
            'ccodart' => $row['ccodart'],
            'qcanped' => $row['qcanped'],
            'qcanofe' => $row['qcanofe'],
            'qcanobs' => $row['qcanobs'],
            'qcanenv' => $row['qcanenv'],
            'qcanprom' => $row['qcanprom'],
            'qpreuni' => $row['qpreuni'],
            'qimp' => $row['qimp'],
            'tdes' => $row['tdes'],
            'cps' => $row['cps'] ?? '',
            'prom' => $row['prom'] ?? '',
            'qdesc' => $row['qdesc'],
            'qpordes' => $row['qpordes'],
            'qdesisc' => $row['qdesisc'],
            'cpolcre' => $row['cpolcre'] ?? '',
            'cletd' =>  $row['cletd'] ?? "NP",
            'ccia' => $row['ccia'],
            'ctip' => $row['ctip'],
            'nfac' => $row['nfac'],
            'citem' => $row['citem'],
            'qcanotr' => $row['qcanotr'],
            'ctipart' => $row['ctipart'],
            'ndcto' => $row['ndcto'] ?? '',
            'cprom' => $row['cprom'] ?? '',
            'qdesofe' => $row['qdesofe'],
            'qprecos' => $row['qprecos'],
            'nped' => $row['nped'] ?? '-',
            'clistpr' => $row['clistpr'],
            'cuser' => $row['cuser'],
            'cidpr' => $row['cidpr'],
            'fupgr'  =>  isset($row["fupgr"]) ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr' => $row['tupgr'],
        ];
        return new ScrHcom21($datos);
    }

    public function batchSize(): int
    {
        return 250;
    }

    public function uniqueBy()
    {
        return ['ccodart', 'cletd', 'nfac'];
    }

    public function chunkSize(): int
    {
        return 250;
    }
}
