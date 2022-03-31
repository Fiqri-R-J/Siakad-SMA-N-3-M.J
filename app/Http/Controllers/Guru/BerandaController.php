<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index()
    {
        $data['user'] = auth()->user()->user;
        $data['jadwal'] = $data['user']->jadwal;
        
        $data['tahunajaran'] = \App\Tahunajaran::where('status', 1)->first();

        return view('guru.beranda.index', $data);
    }
}
