<?php

namespace App\Imports;

use App\Models\Com01;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class Com01sImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $numeroPedido = ['cequiv'      => $row["cequiv"] ];
        $datosPedido = [
            'cclaart'      => $row["cclaart"],
            'csubcla'      => $row["csubcla"],
            'ncorart'      => $row["ncorart"],
            'tcor'         => $row["tcor"],
            'tabr'         => $row["tabr"],
            'cuni'         => $row["cuni"],
            'cpreuni'      => $row["cpreuni"],
            'qfaccon'      => $row["qfaccon"],
            'qfaccon1'     => $row["qfaccon1"],
            'flagcre'      => $row["flagcre"] ? $row["flagcre"] : '-',
            'fcre'         => $row["fcre"],
            'fanu'         => $row["fanu"] ? Carbon::createFromFormat('d/m/Y', $row["fanu"]) : null,
            'frec'         => $row["frec"] ? Carbon::createFromFormat('d/m/Y', $row["frec"]) : null,
            'qprecio'      => $row["qprecio"],
            'qpresie'      => $row["qpresie"],
            'qsaldis'      => $row["qsaldis"],
            'qsalcom'      => $row["qsalcom"],
            'flagenv'      => $row["flagenv"],
            'qbot'         => $row["qbot"],
            'qbot1'        => $row["qbot1"],
            'ccodenv'      => $row["ccodenv"],
            'preliq'       => $row["preliq"],
            'npeso'        => $row["npeso"],
            'cequire'      => $row["cequire"],
            'qpuntos'      => $row["qpuntos"],
            'ctiblje'      => $row["ctiblje"],
            'ccblje'       => $row["ccblje"],
            'cescom'       => $row["cescom"],
            'cc01'         => $row["cc01"],
            'cc02'         => $row["cc02"],
            'cc03'         => $row["cc03"],
            'cc04'         => $row["cc04"],
            'cc05'         => $row["cc05"],
            'qpisc'        => $row["qpisc"],
            'qcapac'       => $row["qcapac"],
            'qunafe'       => $row["qunafe"],
            'qimpcap'      => $row["qimpcap"],
            'qpreref'      => $row["qpreref"],
            'crubcj'       => $row["crubcj"],
            'qfaccon2'     => $row["qfaccon2"],
            'qbot2'        => $row["qbot2"],
            'cum1'         => $row["cum1"],
            'cum2'         => $row["cum2"],
            'cgprnk'       => $row["cgprnk"],
            'qprecos'      => $row["qprecos"],
            'ccodud1'      => $row["ccodud1"],
            'ccodud2'      => $row["ccodud2"],
            'flagcom'      => $row["flagcom"],
            'flagcop'      => $row["flagcop"],
            'qprecio2'     => $row["qprecio2"],
            'qprecio3'     => $row["qprecio3"],
            'qprecio4'     => $row["qprecio4"],
            'qprecio5'     => $row["qprecio5"],
            'qprecio6'     => $row["qprecio6"],
            'qprecio7'     => $row["qprecio7"],
            'cuser'        => $row["cuser"],
            'cidpr'        => $row["cidpr"],
            'fupgr'        => $row["fupgr"] ? Carbon::createFromFormat('d/m/Y', $row["fupgr"]) : null,
            'tupgr'        => $row["tupgr"],
            'cequiv'       => $row["cequiv"],
            'tipo_producto_id'=> isset($row["tipo_producto_id"]) ? $row["tipo_producto_id"] : 1
        ];

        //$pedido = Com01::updateOrCreate($numeroPedido, $datosPedido);

        return new Com01($datosPedido);
    }

    public function batchSize(): int
    {
        return 600;
    }

    public function uniqueBy()
    {
        return ['cequiv'];
    }

    public function chunkSize(): int
    {
        return 600;
    }
}
