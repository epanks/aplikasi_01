<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balai extends Model
{
    protected $table = 'balai';

    public function satker()
    {
        return $this->hasMany(Satker::class);
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function paket()
    {
        return $this->hasManyThrough(Paket::class, Satker::class, 'balai_id', 'kdsatker', 'id', 'kdsatker');
    }
}
