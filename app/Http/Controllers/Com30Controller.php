<?php

namespace App\Http\Controllers;

use App\Imports\Com30sImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Com30Controller extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensaje = $this->procesando($request);
        return redirect()->route('dashboard')->banner($mensaje);
    }

    public function procesando(Request $request){
        $archivo = $request->file('arch_com30');
        Excel::import(new Com30sImport, $archivo);
        return $archivo->getClientOriginalName().' Archivo... Se Subio Correctamente!!';
    }
}
