<?php

namespace App\Http\Controllers;

use App\Imports\Com31sImport;
use App\Models\Com31;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Com31Controller extends Controller
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
        $archivo = $request->file('arch_com31');
        Excel::import(new Com31sImport, $archivo);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Com31  $com31
     * @return \Illuminate\Http\Response
     */
    public function show(Com31 $com31)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Com31  $com31
     * @return \Illuminate\Http\Response
     */
    public function edit(Com31 $com31)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Com31  $com31
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Com31 $com31)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Com31  $com31
     * @return \Illuminate\Http\Response
     */
    public function destroy(Com31 $com31)
    {
        //
    }
}
