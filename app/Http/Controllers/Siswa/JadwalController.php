<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalController extends Controller
{
    public function index()
    {
        $user = auth()->user()->user;

        $kelas = \App\Siswa::where('id', $user->id)->with(['kelas' => function ($query) {
            $query->whereHas('tahunajaran', function ($query) {
                $query->where('status', 1);
            });
        }])->first();

        if ($kelas->kelas->count() > 0) {
            $data['kelas'] = $kelas->kelas[0];
            $data['jadwal'] = $data['kelas']->jadwal;
        } else {
            $data['kelas'] = null;
        }

        return view('siswa.jadwal.index', $data);
    }
}
