<?php

namespace App\Http\Controllers;

use App\Models\Com10;
use App\Traits\QueryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TomadorController extends Controller
{
    use QueryTrait;

    public function index()
    {
        dd(
            "Descripcion",
            __METHOD__,
            request()->url(),
            request()->method(),
            request()->route()->getName(),
            request()->ip(),
            auth()->id(),
            auth()->user()->name,
            implode(",", auth()->user()->getRoleNames()->toArray()),
            implode(",", auth()->user()->getAllPermissions()->toArray()),
        );
        $dia = Carbon::now()->format('w');
        // $dia = Carbon::parse('2023-10-22')->format('w');
        $dia = ($dia == 0 ? '7' : $dia);
        $cven = auth()->user()->codVendedorAsignados()->firstWhere('tipo', 'main')->cven;
        $rutaDelDia = Com10::whereCven($cven)->get('r'.$dia)->first()['r'.$dia];
        $clientes = $this->querylistaclientes($cven, $rutaDelDia);
        return view('tomador.index', compact('clientes', 'rutaDelDia'));
    }
}
