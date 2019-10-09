<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    protected $table = 'satker';

    public function balai()
    {
        return $this->belongsTo(Balai::class);
    }
    public function paket()
    {
        return $this->hasMany(Paket::class, 'kdsatker', 'kdsatker');
    }

    public function paketaccess()
    {
        return $this->hasMany(Paketaccess::class, 'kdsatker', 'kdsatker');
    }
}
