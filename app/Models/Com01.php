<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Com01 extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Obtiene el precio 001 por unidad del producto .
     */
    protected function precio001xunidad(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($this->qprecio / $this->qfaccon, 2),
        );
    }

    /**
     * Obtiene el precio 002 por unidad del producto .
     */
    protected function precio002xunidad(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($this->qprecio2 / $this->qfaccon, 2),
        );
    }


    /**
     * Obtiene la marca del producto
     */
    protected function marcaproducto(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ugr01::where('cind', '045')->get()->where('ccod', $this->cc04)->first()->tdes,
        );
    }
}
