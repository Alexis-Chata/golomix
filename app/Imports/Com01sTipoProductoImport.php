<?php

namespace App\Imports;

use App\Models\Com01;
use Maatwebsite\Excel\Concerns\ToModel;

class Com01sTipoProductoImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $datos = [
            'cequiv'       => $row["cequiv"],
            'tipo_producto_id'      => $row["tipo_producto_id"]
        ];

        return new Com01($datos);
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
