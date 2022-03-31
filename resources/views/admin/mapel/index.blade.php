@extends('layouts.app')

@section('content')

<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Data Mata Pelajaran</h3>
        <hr>
        <div>
            <a name="" id="" class="btn btn-primary" href="{{ url('admin/mapel/tambah') }}" role="button">Tambah</a>
        </div>
        <br>
        <table class="table table-striped table-bordered" id="tabel-1">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>MATA PELAJARAN</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mapel as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_pelajaran }}</td>
                    <td>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus {{ $item->nama_pelajaran }}')" href="{{ url('admin/mapel/'. $item->id .'/hapus') }}"
                            role="button">Hapus</a>
                        <a class="btn btn-info btn-sm" href="{{ url('admin/mapel/'. $item->id .'/ubah') }}"
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