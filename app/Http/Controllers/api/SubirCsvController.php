<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Com01Controller;
use App\Http\Controllers\Com05Controller;
use App\Http\Controllers\Com07Controller;
use App\Http\Controllers\Com10Controller;
use App\Http\Controllers\Com30Controller;
use App\Http\Controllers\Com31Controller;
use App\Http\Controllers\Com36Controller;
use App\Http\Controllers\Com37Controller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ScrHcom20Controller;
use App\Http\Controllers\ScrHcom21Controller;
use App\Http\Controllers\Ugr01Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubirCsvController extends Controller
{
    public function avancedata(Request $request)
    {
        $datafull = DB::table('scr_hcom21s')
            ->select(
                'view_ugr01s_045.ccodmarca',
                'view_ugr01s_045.tdes as tdesmarca',
                'com10s.cven',
                'com10s.tven',
                'scr_hcom21s.*',
                'scr_hcom20s.*'
            )
            ->join('scr_hcom20s', 'scr_hcom21s.nfacfull', '=', 'scr_hcom20s.nfacfull')
            ->join('com10s', 'scr_hcom20s.cven', '=', 'com10s.cven')
            ->join('com01s', 'scr_hcom21s.ccodart', '=', 'com01s.ccodud1')
            ->join('view_ugr01s_045', 'com01s.cc04', '=', 'view_ugr01s_045.ccodmarca')
            ->where('cesdoc', '04')
            ->when($request->cven, function ($query) use ($request){
                return $query->where('scr_hcom20s.cven', $request->cven);
            })
            ->whereYear('femi', 2024)
            ->whereMonth('femi', 9)
            ->get();
        return response()->json($datafull, 200);
    }

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
            "scrhcom20" => $this->subirScrHcom20($request),
            "scrhcom21" => $this->subirScrHcom21($request),
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
        $objetCom30= new Com30Controller();
        $mensaje = $objetCom30->procesando($request);
        return $mensaje;
    }

    private function subirCom10(Request $request){
        $objetCom10= new Com10Controller();
        $mensaje = $objetCom10->procesando($request);
        return $mensaje;
    }

    private function subirCom05(Request $request){
        $objetCom05= new Com05Controller();
        $mensaje = $objetCom05->procesando($request);
        return $mensaje;
    }

    private function subirCom07(Request $request){
        $objetCom07= new Com07Controller();
        $mensaje = $objetCom07->procesando($request);
        return $mensaje;
    }

    private function subirCom31(Request $request){
        $objetCom31= new Com31Controller();
        $mensaje = $objetCom31->procesando($request);
        return $mensaje;
    }

    private function subirScrHcom20(Request $request){
        $objetScrHcom20= new ScrHcom20Controller();
        $mensaje = $objetScrHcom20->procesando($request);
        return $mensaje;
    }

    private function subirScrHcom21(Request $request){
        $objetScrHcom21= new ScrHcom21Controller();
        $mensaje = $objetScrHcom21->procesando($request);
        return $mensaje;
    }
}
