<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Com05Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("
            INSERT INTO `com05s` (`id`, `ccon`, `tnom`, `tdir`, `nfon`, `nlibele`, `nlibmil`, `nbre`, `fcto`, `cveh`, `flatit`, `flatra`, `qcons`, `nruc`, `fces`, `clin`, `csisven`, `ngui`, `flctrcie`, `qcaj`, `qnmped`, `fmlpgc`, `ctrans`, `cuser`, `cidpr`, `fupgr`, `tupgr`, `created_at`, `updated_at`) VALUES
            (1, '001', 'JESUS M.HIBIRMAS WICTTOR', 'SANTA MARIA MZ B', NULL, '12345678', NULL, 'Q48058641', '2023-01-01', '001', '1', '1', '0', NULL, '2030-12-31', '03', '100', NULL, NULL, NULL, '150', NULL, '011', 'GESTOR1', 'COGRABA    M', '2023-01-13', '12:49:11', '2023-02-15 00:32:39', '2023-02-15 00:32:39'),
            (2, '002', 'MANUEL', 'MZ D LT 2 EN LA MIRA DEL EXITO', '123456', '40224503', '7575757575', 'Q40224503', '2023-01-01', '002', '1', '1', '20', '10272569248', '2030-12-31', '03', '100', NULL, NULL, NULL, '150', NULL, '011', 'GESTOR1', 'COGRABA    M', '2023-01-13', '12:49:27', '2023-02-15 00:32:39', '2023-02-15 00:32:39'),
            (3, '003', 'HECTOR', 'MZ.L-08 LT.25 MARISCAL CACERES', NULL, '43461608', NULL, 'Q43461608', '2023-01-01', '003', '1', '1', '20', NULL, '2030-12-31', '03', '100', NULL, NULL, NULL, '150', NULL, '011', 'GESTOR1', 'COGRABA    M', '2023-01-13', '12:49:47', '2023-02-15 00:32:39', '2023-02-15 00:32:39'),
            (4, '999', 'ANGEL REYNOSO', 'MZ.Q LT.6 JICAMARCA', '123456', '10107253', NULL, 'Q-10107253', '2023-01-01', '099', '1', '1', '20', '01431489584', '2030-12-31', '03', '100', NULL, NULL, NULL, '150', NULL, '011', 'GESTOR1', 'COGRABA    M', '2023-01-13', '12:52:48', '2023-02-15 00:32:39', '2023-02-15 00:32:39'),
            (5, '004', 'JAIME', 'JICAMARCA LIMA SJL', '312359', '12345678', NULL, 'Q23456789', '2023-01-01', '004', '1', '1', '20', '10431489584', '2030-12-31', '03', '100', NULL, NULL, NULL, '150', NULL, '011', 'GOLOMIX', 'COGRABA    M', '2023-02-09', '16:14:34', '2023-02-15 00:32:39', '2023-02-15 00:32:39'),
            (6, '005', 'ILICH', 'MZ.H LT.15 AH.VALLE SAGRADO', NULL, '43148958', NULL, 'Q43148958', '2023-01-01', '005', '1', '1', '20', NULL, '2030-12-31', '03', '100', NULL, NULL, NULL, '150', NULL, '011', 'GOLOMIX', 'COGRABA    M', '2023-02-07', '16:11:39', '2023-02-15 00:32:39', '2023-02-15 00:32:39'),
            (7, '006', 'HENRY', 'AAHH.SOMOS LIBRES MZ.B LT.15 SJL LIMA', NULL, '10678409', NULL, 'T10678409', '2023-01-01', '006', '1', '1', '20', NULL, '2030-12-31', '03', '100', NULL, NULL, NULL, '150', NULL, '011', 'GOLOMIX', 'COGRABA    M', '2023-02-09', '16:14:59', '2023-02-15 00:32:39', '2023-02-15 00:32:39'),
            (8, '007', 'KEVIN', 'MZ H LT15 AH VALLE SAGRADO SJL', NULL, '10107253', NULL, 'Q-10107253', '2023-01-01', '007', '1', '1', '20', NULL, '2030-12-31', '03', '100', NULL, NULL, NULL, '150', NULL, '011', 'GOLOMIX', 'COGRABA    M', '2023-02-09', '16:14:47', '2023-02-15 00:32:39', '2023-02-15 00:32:39'),
            (9, '008', 'NUEVO1', 'AAHH.SOMOS LIBRES MZ.B LT.15SJL LIMA', NULL, '10678409', NULL, 'T10678409', '2023-01-01', '008', '1', '1', '20', NULL, '2030-12-31', '03', '100', NULL, NULL, NULL, '150', NULL, '011', 'GESTOR1', 'COGRABA    M', '2023-01-13', '12:51:01', '2023-02-15 00:32:39', '2023-02-15 00:32:39'),
            (10, '009', 'NUEVO2', 'JICAMARCA', NULL, '12345678', NULL, 'Q123456789', '2023-01-01', '009', '1', '1', '0', NULL, '2030-12-31', '03', '100', NULL, NULL, NULL, '150', NULL, '011', 'GESTOR1', 'COGRABA    M', '2023-01-13', '12:51:52', '2023-02-15 00:32:39', '2023-02-15 00:32:39'),
            (11, '010', 'WAGNER', NULL, NULL, '12345678', NULL, '12345678', '2023-01-01', '010', '1', '1', '0', NULL, '2030-12-31', '03', '100', NULL, NULL, NULL, '150', NULL, '011', 'GESTOR1', 'COGRABA    M', '2023-01-13', '12:51:45', '2023-02-15 00:32:39', '2023-02-15 00:32:39'),
            (12, '011', 'FUERA DE RUTA', NULL, NULL, '12345678', NULL, '12345678', '2023-01-01', '011', '1', '1', '0', NULL, '2030-12-31', '03', '100', NULL, NULL, NULL, '150', NULL, '011', 'GESTOR1', 'COGRABA    M', '2023-01-27', '10:48:51', '2023-02-15 00:32:39', '2023-02-15 00:32:39'),
            (13, '012', 'REYNOSO 2', NULL, NULL, '12314567', '8', '12345678', '2023-01-01', '012', '1', '1', '0', NULL, '2030-12-31', '03', '100', NULL, NULL, NULL, '150', NULL, '011', 'GESTOR1', 'COGRABA    M', '2023-01-17', '16:23:04', '2023-02-15 00:32:39', '2023-02-15 00:32:39');
        ");
    }
}
