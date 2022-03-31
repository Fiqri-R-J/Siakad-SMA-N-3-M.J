<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tahunajaran extends Model
{
    protected $guarded = [];

    public function kelas()
    {
        return $this->hasMany('\App\Kelas');
    }
}
