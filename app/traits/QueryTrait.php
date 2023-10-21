<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait QueryTrait
{

    public function querylistaclientes($cven = null, $crut = null){
        ($cven != null) ? $where = "\n WHERE   cven = $cven" : $where = "";
        ($crut != null) ? $where = "\n WHERE   com31s.crut = $crut" : $where = "";

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
