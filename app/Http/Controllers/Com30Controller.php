<?php

namespace App\Http\Controllers;

use App\Imports\Com30sImport;
use App\Models\Com30;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Com30Controller extends Controller
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
        $archivo = $request->file('arch_com30');
        Excel::import(new Com30sImport, $archivo);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Com30  $com30
     * @return \Illuminate\Http\Response
     */
    public function show(Com30 $com30)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Com30  $com30
     * @return \Illuminate\Http\Response
     */
    public function edit(Com30 $com30)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Com30  $com30
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Com30 $com30)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Com30  $com30
     * @return \Illuminate\Http\Response
     */
    public function destroy(Com30 $com30)
    {
        //
    }
}
