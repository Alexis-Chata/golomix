<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficosController extends Controller
{
    public function avances()
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
            ->whereYear('femi', 2024)
            ->whereMonth('femi', 8)
            ->get();
        dd($datafull->sum('qimp'), $datafull->groupBy('ccodmarca')->sortKeys());
        return view('graficos.avance', compact('datafull'));
    }
}
