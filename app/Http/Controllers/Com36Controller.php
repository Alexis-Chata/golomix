<?php

namespace App\Http\Controllers;

use App\Imports\Com30sImport;
use App\Imports\Com36sImport;
use App\Imports\Com37sImport;
use App\Models\Com36;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        //elimina pedidos anulados (borrados)
        $f = fopen($request->file('arch_com36'), 'r');
        $npeds = array();
        while (($data = fgetcsv($f)) !== false) {

            if(!isset($indiceNped)){
                $fila = $data;
            }

            foreach ($fila as $key => $value){

                if ($value=='NPED'){
                    $indiceNped = $key;
                }
                if ($value=='FUPGR'){
                    $indiceFupgr = $key;
                }
            }

            if(isset($indiceNped) && $data[$indiceNped]!='NPED'){
                $npeds[] = $data[$indiceNped];
                $fupgr = Carbon::createFromFormat('d/m/Y', $data[$indiceFupgr]);
            }
        }
        Com36::whereNotIn('nped', $npeds)->where('fupgr', $fupgr->format('Y/m/d'))->delete();
        //dd($request->arch_com36);
        $archivo = $request->file('arch_com36');
        Excel::import(new Com36sImport, $archivo);
        //$archivo = $this->import($archivo);
        return redirect()->route('dashboard');
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
