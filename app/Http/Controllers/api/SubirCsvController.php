<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Com01Controller;
use App\Http\Controllers\Com05Controller;
use App\Http\Controllers\Com10Controller;
use App\Http\Controllers\Com30Controller;
use App\Http\Controllers\Com31Controller;
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
            "com30" => $this->subirCom30($request),
            "com10" => $this->subirCom10($request),
            "com05" => $this->subirCom05($request),
            "com07" => $this->subirCom07($request),
            "com31" => $this->subirCom31($request),
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

    private function subirCom30(Request $request){
        $objetCom01= new Com30Controller();
        $mensaje = $objetCom01->procesando($request);
        return $mensaje;
    }

    private function subirCom10(Request $request){
        $objetCom36= new Com10Controller();
        $mensaje = $objetCom36->procesando($request);
        return $mensaje;
    }

    private function subirCom05(Request $request){
        $objetCom37= new Com05Controller();
        $mensaje = $objetCom37->procesando($request);
        return $mensaje;
    }

    private function subirCom07(Request $request){
        $objetCom37= new Com05Controller();
        $mensaje = $objetCom37->procesando($request);
        return $mensaje;
    }

    private function subirCom31(Request $request){
        $objetUgr01= new Com31Controller();
        $mensaje = $objetUgr01->procesando($request);
        return $mensaje;
    }
}
