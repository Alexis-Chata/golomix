<?php

namespace App\Http\Controllers;

use App\Imports\Com07sImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Com07Controller extends Controller
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
        $archivo = $request->file('arch_com07');
        Excel::import(new Com07sImport, $archivo);
        return $archivo->getClientOriginalName().' Archivo... Se Subio Correctamente!!';
    }
}
