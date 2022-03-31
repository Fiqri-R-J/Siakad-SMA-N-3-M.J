<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TugasController extends Controller
{
    public function index()
    {
        $user = auth()->user()->user;
        $data['tugas'] = $user->tugas;

        return view('guru.tugas.index', $data);
    }

    public function tambah()
    {
        $data['model'] = new \App\Tugas();
        $data['form_options'] = [
            'action' => 'Guru\TugasController@simpan',
            'method' => 'POST',
        ];
        $data['btn_submit'] = 'Simpan';

        $user = auth()->user()->user;

        $data['kelas'] = \App\Kelas::whereHas('jadwal', function ($query) {
            $query->where('guru_id', auth()->user()->user->id);
        })->with(['jadwal' => function ($query) {
            $query->where('guru_id', auth()->user()->user->id);
        }])->get();

        foreach ($data['kelas'] as $item) {
            foreach ($item->jadwal as $item2) {
                $kelas[] = [
                    'kelas_id' => $item->id,
                    'mapel_id' => $item2->mapel_id,
                    'nama_kelas' => $item->nama_kelas,
                    'nama_pelajaran' => $item2->mapel->nama_pelajaran,
                ];
            }
        }
        $data['kelas'] = $kelas;


        return view('guru.tugas.form', $data);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'tugas' => 'required',
            'kelas' => 'required'
        ]);

        $kelas = explode('|', $request->kelas);

        $kelas_id = $kelas[0];
        $mapel_id = $kelas[1];

        $guru_id = auth()->user()->user->id;

        $data = [
            'kelas_id' => $kelas[0],
            'mapel_id' => $kelas[1],
            'guru_id' => $guru_id,
            'tugas' => $request->tugas,
        ];

        \App\Tugas::create($data);
        return redirect('guru/tugas')->with(['type' => 'success','pesan' => 'berhasil menambah tugas!']);
    }

    public function hapus($id)
    {
        \App\Tugas::findOrFail($id)->delete();
        return redirect('guru/tugas')->with(['type' => 'success','pesan' => 'berhasil menghapus tugas!']);
    }

    public function ubah($id)
    {
        $data['model'] = \App\Tugas::findOrFail($id);
        $data['form_options'] = [
            'action' => ['Guru\TugasController@update', $id],
            'method' => 'PUT',
        ];
        $data['btn_submit'] = 'Simpan';

        $data['kelas'] = \App\Kelas::whereHas('jadwal', function ($query) {
            $query->where('guru_id', auth()->user()->user->id);
        })->with(['jadwal' => function ($query) {
            $query->where('guru_id', auth()->user()->user->id);
        }])->get();

        foreach ($data['kelas'] as $item) {
            foreach ($item->jadwal as $item2) {
                $kelas[] = [
                    'kelas_id' => $item->id,
                    'mapel_id' => $item2->mapel_id,
                    'nama_kelas' => $item->nama_kelas,
                    'nama_pelajaran' => $item2->mapel->nama_pelajaran,
                ];
            }
        }
        $data['kelas'] = $kelas;

        return view('guru.tugas.form', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tugas' => 'required',
            'kelas' => 'required'
        ]);

        $kelas = explode('|', $request->kelas);

        $kelas_id = $kelas[0];
        $mapel_id = $kelas[1];

        $guru_id = auth()->user()->user->id;

        $data = [
            'kelas_id' => $kelas[0],
            'mapel_id' => $kelas[1],
            'guru_id' => $guru_id,
            'tugas' => $request->tugas,
        ];

        \App\Tugas::findOrFail($id)->update($data);
        return redirect('guru/tugas')->with(['type' => 'success','pesan' => 'berhasil mengubah tugas!']);
    }
}
