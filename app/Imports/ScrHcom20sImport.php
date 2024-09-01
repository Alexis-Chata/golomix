<?php

namespace App\Imports;

use App\Models\ScrHcom20;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ScrHcom20sImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $datos = [
            'cter'      =>  $row['cter'],
            'creg'      =>  $row['creg'],
            'ccendis'   =>  $row['ccendis'],
            'cdis'      =>  $row['cdis'],
            'care'      =>  $row['care'],
            'czon'      =>  $row['czon'],
            'crut'      =>  $row['crut'],
            'csisven'   =>  $row['csisven'],
            'clin'      =>  $row['clin'],
            'cletd'     =>  $row['cletd']??"NP",
            'ccia'      =>  $row['ccia'],
            'ctip'      =>  $row['ctip'],
            'nfac'      =>  $row['nfac'],
            'nfacfull'  => ($row['cletd'] ?? "NP").$row['nfac'],
            'cven'      =>  $row['cven'],
            'csup'      =>  $row['csup'],
            'cjefv'     =>  $row['cjefv'],
            'cadm'      =>  $row['cadm'],
            'ccon'      =>  $row['ccon'],
            'ccli'      =>  $row['ccli'],
            'fmov'      =>  isset($row["fmov"]) ? Carbon::createFromFormat('d/m/Y', $row["fmov"]) : null,
            'femi'      =>  isset($row["femi"]) ? Carbon::createFromFormat('d/m/Y', $row["femi"]) : null,
            'ord'       =>  $row['ord'],
            'tnomrep'   =>  $row['tnomrep'],
            'cruccli'   =>  $row['cruccli'],
            'tdir'      =>  $row['tdir'],
            'qdesofe'   =>  $row['qdesofe'],
            'qdesobs'   =>  $row['qdesobs'],
            'qdescom'   =>  $row['qdescom'],
            'qdesigv'   =>  $row['qdesigv'],
            'qdesipm'   =>  $row['qdesipm'],
            'qdesisc'   =>  $row['qdesisc'],
            'qimptot'   =>  $row['qimptot'],
            'qimpvta'   =>  $row['qimpvta'],
            'qimpcom'   =>  $row['qimpcom'],
            'cesdoc'    =>  $row['cesdoc'],
            'cconpag'   =>  $row['cconpag'],
            'plazo'     =>  $row['plazo'],
            'fven'      =>  isset($row["fven"]) ? Carbon::createFromFormat('d/m/Y', $row["fven"]) : null,
            'qmaxche'   =>  $row['qmaxche'],
            'ndoc'      =>  $row['ndoc'],
            'ngui'      =>  $row['ngui'],
            'cmrp'      =>  $row['cmrp'],
            'qcaj24'    =>  $row['qcaj24'],
            'qcaj12'    =>  $row['qcaj12'],
            'qcaj06'    =>  $row['qcaj06'],
            'tven'      =>  $row['tven'],
            'cruccia'   =>  $row['cruccia'],
            'fliq'      =>  isset($row["fliq"]) ? Carbon::createFromFormat('d/m/Y', $row["fliq"]) : null,
            'cconaux'   =>  $row['cconaux'],
            'ctipliq'   =>  $row['ctipliq'],
            'flagenv'   =>  $row['flagenv'],
            'flagdeg'   =>  $row['flagdeg'],
            'cmod'      =>  $row['cmod'],
            'flagvcd'   =>  $row['flagvcd'],
            'ndcto'     =>  $row['ndcto'],
            'flagnv'    =>  $row['flagnv'],
            'cletori'   =>  $row['cletori'],
            'ctipori'   =>  $row['ctipori'],
            'nfacori'   =>  $row['nfacori'],
            'ctipnc'    =>  $row['ctipnc'],
            'nliq'      =>  $row['nliq'],
            'nguia'     =>  $row['nguia'],
            'nped'      =>  $row['nped'],
            'flggen'    =>  $row['flggen'],
            'flgenv'    =>  $row['flgenv'],
            'flgrec'    =>  $row['flgrec'],
            'codhash'   =>  $row['codhash'],
            'codcdr'    =>  $row['codcdr'],
            'clistpr'   =>  $row['clistpr'],
            'cuser'     =>  $row['cuser'],
            'cidpr'     =>  $row['cidpr'],
            'fupgr'     =>  isset($row["fupgr"]) ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr'     =>  $row['tupgr'],
            ];
            return new ScrHcom20($datos);
        }

        public function batchSize(): int
        {
            return 300;
        }

        public function uniqueBy()
        {
            return ['cletd', 'nfac'];
        }

        public function chunkSize(): int
        {
            return 300;
        }
    }
