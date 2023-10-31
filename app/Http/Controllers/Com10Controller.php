<?php

namespace App\Http\Controllers;

use App\Exports\Com31sExport;
use App\Imports\Com10sImport;
use App\Traits\QueryTrait;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Com10Controller extends Controller
{
    use QueryTrait;

    public function listaclientesDownloadPdf($cven, $crut)
    {
        $nro = 1;
        $com31s = $this->querylistaclientes($cven, $crut);
        //return View('listaclientesDownloadPdf', compact('com31s', 'nro'));
        $nombrePdf = 'Ruta ' . $com31s[0]->crut . ' - ' . $com31s[0]->tdes . '.pdf';
        $pdf = Pdf::loadView('listaclientesDownloadPdf', compact('com31s', 'nro'));
        return $pdf->download($nombrePdf);
    }
    public function listaclientesDownloadExcel($cven = null, $crut = null){
        $filePath = isset($crut) ? 'Vendedor_'.$cven.'_Ruta_'.$crut.'.xlsx' : 'Vendedor_'.$cven.'_lista_clientes.xlsx';
        return Excel::download(new Com31sExport($cven, $crut), $filePath);
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
}
