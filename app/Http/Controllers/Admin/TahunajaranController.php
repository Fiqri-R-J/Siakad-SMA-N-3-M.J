<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TahunajaranController extends Controller
{
    public function index(Request $request)
    {
        $data['tahunajaran'] = \App\Tahunajaran::all();
        return view('admin.tahunajaran.index', $data);
    }

    public function tambah()
    {
        $data['model'] = new \App\Tahunajaran();
        $data['form_options'] = [
            'action' => 'Admin\TahunajaranController@simpan',
            'method' => 'POST',
        ];
        $data['btn_submit'] = 'Simpan';

        return view('admin.tahunajaran.form', $data);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'semester' => 'required',
        ]);

        $data = $request->all();
        $data['status'] = 0;

        \App\Tahunajaran::create($data);

        return redirect('admin/tahunajaran')->with(['type' => 'success','pesan' => 'berhasil menambah tahun ajaran!']);
    }

    public function ubah($id)
    {
        $data['model'] = \App\Tahunajaran::findOrFail($id);
        $data['form_options'] = [
            'action' => ['Admin\TahunajaranController@update', $id],
            'method' => 'PUT',
        ];
        $data['btn_submit'] = 'Ubah';

        return view('admin.tahunajaran.form', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required',
            'semester' => 'required',
        ]);

        \App\Tahunajaran::findOrFail($id)->update($request->all());

        return redirect('admin/tahunajaran')->with(['type' => 'success','pesan' => 'berhasil mengubah tahun ajaran!']);
    }

    public function hapus($id)
    {
        \App\Tahunajaran::findOrFail($id)->delete();
        return redirect('admin/tahunajaran')->with(['type' => 'success','pesan' => 'berhasil menghapus tahun ajaran!']);
    }

    public function status($id)
    {
        $tahunajaran = \App\Tahunajaran::findOrFail($id);

        if ($tahunajaran->status == 1) {
            $tahunajaran->update(['status' => 0]);
        } else {
            $count_tahunajaran = $tahunajaran->where('status', 1)->count();
            if ($count_tahunajaran > 0) {
                return back()->with(['type' => 'danger','pesan' => 'Hanya bisa mengaktifkan satu tahun ajaran !']);
            } else {
                $tahunajaran->update(['status' => 1]);
            }
        }

        return redirect('admin/tahunajaran')->with(['type' => 'success','pesan' => 'status berhasil dirubah']);
    }
}
