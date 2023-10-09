<?php

namespace App\Policies;

use App\Models\User;

class PedidosPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine si el usuario puede actualizar la publicación dada.
     *
     */
    public function verpedidos(User $user, $cven)
    {
        return in_array($cven, $user->codVendedorAsignados->pluck('cven')->toArray(), $cven);
    }
}
