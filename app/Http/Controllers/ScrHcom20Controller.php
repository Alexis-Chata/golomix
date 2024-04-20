<?php

namespace App\Http\Controllers;

use App\Imports\ScrHcom20sImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ScrHcom20Controller extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $archivo = $request->file('arch_scr_hcom20');
        Excel::import(new ScrHcom20sImport, $archivo);
        return redirect()->route('dashboard')->banner($archivo->getClientOriginalName().' Archivo... Se Subio Correctamente!!');
    }
}
