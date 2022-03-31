<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo('\App\Kelas');
    }

    public function mapel()
    {
        return $this->belongsTo('\App\Mapel');
    }

    public function guru()
    {
        return $this->belongsTo('\App\Guru');
    }
}
