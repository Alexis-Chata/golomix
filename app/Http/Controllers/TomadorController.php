<?php

namespace App\Http\Controllers;

use App\Models\Com31;
use Illuminate\Http\Request;

class TomadorController extends Controller
{
    public function index()
    {
        $Clientes = new ListaclienteController();
        //return auth()->user()->codVendedorAsignadosMain()->cven;
        $cven = auth()->user()->codVendedorAsignados()->firstWhere('tipo', 'main')->cven;
        dd($cven);
        $Clientes->querylistaclientes();
        return $Clientes;
        return view('tomador.index');
    }
}
