@extends('layouts.app')

@section('content')

<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Data Tahun Ajaran</h3>
        <hr>
        <div>
            <a name="" id="" class="btn btn-primary" href="{{ url('admin/tahunajaran/tambah') }}"
                role="button">Tambah</a>
        </div>
        <br>
        <table class="table table-striped table-bordered" id="tabel-1">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>TAHUN</th>
                    <th>SEMESTER</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tahunajaran as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>{{ $item->semester }}</td>
                    <td>
                        @if($item->status == 1)
                        <span class="label label-success">Aktif</span>
                        @else
                        <span class="label label-danger">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus tahun {{ $item->tahun }}')" href="{{ url('admin/tahunajaran/'. $item->id .'/hapus') }}"
                            role="button">Hapus</a>
                        <a class="btn btn-info btn-sm" href="{{ url('admin/tahunajaran/'. $item->id .'/ubah') }}"
                            role="button">Ubah</a>
                        @if($item->status == 0)
                        <a class="btn btn-success btn-sm" href="{{ url('admin/tahunajaran/'. $item->id .'/status') }}"
                            role="button">Aktifkan</a>
                        @else
                        <a class="btn btn-danger btn-sm" href="{{ url('admin/tahunajaran/'. $item->id .'/status') }}"
                            role="button">Nonaktifkan</a>
                        @endif
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