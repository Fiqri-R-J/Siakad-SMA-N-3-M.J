@extends('layouts.app')

@section('content')

<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Data Jadwal</h3>
        <hr>
        <table class="table table-striped table-bordered" id="tabel-1">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>KELAS</th>
                    <th>WALI KELAS</th>
                    <th>TAHUN AJARAN</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kelas }}</td>
                    <td>{{ $item->guru->nama }}</td>
                    <td>{{ $item->tahunajaran->tahun }} | {{ $item->tahunajaran->semester }} |
                        @if($item->tahunajaran->status == 1)
                        <span class="label label-success">Aktif</span>
                        @else
                        <span class="label label-danger">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ url('admin/jadwal/'. $item->id) }}" role="button">Daftar
                            Jadwal : {{ $item->jadwal->count() }}</a>
                        <a class="btn btn-info btn-sm" href="{{ url('admin/jadwal/'. $item->id .'/siswa') }}"
                            role="button">Daftar
                            Siswa : {{ $item->siswa->count() }}</a>
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