<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Com36 extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function com37s()
    {
        return $this->hasMany(Com37::class, 'nped', 'nped');
    }

    public function com30s()
    {
        return $this->belongsTo(Com30::class, 'crut', 'crut');
    }

    public function com05s()
    {
        return $this->belongsTo(Com05::class, 'ccon', 'ccon');
    }

    public function getCtipAttribute($value)
    {
        switch ($value) {
            case '1':
                $value = "F";
                break;

            case '2':
                $value = "B";
                break;

            case '3':
                $value = "NP";
                break;

            default:
                # code...
                break;
        }
        return ucfirst($value);
    }
}
