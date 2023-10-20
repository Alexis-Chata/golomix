<?php

namespace App\Http\Controllers;

use App\Models\Com31;
use App\Traits\QueryTrait;
use Illuminate\Http\Request;

class TomadorController extends Controller
{
    use QueryTrait;

    public function index()
    {
        $cven = auth()->user()->codVendedorAsignados()->firstWhere('tipo', 'main')->cven;
        $clientes = $this->querylistaclientes($cven);
        //return $clientes;
        return view('tomador.index', compact('clientes'));
    }
}
