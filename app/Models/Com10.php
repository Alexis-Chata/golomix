<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Com10 extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function com30sr1()
    {
        return $this->belongsTo(Com30::class, 'r1', 'crut');
    }

    public function com30sr2()
    {
        return $this->belongsTo(Com30::class, 'r2', 'crut');
    }

    public function com30sr3()
    {
        return $this->belongsTo(Com30::class, 'r3', 'crut');
    }

    public function com30sr4()
    {
        return $this->belongsTo(Com30::class, 'r4', 'crut');
    }

    public function com30sr5()
    {
        return $this->belongsTo(Com30::class, 'r5', 'crut');
    }

    public function com30sr6()
    {
        return $this->belongsTo(Com30::class, 'r6', 'crut');
    }

    public function com30sr7()
    {
        return $this->belongsTo(Com30::class, 'r7', 'crut');
    }
}
