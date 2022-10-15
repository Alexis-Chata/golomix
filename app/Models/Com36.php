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
}
