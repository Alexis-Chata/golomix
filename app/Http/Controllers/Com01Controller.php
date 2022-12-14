<?php

namespace App\Http\Controllers;

use App\Imports\Com01sImport;
use App\Models\Com01;
use App\Models\Ugr01;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Com01Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Ugr01::where('cind', '045')->get();
        $com01s = Com01::all();
        $precioMayorista = false;
        return view('productos', compact('com01s', 'precioMayorista', 'marcas'));
    }

    /**
     * Display a listing of the resource. lista precios mayorista
     *
     * @return \Illuminate\Http\Response
     */
    public function precioMayorista()
    {
        $marcas = Ugr01::where('cind', '045')->get();
        $com01s = Com01::all();
        $precioMayorista = true;
        return view('productos', compact('com01s', 'precioMayorista', 'marcas'));
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
        $archivo = $request->file('arch_com01');
        Excel::import(new Com01sImport, $archivo);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Com01  $com01
     * @return \Illuminate\Http\Response
     */
    public function show(Com01 $com01)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Com01  $com01
     * @return \Illuminate\Http\Response
     */
    public function edit(Com01 $com01)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Com01  $com01
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Com01 $com01)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Com01  $com01
     * @return \Illuminate\Http\Response
     */
    public function destroy(Com01 $com01)
    {
        //
    }
}
