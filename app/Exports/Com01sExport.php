<?php

namespace App\Exports;

use App\Models\Com01;
use Maatwebsite\Excel\Concerns\FromCollection;

class Com01sExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Com01::all();
    }
}
