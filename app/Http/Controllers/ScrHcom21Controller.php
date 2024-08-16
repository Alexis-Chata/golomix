<?php

namespace App\Http\Controllers;

use App\Imports\ScrHcom21sImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ScrHcom21Controller extends Controller
{
    public function store(Request $request)
    {
        $mensaje = $this->procesando($request);
        return redirect()->route('dashboard')->banner($mensaje);
    }

    public function procesando(Request $request){
        $archivo = $request->file('arch_scr_hcom21');
        Excel::import(new ScrHcom21sImport, $archivo);
        return $archivo->getClientOriginalName().' Archivo... Se Subio Correctamente!!';
    }
}
