<?php

namespace App\Http\Controllers;

use App\Imports\Com01sImport;
use App\Imports\Com01sTipoProductoImport;
use App\Models\Com01;
use App\Models\Ugr01;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $com01s = $this->listaPrecios();
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
        $com01s = $this->listaPrecios();
        $precioMayorista = true;
        return view('productos', compact('com01s', 'precioMayorista', 'marcas'));
    }

    public function listaPrecios(){
        if(!Auth::check()){
            // Lista Sin Productos Discontinuados
            $com01s = Com01::whereNotIn('flagcre',['1'])->get();
            $com01s = $com01s->concat(Com01::where('flagcre', '1')->whereNotIn('tipo_producto_id', ['5'])->where('fanu', '>', now()->subMonth(5))->whereNotIn('qprecio', ['0.01'])->get());
        }else{
            $com01s = Com01::all();
        }
        return $com01s;
    }

    public function listaPreciosDownloadPdf($tipoPrecio = '001')
    {
        $marcas = Ugr01::where('cind', '045')->get();
        $com01s = Com01::whereNotIn('flagcre',['1'])->orderBy('cc04')->orderBy('tcor')->orderBy('qprecio')->orderBy('cequiv')->get();
        $tipoPrecio == '001' ? $precioMayorista = false : $precioMayorista = true;
        //dd($com31s->firstwhere('ccli', '07001040')->scrhcom20s->last()->femi);
        //return View('listaPreciosDownloadPdf', compact('com01s', 'precioMayorista', 'marcas'));
        $nombrePdf = 'Lista_Productos_'.$tipoPrecio.'.pdf';
        $pdf = Pdf::loadView('listaPreciosDownloadPdf', compact('com01s', 'precioMayorista', 'marcas'));
        return $pdf->download($nombrePdf);
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

    public function actualizaTipoProductoId(Request $request)
    {
        $archivo = $request->file('com01_actualizaTipoProducto');
        Excel::import(new Com01sTipoProductoImport, $archivo);
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
