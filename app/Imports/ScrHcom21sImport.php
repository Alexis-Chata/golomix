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

            'cletd' =>  $row['cletd']??"NP",

            'femi'  =>  isset($row["fmov"]) ? Carbon::createFromFormat('d/m/Y', $row["fmov"]) : null,
            'fven'  =>  isset($row["fven"]) ? Carbon::createFromFormat('d/m/Y', $row["fven"]) : null,
            'fliq'  =>  isset($row["fliq"]) ? Carbon::createFromFormat('d/m/Y', $row["fliq"]) : null,
            'fupgr'  =>  isset($row["fupgr"]) ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr' =>  $row['tupgr'],
            ];
            return new ScrHcom21($datos);
        }

        public function batchSize(): int
        {
            return 250;
        }

        public function uniqueBy()
        {
            return ['cletd', 'nfac'];
        }

        public function chunkSize(): int
        {
            return 250;
        }
    }
