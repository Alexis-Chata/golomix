<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Com01Controller;
use App\Http\Controllers\Com36Controller;
use App\Http\Controllers\Com37Controller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Ugr01Controller;
use Illuminate\Http\Request;

class SubirCsvController extends Controller
{
    public function subircsv(Request $request)
    {
        $mensaje = match ($request->tipo) {
            "com36" => $this->subirCom36($request),
            "com37" => $this->subirCom37($request),
            "ugr01" => $this->subirUgr01($request),
            "com01" => $this->subirCom01($request),
            default => 'Especificar tipo de archivo o tipo no encontrado',
        };
        return response()->json(['mensaje' => $mensaje], 200);
    }

    private function subirCom36(Request $request){
        $objetCom36= new Com36Controller();
        $mensaje = $objetCom36->procesando($request);
        return $mensaje;
    }

    private function subirCom37(Request $request){
        $objetCom37= new Com37Controller();
        $mensaje = $objetCom37->procesando($request);
        return $mensaje;
    }

    private function subirUgr01(Request $request){
        $objetUgr01= new Ugr01Controller();
        $mensaje = $objetUgr01->procesando($request);
        return $mensaje;
    }

    private function subirCom01(Request $request){
        $objetCom01= new Com01Controller();
        $mensaje = $objetCom01->procesando($request);
        return $mensaje;
    }
}
