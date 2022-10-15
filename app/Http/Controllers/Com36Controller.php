<?php

namespace App\Http\Controllers;

use App\Imports\Com36sImport;
use App\Imports\Com37sImport;
use App\Models\Com36;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Com36Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->arch_com36);
        $archivo = $request->file('arch_com36');
        Excel::import(new Com36sImport, $archivo);
        //$archivo = $this->import($archivo);
        return redirect()->route('dashboard');
    }

    public function import($archivo)
    {
        Excel::import(new Com36sImport, $archivo);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecom37(Request $request)
    {
        //dd($request->arch_com36);
        $archivo = $request->file('arch_com37');
        Excel::import(new Com37sImport, $archivo);
        //$archivo = $this->import($archivo);
        return redirect()->route('dashboard');
    }

    public function importcom37($archivo)
    {
        Excel::import(new Com37sImport, $archivo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Com36  $com36
     * @return \Illuminate\Http\Response
     */
    public function show(Com36 $com36)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Com36  $com36
     * @return \Illuminate\Http\Response
     */
    public function edit(Com36 $com36)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Com36  $com36
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Com36 $com36)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Com36  $com36
     * @return \Illuminate\Http\Response
     */
    public function destroy(Com36 $com36)
    {
        //
    }
}
