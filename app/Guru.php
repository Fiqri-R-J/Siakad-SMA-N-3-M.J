<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guru extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('\App\User');
    }
    public function getProfil()
    {
        if (!$this->profil) {
            return asset('images/default.png');
        }
        return asset('images/' . $this->profil);
    }
    public function kelas()
    {
        return $this->hasMany('\App\Kelas');
    }
    public function jadwal()
    {
        return $this->hasMany('\App\Jadwal');
    }
    public function tugas()
    {
        return $this->hasMany('\App\Tugas');
    }
}
