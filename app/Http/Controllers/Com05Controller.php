<?php

namespace App\Http\Controllers;

use App\Imports\Com05sImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Com05Controller extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $archivo = $request->file('arch_com05');
        Excel::import(new Com05sImport, $archivo);
        return redirect()->route('dashboard');
    }
}
