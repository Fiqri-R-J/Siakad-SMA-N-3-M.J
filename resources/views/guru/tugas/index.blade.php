@extends('layouts.app')
@section('content')

<div class="panel panel-headline" style="border: 1px solid lightgray">
    <div class="panel-body">
        <h3>Tugas</h3>
        <hr>
        <div>
            <a class="btn btn-primary" href="{{ url('guru/tugas/tambah') }}" role="button">Tambah</a>
        </div>
        <br>
        <table class="table table-striped table-bordered" id="tabel-2">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>WAKTU</th>
                    <th>KELAS</th>
                    <th>MAPEL</th>
                    <th>KETERANGAN</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tugas as $item)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td>{{ $item->created_at->format('d M y | H:i') }}</td>
                    <td>{{ $item->kelas->nama_kelas }}</td>
                    <td>{{ $item->mapel->nama_pelajaran }}</td>
                    <td>{{ $item->tugas }}</td>
                    <td>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus keterangan {{ $item->tugas }}')" href="{{ url('guru/tugas/'. $item->id .'/hapus') }}" href="{{ url('guru/tugas/'. $item->id .'/hapus') }}"
                            role="button">Hapus</a>
                        <a class="btn btn-info btn-sm" href="{{ url('guru/tugas/'. $item->id .'/ubah') }}"
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