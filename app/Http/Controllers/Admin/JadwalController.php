<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalController extends Controller
{
    public function index()
    {
        $tahunajaran = \App\Tahunajaran::where('status', 1)->first();
        if ($tahunajaran) {
            $data['kelas'] = $tahunajaran->kelas;
        } else {
            $data['kelas'] = [];
        }

        return view('admin.jadwal.index', $data);
    }

    public function detail($id)
    {
        $data['kelas'] = \App\Kelas::findOrFail($id);
        $data['jadwal'] = \App\Jadwal::where('kelas_id', $id)->get();
        return view('admin.jadwal.detail', $data);
    }

    public function tambah($id)
    {
        $data['model'] = new \App\Jadwal();
        $data['form_options'] = [
            'action' => ['Admin\JadwalController@simpan', $id],
            'method' => 'POST',
        ];
        $data['btn_submit'] = 'Simpan';

        return view('admin.jadwal.form', $data);
    }

    public function simpan(Request $request, $id)
    {
        $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'jam' => 'required',
            'hari' => 'required',
        ]);

        $data = $request->all();
        $data['kelas_id'] = $id;

        \App\Jadwal::create($data);

        return redirect('admin/jadwal/' . $id)->with(['type' => 'success','pesan' => 'berhasil menambah data!']);
    }

    public function ubah($id1, $id2)
    {
        $data['model'] = \App\Jadwal::findOrFail($id2);
        $data['form_options'] = [
            'action' => ['Admin\JadwalController@update', $id1, $id2],
            'method' => 'PUT',
        ];
        $data['btn_submit'] = 'Ubah';

        return view('admin.jadwal.form', $data);
    }

    public function update(Request $request, $id1, $id2)
    {
        $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'jam' => 'required',
            'hari' => 'required',
        ]);

        \App\Jadwal::findOrFail($id2)->update($request->all());

        return redirect('admin/jadwal/' . $id1)->with(['type' => 'success','pesan' => 'berhasil mengubah data!']);
    }

    public function hapus($id1, $id2)
    {
        \App\Jadwal::findOrFail($id2)->delete();
        return redirect('admin/jadwal/' . $id1)->with(['type' => 'success','pesan' => 'berhasil menghapus data!']);
    }

    public function siswa($id)
    {
        $data['kelas'] = \App\Kelas::findOrFail($id);
        $data['siswa'] = $data['kelas']->siswa;
        $data['semua_siswa'] = \App\Siswa::all();

        return view('admin.jadwal.siswa.index', $data);
    }
    public function siswa_tambah($id1, $id2)
    {
        $count_kelassiswa = \App\KelasSiswa::where('kelas_id', $id1)->where('siswa_id', $id2)->count();
        if ($count_kelassiswa < 1) {
            \App\KelasSiswa::create(['kelas_id' => $id1, 'siswa_id' => $id2]);
        } else {
            return back()->with(['type' => 'danger','pesan' => 'siswa sudah ada!']);
        }

        return redirect('admin/jadwal/' . $id1 . '/siswa')->with(['type' => 'success','pesan' => 'berhasil menambah siswa']);
    }

    public function siswa_hapus($id1, $id2)
    {
        $count_kelassiswa = \App\KelasSiswa::where('kelas_id', $id1)->where('siswa_id', $id2)->delete();
        return redirect('admin/jadwal/' . $id1 . '/siswa')->with(['type' => 'success','pesan' => 'berhasil menghapus siswa']);
    }
}
