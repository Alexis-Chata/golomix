<?php

namespace App\Http\Controllers;

use App\Exports\Com01sExport;
use App\Imports\Com01sImport;
use App\Imports\Com01sTipoProductoImport;
use App\Models\Com01;
use App\Models\ugr01;
use App\Traits\BitacoraTrait;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Com01Controller extends Controller
{
    use BitacoraTrait;

    public function index()
    {
        list($com01s, $marcas) = $this->listaPrecios();
        $precioMayorista = false;
        $descripcion = "Lista Precios Bodega";
        $this->bitacora($descripcion, __METHOD__);
        return view('productos', compact('com01s', 'precioMayorista', 'marcas'));
    }

    /**
     * Display a listing of the resource. lista precios mayorista
     *
     * @return \Illuminate\Http\Response
     */
    public function precioMayorista()
    {
        list($com01s, $marcas) = $this->listaPrecios();
        $precioMayorista = true;
        $descripcion = "Lista Precios Mayorista";
        $this->bitacora($descripcion, __METHOD__);
        return view('productos', compact('com01s', 'precioMayorista', 'marcas'));
    }

    public function listaPrecios()
    {
        $marcas = ugr01::where('cind', '045')->get();
        if (auth()->check()) {
            // Lista Sin Productos Discontinuados
            $com01s = Com01::whereNotIn('flagcre', ['1'])->get('id');
            $com01s = $com01s->concat(Com01::where('flagcre', '1')->whereNotIn('tipo_producto_id', ['5'])->where('fanu', '>', now()->subMonth(5))->whereNotIn('qprecio', ['0.01'])->get('id'));
            $com01s = Com01::whereIn('id', $com01s->pluck('id'))->orderBy('cc04')->orderBy('tcor')->orderBy('qprecio')->orderBy('cequiv')->get();
            //dd($com01s->first());
        } else {
            $com01s = Com01::all();
        }
        return [$com01s, $marcas];
    }

    public function listaPreciosDownloadPdf($tipoPrecio = '001')
    {
        list($com01s, $marcas) = $this->listaPrecios();
        $tipoPrecio == '001' ? $precioMayorista = false : $precioMayorista = true;
        //dd($com31s->firstwhere('ccli', '07001040')->scrhcom20s->last()->femi);
        //return View('listaPreciosDownloadPdf', compact('com01s', 'precioMayorista', 'marcas'));
        $nombrePdf = 'Lista_Productos_' . $tipoPrecio . '.pdf';
        $pdf = Pdf::loadView('listaPreciosDownloadPdf', compact('com01s', 'precioMayorista', 'marcas'));
        return $pdf->download($nombrePdf);
    }

    public function listaPreciosDownloadExcel($tipoPrecio = '001')
    {
        list($com01s, $marcas) = $this->listaPrecios();
        $filename = ($tipoPrecio == '001') ? 'Bodega.xlsx' : 'Mayorista.xlsx';
        return Excel::download(new Com01sExport, $filename);
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
}
