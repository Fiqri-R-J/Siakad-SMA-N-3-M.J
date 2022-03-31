<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $guarded = [];
    public function admin()
    {
        return $this->hasMany('\App\Admin', 'mapel_id');
    }
}