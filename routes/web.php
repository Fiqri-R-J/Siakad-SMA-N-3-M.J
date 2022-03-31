<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auths.login');
})->name('login')->middleware('guest');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::prefix('admin')->middleware('auth', 'role:admin')->group(function () {
    Route::get('beranda', 'Admin\BerandaController@index');

    Route::get('siswa', 'Admin\SiswaController@index');
    Route::get('siswa/tambah', 'Admin\SiswaController@tambah');
    Route::post('siswa/simpan', 'Admin\SiswaController@simpan');
    Route::get('siswa/{id}/ubah', 'Admin\SiswaController@ubah');
    Route::put('siswa/{id}/update', 'Admin\SiswaController@update');
    Route::get('siswa/{id}/hapus', 'Admin\SiswaController@hapus');

    Route::get('guru', 'Admin\GuruController@index');
    Route::get('guru/tambah', 'Admin\GuruController@tambah');
    Route::post('guru/simpan', 'Admin\GuruController@simpan');
    Route::get('guru/{id}/ubah', 'Admin\GuruController@ubah');
    Route::put('guru/{id}/update', 'Admin\GuruController@update');
    Route::get('guru/{id}/hapus', 'Admin\GuruController@hapus');

    Route::get('kelas', 'Admin\KelasController@index');
    Route::get('kelas/tambah', 'Admin\KelasController@tambah');
    Route::post('kelas/simpan', 'Admin\KelasController@simpan');
    Route::get('kelas/{id}/ubah', 'Admin\KelasController@ubah');
    Route::put('kelas/{id}/update', 'Admin\KelasController@update');
    Route::get('kelas/{id}/hapus', 'Admin\KelasController@hapus');

    Route::get('tahunajaran', 'Admin\TahunajaranController@index');
    Route::get('tahunajaran/tambah', 'Admin\TahunajaranController@tambah');
    Route::post('tahunajaran/simpan', 'Admin\TahunajaranController@simpan');
    Route::get('tahunajaran/{id}/ubah', 'Admin\TahunajaranController@ubah');
    Route::put('tahunajaran/{id}/update', 'Admin\TahunajaranController@update');
    Route::get('tahunajaran/{id}/hapus', 'Admin\TahunajaranController@hapus');
    Route::get('tahunajaran/{id}/status', 'Admin\TahunajaranController@status');

    Route::get('mapel', 'Admin\MapelController@index');
    Route::get('mapel/tambah', 'Admin\MapelController@tambah');
    Route::post('mapel/simpan', 'Admin\MapelController@simpan');
    Route::get('mapel/{id}/ubah', 'Admin\MapelController@ubah');
    Route::put('mapel/{id}/update', 'Admin\MapelController@update');
    Route::get('mapel/{id}/hapus', 'Admin\MapelController@hapus');
    Route::get('mapel/{id}/status', 'Admin\MapelController@status');

    Route::get('jadwal', 'Admin\JadwalController@index');
    Route::get('jadwal/{id}', 'Admin\JadwalController@detail');
    Route::get('jadwal/{id}/tambah', 'Admin\JadwalController@tambah');
    Route::post('jadwal/{id}/simpan', 'Admin\JadwalController@simpan');
    Route::get('jadwal/{id1}/ubah/{id2}', 'Admin\JadwalController@ubah');
    Route::put('jadwal/{id1}/update/{id2}', 'Admin\JadwalController@update');
    Route::get('jadwal/{id1}/hapus/{id2}', 'Admin\JadwalController@hapus');
    Route::get('jadwal/{id}/siswa', 'Admin\JadwalController@siswa');
    Route::get('jadwal/{id1}/siswa/{id2}/tambah', 'Admin\JadwalController@siswa_tambah');
    Route::get('jadwal/{id1}/siswa/{id2}/hapus', 'Admin\JadwalController@siswa_hapus');
});
Route::prefix('guru')->middleware('auth', 'role:guru')->group(function () {
    Route::get('beranda', 'Guru\BerandaController@index');

    Route::get('kelas', 'Guru\KelasController@index');
    Route::get('kelas/{id1}/mapel/{id2}', 'Guru\KelasController@detail');
    Route::post('kelas/{id1}/mapel/{id2}/siswa/{id3}/nilai', 'Guru\KelasController@nilai');


    Route::get('tugas', 'Guru\TugasController@index');
    Route::get('tugas/tambah', 'Guru\TugasController@tambah');
    Route::post('tugas/simpan', 'Guru\TugasController@simpan');
    Route::get('tugas/{id}/ubah', 'Guru\TugasController@ubah');
    Route::put('tugas/{id}/update', 'Guru\TugasController@update');
    Route::get('tugas/{id}/hapus', 'Guru\TugasController@hapus');
    
    Route::get('beranda', 'Guru\BerandaController@index');
    Route::get('kelas', 'Guru\KelasController@index');
    Route::get('kelas/{id1}', 'Guru\KelasController@detail_walikelas');
    Route::get('kelas/{id1}/nilai/{id2}', 'Guru\KelasController@mapel_nilai');
    Route::get('kelas/{id1}/mapel/{id2}', 'Guru\KelasController@detail');
    Route::post('kelas/{id1}/mapel/{id2}/siswa/{id3}/nilai', 'Guru\KelasController@nilai');

    // Route::get('materi/index', 'MateriController@index');
    // Route::get('materi/tambah', 'MateriController@tambah');
    // Route::post('materi/simpan', 'MateriController@simpan');
    // Route::get('materi/hapus/{id}', 'MateriController@hapus');
    // Route::get('materi/edit/{id}', 'MateriController@edit');
    // Route::put('materi/update/{id}', 'MateriController@update');
    // Route::put('materi/detail/{id}', 'MateriController@detail');
});
Route::prefix('siswa')->middleware('auth', 'role:siswa')->group(function () {
    Route::get('beranda', 'Siswa\BerandaController@index');
    Route::get('nilai', 'Siswa\NilaiController@index');
    Route::get('jadwal', 'Siswa\JadwalController@index');
});
