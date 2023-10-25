<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function bitacora(){
        $users = Bitacora::all();
        return view('bitacora', compact('users'));
    }
}
