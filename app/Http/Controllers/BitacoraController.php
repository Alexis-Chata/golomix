<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function bitacora(){
        $fechaInicio = now()->subMonths(3)->startOfDay();
        $bitacoras = Bitacora::whereDate('created_at', '>=', $fechaInicio)->orderBy('id', 'DESC')->get();
        return view('bitacora', compact('bitacoras'));
    }
}
