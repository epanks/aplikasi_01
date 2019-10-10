<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayah';

    public function balai()
    {
        return $this->hasMany(Balai::class);
    }
    public function satker()
    {
        return $this->hasManyThrough(Satker::class, Balai::class);
    }
}
