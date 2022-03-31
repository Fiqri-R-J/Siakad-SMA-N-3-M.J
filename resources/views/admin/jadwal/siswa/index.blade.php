@extends('layouts.app')

@section('content')

<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Daftar Siswa</h3>
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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
                Tambah
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Siswa</h5>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped table-bordered" id="tabel-1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NISN</th>
                                        <th>NAMA</th>
                                        <th>JENKEL</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semua_siswa as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nisn }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jenkel }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ url(request()->url() . '/' . $item->id .'/tambah') }}"
                                                role="button">Tambah</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-striped table-bordered" id="tabel-2">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>NISN</th>
                    <th>JENIS KELAMIN</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->jenkel }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" onclick="return confirm('Anda yakin ingin menghapus {{ $item->nama }}')"href="{{ url(request()->url() . '/' . $item->id .'/hapus') }}"
                            role="button">Hapus</a>
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
        $('#tabel-2').DataTable();
    });
</script>
@endsection