<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $data['siswa'] = \App\Siswa::all();
        return view('admin.siswa.index', $data);
    }

    public function tambah()
    {
        $data['model'] = new \App\Siswa();
        $data['form_options'] = [
            'action' => 'Admin\SiswaController@simpan',
            'method' => 'POST',
            'files' => true,
        ];
        $data['btn_submit'] = 'Simpan';

        return view('admin.siswa.form', $data);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:siswas',
            'nama' => 'required',
            'alamat' => 'required',
            'tpt_lahir' => 'required',
            'jenkel' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        if($request->profil){
            $profil = $request->file('profil')->store('public/img');
        }else{
            $profil = '';
        }

        $user = \App\User::create(['email' => $request->email, 'password' => Hash::make($request->password), 'akses' => 2]);

        $data = $request->except(['email', 'password']);
        $data['user_id'] = $user->id;
        $data['profil'] = $profil;


        \App\Siswa::create($data);

        return redirect('admin/siswa')->with(['type' => 'success','pesan' => 'berhasil menambah data!']);
    }

    public function ubah($id)
    {
        $data['model'] = \App\Siswa::findOrFail($id);
        $data['form_options'] = [
            'action' => ['Admin\SiswaController@update', $id],
            'method' => 'PUT',
            'files' => true,
        ];
        $data['btn_submit'] = 'Ubah';

        return view('admin.siswa.form', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required|unique:siswas,nisn,' . $id,
            'nama' => 'required',
            'alamat' => 'required',
            'tpt_lahir' => 'required',
            'jenkel' => 'required',
        ]);

        $siswa = \App\Siswa::findOrFail($id);
        $user = \App\User::findOrFail($siswa->user_id);

        $request->validate([
            'email' => 'unique:users,email,' . $siswa->user_id,
        ]);
        $data_siswa = $request->except(['email', 'password']);

        if($request->profil){
            $profil = $request->file('profil')->store('public/img');
            $data_siswa['profil'] = $profil;
        }
        
        $siswa->update($data_siswa);

        if (is_null($request->password)) {
            $request->request->remove('password');
        }

        if (is_null($request->email)) {
            $request->request->remove('email');
        }

        $data_user = $request->only(['email', 'password']);

        \App\User::findOrFail($siswa->user_id)->update($data_user);

        return redirect('admin/siswa')->with(['type' => 'success','pesan' => 'berhasil mengubah data!']);
    }

    public function hapus($id)
    {
        $siswa = \App\Siswa::findOrFail($id);
        $user_id = $siswa->user_id;
        $user = \App\User::findOrFail($user_id);

        $siswa->delete();
        $user->delete();

        return redirect('admin/siswa')->with(['type' => 'success', 'pesan' => 'data berhasil di hapus']);
    }
}
