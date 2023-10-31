<?php

namespace App\Http\Controllers;

use App\Models\Com10;
use App\Traits\BitacoraTrait;
use App\Traits\QueryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ListaclienteController extends Controller
{
    use QueryTrait, BitacoraTrait;

    public function listaclientesall()
    {
        $cven = null;
        $com31s = $this->querylistaclientes();
        return view('listaClientes', compact('com31s', 'cven'));
    }

    public function listaclientes($cven)
    {
        (Gate::denies('verpedidos', $cven) ? abort(401, auth()->user()->codVendedorAsignados->pluck('cven')->first()??'') : 'Allowed');

        $com10s = Com10::with('com30sr1', 'com30sr2', 'com30sr3', 'com30sr4', 'com30sr5', 'com30sr6', 'com30sr7')->firstWhere('cven', $cven);
        //dd($com10s->toArray());
        $com31s = $this->querylistaclientes($cven);
        $descripcion = "Lista Clientes ".$cven;
        if (isset($com31s[0])) {
            $descripcion .= " - ".$com31s[0]->tven;
        }
        $this->bitacora($descripcion, __METHOD__);
        return view('listaClientes', compact('com31s', 'cven', 'com10s'));
    }

}
