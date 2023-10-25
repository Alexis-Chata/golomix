<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Com10;
use App\Traits\BitacoraTrait;
use App\Traits\QueryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TomadorController extends Controller
{
    use QueryTrait, BitacoraTrait;

    public function index()
    {
        $dia = Carbon::now()->format('w');
        // $dia = Carbon::parse('2023-10-22')->format('w');
        $dia = ($dia == 0 ? '7' : $dia);
        $cven = auth()->user()->codVendedorAsignados()->firstWhere('tipo', 'main')->cven;
        $rutaDelDia = Com10::whereCven($cven)->get('r'.$dia)->first()['r'.$dia];
        $clientes = $this->querylistaclientes($cven, $rutaDelDia);
        // $this->bitacora('Tomador Pedidos', __METHOD__);
        return view('tomador.index', compact('clientes', 'rutaDelDia'));
    }
}
