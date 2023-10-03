<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Com37 extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['qcanpedbultos', 'qcanpedunidads'];

    public function getQcanpedbultosAttribute()
    {
        return explode(localeconv()['decimal_point'], $this->qcanped)[0] ?? 0;
    }

    public function getQcanpedunidadsAttribute()
    {
        return explode(localeconv()['decimal_point'], $this->qcanped)[1] ?? 0;
    }
}
