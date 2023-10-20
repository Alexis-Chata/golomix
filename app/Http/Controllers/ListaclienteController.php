<?php

namespace App\Http\Controllers;

use App\Models\Com10;
use App\Traits\QueryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class ListaclienteController extends Controller
{
    use QueryTrait;

    public function listaclientesall()
    {
        $com31s = $this->querylistaclientes();
        return view('listaClientes', compact('com31s'));
    }

    public function listaclientes($cven)
    {
        (Gate::denies('verpedidos', $cven) ? abort(401, auth()->user()->codVendedorAsignados->pluck('cven')->first()??'') : 'Allowed');

        $com10s = Com10::with('com30sr1', 'com30sr2', 'com30sr3', 'com30sr4', 'com30sr5', 'com30sr6', 'com30sr7')->firstWhere('cven', $cven);
        //dd($com10s->toArray());
        $com31s = $this->querylistaclientes($cven);
        //dd($com31s);
        return view('listaClientes', compact('com31s', 'cven', 'com10s'));
    }

}
