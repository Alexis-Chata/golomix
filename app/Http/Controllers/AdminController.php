<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        $users = User::with('codVendedorAsignados')->get();
        return view('admin', compact('users'));
    }
}
