<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
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
        return $this->belongsToMany('\App\Kelas', 'kelassiswas', 'siswa_id', 'kelas_id', 'id', 'id');
    }
}
