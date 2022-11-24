<?php

namespace App\Http\Controllers;

use App\Imports\Com05sImport;
use App\Models\Com05;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Com05Controller extends Controller
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
        $archivo = $request->file('arch_com05');
        Excel::import(new Com05sImport, $archivo);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Com05  $com05
     * @return \Illuminate\Http\Response
     */
    public function show(Com05 $com05)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Com05  $com05
     * @return \Illuminate\Http\Response
     */
    public function edit(Com05 $com05)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Com05  $com05
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Com05 $com05)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Com05  $com05
     * @return \Illuminate\Http\Response
     */
    public function destroy(Com05 $com05)
    {
        //
    }
}
