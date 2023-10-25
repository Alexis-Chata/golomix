<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function bitacora(){
        $bitacoras = Bitacora::orderBy('id', 'DESC')->get();
        return view('bitacora', compact('bitacoras'));
    }
}
