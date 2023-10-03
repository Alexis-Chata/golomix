<?php

namespace App\Http\Controllers;

use App\Imports\Com36sImport;
use App\Models\Com36;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class Com36Controller extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //elimina pedidos anulados (borrados)
        $f = fopen($request->file('arch_com36'), 'r');
        $npeds = array();
        while (($data = fgetcsv($f)) !== false) {

            if (!isset($indiceNped)) {
                $fila = $data;
            }

            foreach ($fila as $key => $value) {

                if ($value == 'NPED') {
                    $indiceNped = $key;
                }
                if ($value == 'FUPGR') {
                    $indiceFupgr = $key;
                }
            }

            if (isset($indiceNped) && $data[$indiceNped] != 'NPED') {
                $npeds[] = $data[$indiceNped];
                $fupgr = Carbon::createFromFormat('d/m/Y', $data[$indiceFupgr]);
            }
        }
        Com36::whereNotIn('nped', $npeds)->where('fupgr', $fupgr->format('Y/m/d'))->delete();
        //dd($request->arch_com36);
        $archivo = $request->file('arch_com36');
        Excel::import(new Com36sImport, $archivo);
        //$archivo = $this->import($archivo);
        return redirect()->route('dashboard');
    }
}
