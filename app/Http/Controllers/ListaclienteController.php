<?php

namespace App\Http\Controllers;

use App\Models\Com10;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListaclienteController extends Controller
{
    public function listaclientesall()
    {
        $com31s = $this->querylistaclientes();
        return view('listaClientes', compact('com31s'));
    }

    public function listaclientes($cven)
    {
        $com10s = Com10::with('com30sr1', 'com30sr2', 'com30sr3', 'com30sr4', 'com30sr5', 'com30sr6', 'com30sr7')->firstWhere('cven', $cven);
        //dd($com10s->toArray());
        $com31s = $this->querylistaclientes($cven);
        //dd($com31s);
        return view('listaClientes', compact('com31s', 'cven', 'com10s'));
    }

    public function querylistaclientes($cven = null){
        ($cven != null) ? $where = "\n WHERE   cven = $cven" : $where = "";

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
                ON (`com31s`.`ccli` = `scr_hcom20s`.`ccli`)".$where);
        //dd($com31s);
        return $com31s;
    }
}
