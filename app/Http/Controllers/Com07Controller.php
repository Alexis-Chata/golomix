<?php

namespace App\Http\Controllers;

use App\Imports\Com07sImport;
use App\Models\Com07;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Com07Controller extends Controller
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
        $archivo = $request->file('arch_com07');
        Excel::import(new Com07sImport, $archivo);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Com07  $com07
     * @return \Illuminate\Http\Response
     */
    public function show(Com07 $com07)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Com07  $com07
     * @return \Illuminate\Http\Response
     */
    public function edit(Com07 $com07)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Com07  $com07
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Com07 $com07)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Com07  $com07
     * @return \Illuminate\Http\Response
     */
    public function destroy(Com07 $com07)
    {
        //
    }
}
