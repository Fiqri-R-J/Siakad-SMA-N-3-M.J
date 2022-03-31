<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class BerandaController extends Controller
{
    public function index()
    {
        $data['hari'] = $this->hari();

        $data['user'] = auth()->user()->user;
        $kelas = \App\Siswa::where('id', $data['user']->id)->with(['kelas' => function ($query) {
            $query->whereHas('tahunajaran', function ($query) {
                $query->where('status', 1);
            });
        }])->first();

        if ($kelas->kelas->count() > 0) {
            $data['kelas'] = $kelas->kelas[0];
            $data['jadwal_sekarang'] = $data['kelas']->jadwal->where('hari', $data['hari']);
            $data['tugas_mingguan'] = $data['kelas']->tugas;
        } else {
            $data['kelas'] = null;
        }

        return view('siswa.beranda.index', $data);
    }

    public function hari()
    {
        $hari = Carbon::now()->format('D');
        if ($hari == 'Sun') {
            return 'Minggu';
        } elseif ($hari == 'Mon') {
            return 'Senin';
        } elseif ($hari == 'Tue') {
            return 'Selasa';
        } elseif ($hari == 'Wed') {
            return 'Rabu';
        } elseif ($hari == 'Thu') {
            return 'Kamis';
        } elseif ($hari == 'Fri') {
            return 'Jumat';
        } elseif ($hari == 'Sat') {
            return 'Senin';
        }
        return '';
    }
}
