<?php

namespace App\Http\Controllers;

use App\Imports\Ugr01sImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Ugr01Controller extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $archivo = $request->file('arch_ugr01');
        Excel::import(new Ugr01sImport, $archivo);
        return redirect()->route('dashboard')->banner($archivo->getClientOriginalName().' Archivo... Se Subio Correctamente!!');
    }
}
