<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NilaiController extends Controller
{
    public function index()
    {
        $siswa = auth()->user()->user;
        $data['kelas'] = $siswa->kelas;

        return view('siswa.nilai.index', $data);
    }
}
