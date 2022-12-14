<?php

namespace App\Http\Controllers;

use App\Imports\Com37sImport;
use App\Models\Com37;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Com37Controller extends Controller
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
        $archivo = $request->file('arch_com37');
        Excel::import(new Com37sImport, $archivo);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Com37  $com37
     * @return \Illuminate\Http\Response
     */
    public function show(Com37 $com37)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Com37  $com37
     * @return \Illuminate\Http\Response
     */
    public function edit(Com37 $com37)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Com37  $com37
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Com37 $com37)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Com37  $com37
     * @return \Illuminate\Http\Response
     */
    public function destroy(Com37 $com37)
    {
        //
    }
}
