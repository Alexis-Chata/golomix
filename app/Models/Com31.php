<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Com31 extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function com07s()
    {
        return $this->belongsTo(Com07::class, 'ccli', 'ccli');
    }

    public function com30s()
    {
        return $this->belongsTo(Com30::class, 'crut', 'crut');
    }
}
