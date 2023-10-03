<?php

namespace App\Http\Controllers;

use App\Imports\Com31sImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Com31Controller extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $archivo = $request->file('arch_com31');
        Excel::import(new Com31sImport, $archivo);
        return redirect()->route('dashboard');
    }
}
