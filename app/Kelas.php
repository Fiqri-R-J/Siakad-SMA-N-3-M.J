<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $guarded = [];
    public function admin()
    {
        return $this->hasMany('\App\Admin', 'kelas_id');
    }
    public function jadwal()
    {
        return $this->hasMany('\App\Jadwal');
    }
    public function siswa()
    {
        return $this->belongsToMany('\App\Siswa', 'kelassiswas');
    }
    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }
    public function tahunajaran()
    {
        return $this->belongsTo('App\Tahunajaran');
    }
    public function tugas()
    {
        return $this->hasMany('\App\Tugas');
    }
}
