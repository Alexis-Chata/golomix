<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(!auth()->user()->hasAnyRole('Super-Admin')){
            return redirect()->route('pedidos',[auth()->user()->codVendedorAsignados->firstWhere('tipo', 'main')->cven]);
        }
        return view('dashboard');
    }
}
