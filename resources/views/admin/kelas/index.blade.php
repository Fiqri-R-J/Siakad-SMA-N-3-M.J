@extends('layouts.app')

@section('content')

<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Data Kelas</h3>
        <hr>
        <div>
            <a name="" id="" class="btn btn-primary" href="{{ url('admin/kelas/tambah') }}" role="button">Tambah</a>
        </div>
        <br>
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
                    <td>@if($item->tahunajaran->status == 1)
                        <span class="label label-success">Aktif</span>
                        @else
                        <span class="label label-danger">Nonaktif</span>
                        @endif
                        | {{ $item->tahunajaran->tahun }} | {{ $item->tahunajaran->semester }}
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus {{ $item->nama_kelas }}')" href="{{ url('admin/kelas/'. $item->id .'/hapus') }}"
                            role="button">Hapus</a>
                        <a class="btn btn-info btn-sm" href="{{ url('admin/kelas/'. $item->id .'/ubah') }}"
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