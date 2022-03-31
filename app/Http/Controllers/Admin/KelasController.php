<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $data['kelas'] = \App\Kelas::all();
        return view('admin.kelas.index', $data);
    }

    public function tambah()
    {
        $data['model'] = new \App\Kelas();
        $data['form_options'] = [
            'action' => 'Admin\KelasController@simpan',
            'method' => 'POST',
        ];
        $data['btn_submit'] = 'Simpan';

        return view('admin.kelas.form', $data);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'guru_id' => 'required',
            'tahunajaran_id' => 'required',
        ]);

        \App\Kelas::create($request->all());

        return redirect('admin/kelas')->with(['type' => 'success','pesan' => 'berhasil menambah data!']);
    }

    public function ubah($id)
    {
        $data['model'] = \App\Kelas::findOrFail($id);
        $data['form_options'] = [
            'action' => ['Admin\KelasController@update', $id],
            'method' => 'PUT',
        ];
        $data['btn_submit'] = 'Ubah';

        return view('admin.kelas.form', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'guru_id' => 'required',
            'tahunajaran_id' => 'required',
        ]);

        \App\Kelas::findOrFail($id)->update($request->all());

        return redirect('admin/kelas')->with(['type' => 'success','pesan' => 'berhasil mengubah data!']);
    }

    public function hapus($id)
    {
        \App\Kelas::findOrFail($id)->delete();
        return redirect('admin/kelas')->with(['type' => 'success','pesan' => 'berhasil menghapus data!']);
    }
}
