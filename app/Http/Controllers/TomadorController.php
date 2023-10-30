<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Com10;
use App\Models\Com31;
use App\Traits\BitacoraTrait;
use App\Traits\QueryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class TomadorController extends Controller
{
    use QueryTrait, BitacoraTrait;

    public function index()
    {
        $dia = Carbon::now()->format('w');
        // $dia = Carbon::parse('2023-10-22')->format('w');
        $dia = ($dia == 0 ? '7' : $dia);
        $cven = $this->getCvenMain();
        $rutaDelDia = Com10::whereCven($cven)->get('r'.$dia)->first()['r'.$dia];
        $clientes = $this->querylistaclientes($cven, $rutaDelDia);
        // $this->bitacora('Tomador Pedidos', __METHOD__);
        return view('tomador.index', compact('clientes', 'rutaDelDia'));
    }

    public function show($ccli)
    {
        $cven = $this->getCvenMain();
        $com31 = Com31::with('com07s', 'com30s')->firstWhere('ccli', $ccli);
        (Gate::denies('verpedidos', $com31->com30s->com10s->cven) ? abort(401, $com31->com30s->com10s->cven??'') : ('Allowed'));
        //return $com31;
        return view('tomador.show', compact('com31'));
    }

    public function getCvenMain(){
        return auth()->user()->codVendedorAsignados()->firstWhere('tipo', 'main')->cven;
    }
}
