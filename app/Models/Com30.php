<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Com30 extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['com10s'];

    public function com10s()
    {
        return $this->belongsTo(Com10::class, 'czon', 'czon');
    }
}
