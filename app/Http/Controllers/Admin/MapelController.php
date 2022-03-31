<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $data['mapel'] = \App\Mapel::all();
        return view('admin.mapel.index', $data);
    }

    public function tambah()
    {
        $data['model'] = new \App\Mapel();
        $data['form_options'] = [
            'action' => 'Admin\MapelController@simpan',
            'method' => 'POST',
        ];
        $data['btn_submit'] = 'Simpan';

        return view('admin.mapel.form', $data);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama_pelajaran' => 'required|unique:mapels',
        ]);

        \App\Mapel::create($request->all());

        return redirect('admin/mapel')->with(['type' => 'success','pesan' => 'berhasil menambah data!']);
    }

    public function ubah($id)
    {
        $data['model'] = \App\Mapel::findOrFail($id);
        $data['form_options'] = [
            'action' => ['Admin\MapelController@update', $id],
            'method' => 'PUT',
        ];
        $data['btn_submit'] = 'Ubah';

        return view('admin.mapel.form', $data);
    }

    public function update(Request $request, $id)
    {
        
        

        return redirect('admin/mapel')->with(['type' => 'success','pesan' => 'berhasil mengubah data!']);
    }

    public function hapus($id)
    {
        \App\Mapel::findOrFail($id)->delete();
        return redirect('admin/mapel')->with(['type' => 'success','pesan' => 'berhasil menghapus data!']);
    }
}
