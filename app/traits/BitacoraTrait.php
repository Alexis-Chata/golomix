<?php

namespace App\Traits;

use App\Models\Bitacora;

trait BitacoraTrait
{

    public function bitacora($title, $clase_metodo){
        Bitacora::create(array(
            "descripcion" => $title,
            "clase_metodo" => $clase_metodo,
            "url" => request()->url(),
            "url_metodo" => request()->method(),
            "route_name" => request()->route()->getName(),
            "ip" => request()->ip(),
            "user_id" => auth()->id(),
            "user_name" => auth()->user()->name,
            "roles_names" => implode(",", auth()->user()->getRoleNames()->toArray()),
            "permisos_names" => implode(",", auth()->user()->getAllPermissions()->toArray()),
        ));
    }
}
