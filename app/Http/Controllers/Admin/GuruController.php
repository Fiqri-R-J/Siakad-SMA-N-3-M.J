<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $data['guru'] = \App\Guru::all();
        return view('admin.guru.index', $data);
    }

    public function tambah()
    {
        $data['model'] = new \App\Guru();
        $data['form_options'] = [
            'action' => 'Admin\GuruController@simpan',
            'method' => 'POST',
            'file' => true,
        ];
        $data['btn_submit'] = 'Tambah';

        return view('admin.guru.form', $data);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:gurus',
            'nama' => 'required',
            'alamat' => 'required',
            'tpt_lahir' => 'required',
            'jenkel' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        if ($request->profil) {
            $profil = $request->file('profil')->store('public/img');
        } else {
            $profil = '';
        }

        $user = \App\User::create(['email' => $request->email, 'password' => Hash::make($request->password), 'akses' => 1]);

        $data = $request->except(['email', 'password']);
        $data['user_id'] = $user->id;

        \App\Guru::create($data);

        return redirect('admin/guru')->with(['type' => 'success','pesan' => 'berhasil menambah data!']);
    }

    public function ubah($id)
    {
        $data['model'] = \App\Guru::findOrFail($id);
        $data['form_options'] = [
            'action' => ['Admin\GuruController@update', $id],
            'method' => 'PUT',
            'file' => true,
        ];
        $data['btn_submit'] = 'Ubah';

        return view('admin.guru.form', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required|unique:gurus,nip,' . $id,
            'nama' => 'required',
            'alamat' => 'required',
            'tpt_lahir' => 'required',
            'jenkel' => 'required',
        ]);

        $guru = \App\Guru::findOrFail($id);
        $user = \App\User::findOrFail($guru->user_id);

        $request->validate([
            'email' => 'unique:users,email,' . $guru->user_id,
        ]);

        $data_guru = $request->except(['email', 'password']);

        if ($request->profil) {
            $profil = $request->file('profil')->store('public/img');
            $data_guru['profil'] = $profil;
        }

        $guru->update($data_guru);

        if (is_null($request->password)) {
            $request->request->remove('password');
        }

        if (is_null($request->email)) {
            $request->request->remove('email');
        }

        $data_user = $request->only(['email', 'password']);

        $user->update($data_user);

        return redirect('admin/guru')->with(['type' => 'success','pesan' => 'berhasil mengubah data!']);
    }

    public function hapus($id)
    {

        $guru = \App\Guru::findOrFail($id);
        if($guru->kelas->count() > 0 || $guru->jadwal->count() > 0 || $guru->tugas->count() > 0){
            return redirect('admin/guru')->with(['type'=>'danger','pesan'=>'gagal menghapus guru, karena sedang aktif menjadi wali kelas 
            atau mengajar silahkan ganti terlebih dahulu pada menu kelas dan jadwal']);
        }


        $user_id = $guru->user_id;
        $user = \App\User::findOrFail($user_id);

        $guru->delete();
        $user->delete();

        return redirect('admin/guru')->with(['type' => 'success','pesan' => 'berhasil menghapus data!']);
    }
}
