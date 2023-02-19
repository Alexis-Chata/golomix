<?php

namespace App\Http\Controllers;

use App\Imports\Com10sImport;
use App\Models\Com10;
use App\Models\Com31;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Com10Controller extends Controller
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

    public function listaclientesDownloadPdf($cven, $crut)
    {
        $nro = 1;
        //$com31s = Com31::with(['com07s', 'com30s', 'scrhcom20s'])->whereRelation('com30s.com10s', 'cven', '=', $cven)->where('crut', $crut)->get();
        $com31s = DB::select("SELECT
        `com31s`.`ccli`
        , `com31s`.`crut`
        , `com31s`.`nsecprev`
        , `com31s`.`cmod`
        , `com30s`.`tdes`
        , `com30s`.`czon`
        , `com07s`.`tcli`
        , `com07s`.`tdir`
        , `com07s`.`cruc`
        , `com07s`.`le`
        , `com07s`.`clistpr`
        , `com10s`.`cven`
        , `com10s`.`tven`
        , `scr_hcom20s`.`femi`
        FROM
            `com31s`
            INNER JOIN `com07s`
                ON (`com31s`.`ccli` = `com07s`.`ccli`)
            INNER JOIN `com30s`
                ON (`com31s`.`crut` = `com30s`.`crut`)
            INNER JOIN `com10s`
                ON (`com30s`.`czon` = `com10s`.`czon`)
            LEFT JOIN (SELECT ccli, MAX(femi) AS femi FROM scr_hcom20s GROUP BY ccli) scr_hcom20s
                ON (`com31s`.`ccli` = `scr_hcom20s`.`ccli`)
        WHERE   cven = $cven AND com31s.crut = $crut");
        //dd($com31s->firstwhere('ccli', '07001040')->scrhcom20s->last()->femi);
        //return View('listaclientesDownloadPdf', compact('com31s', 'nro'));
        $nombrePdf = 'Ruta '.$com31s[0]->crut.' - '.$com31s[0]->tdes.'.pdf';
        $pdf = Pdf::loadView('listaclientesDownloadPdf', compact('com31s', 'nro'));
        return $pdf->download($nombrePdf);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $archivo = $request->file('arch_com10');
        Excel::import(new Com10sImport, $archivo);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Com10  $com10
     * @return \Illuminate\Http\Response
     */
    public function show(Com10 $com10)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Com10  $com10
     * @return \Illuminate\Http\Response
     */
    public function edit(Com10 $com10)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Com10  $com10
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Com10 $com10)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Com10  $com10
     * @return \Illuminate\Http\Response
     */
    public function destroy(Com10 $com10)
    {
        //
    }
}
