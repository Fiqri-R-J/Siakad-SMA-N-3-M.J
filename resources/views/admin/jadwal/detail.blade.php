@extends('layouts.app')

@section('content')

<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Data Jadwal</h3>
        <hr>
        <table>
            <tbody>
                <tr>
                    <td>Kelas</td>
                    <td>&emsp;: {{ $kelas->nama_kelas }}</td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td>&emsp;: {{ $kelas->tahunajaran->tahun }}</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>&emsp;: {{ $kelas->tahunajaran->semester }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <div>
            <a name="" id="" class="btn btn-primary" href="{{ url( request()->url() . '/tambah') }}"
                role="button">Tambah</a>
        </div>
        <br>
        <table class="table table-striped table-bordered" id="tabel-1">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>MAPEL</th>
                    <th>GURU</th>
                    <th>HARI</th>
                    <th>JAM</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->mapel->nama_pelajaran }}</td>
                    <td>{{ $item->guru->nama }}</td>
                    <td>{{ $item->hari }}</td>
                    <td>{{ $item->jam }}</td>
                    <td>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus {{ $item->mapel->nama_pelajaran }}')" href="{{ url( request()->url() .'/hapus/' . $item->id) }}"
                            role="button">Hapus</a>
                        <a class="btn btn-info btn-sm" href="{{ url( request()->url() .'/ubah/' . $item->id) }}"
                            role="button">Ubah</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>


@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#tabel-1').DataTable();
    });
</script>
@endsection