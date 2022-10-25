<?php

namespace App\Http\Controllers;

use App\Imports\Ugr01sImport;
use App\Models\Ugr01;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Ugr01Controller extends Controller
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
        $archivo = $request->file('arch_ugr01');
        Excel::import(new Ugr01sImport, $archivo);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ugr01  $ugr01
     * @return \Illuminate\Http\Response
     */
    public function show(Ugr01 $ugr01)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ugr01  $ugr01
     * @return \Illuminate\Http\Response
     */
    public function edit(Ugr01 $ugr01)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ugr01  $ugr01
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ugr01 $ugr01)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ugr01  $ugr01
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ugr01 $ugr01)
    {
        //
    }
}
