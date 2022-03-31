<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index()
    {
        $data['user'] = auth()->user()->user;
        $data['kelas'] = \App\Kelas::whereHas('jadwal', function ($query) {
            $query->where('guru_id', auth()->user()->user->id);
        })->with(['jadwal' => function ($query) {
            $query->where('guru_id', auth()->user()->user->id);
        }])->get();

        return view('guru.kelas.index', $data);
    }

    public function detail_walikelas($id)
    {
        $jadwal_id = \App\Jadwal::where('kelas_id', $id)->pluck('mapel_id')->unique();
        $data['kelas'] = \App\Kelas::findOrFail($id);
        $data['mapel'] = \App\Mapel::whereIn('id', $jadwal_id)->get();
        $data['id'] = $id;
        return view('guru.kelas.walikelas.index', $data);
    }

    public function mapel_nilai($id1, $id2)
    {
        $data['kelas'] = \App\Kelas::findOrFail($id1);
        $data['mapel'] = \App\Mapel::findOrFail($id2);
        $data['siswa'] = $data['kelas']->siswa;
        $data['kelas_id'] = $id1;
        $data['mapel_id'] = $id2;

        return view('guru.kelas.walikelas.nilai.index', $data);
    }

    public function detail($id1, $id2)
    {
        $data['kelas'] = \App\Kelas::findOrFail($id1);
        $data['siswa'] = $data['kelas']->siswa;
        $data['kelas_id'] = $id1;
        $data['mapel_id'] = $id2;

        return view('guru.kelas.detail', $data);
    }

    public function nilai(Request $request, $id1, $id2, $id3)
    {
        $request->validate([
            'nilai' => 'required'
        ]);

        \App\Nilai::where('kelas_id', $id1)->where('mapel_id', $id2)->where('siswa_id', $id3)->update(['status' => 0]);

        \App\Nilai::create(['kelas_id' => $id1, 'mapel_id' => $id2, 'siswa_id' => $id3, 'nilai' => $request->nilai, 'status' => 1]);


        return redirect('guru/kelas/' . $id1 . '/mapel/' . $id2)->with('pesan', 'berhasil nilai siswa!');
    }
}
