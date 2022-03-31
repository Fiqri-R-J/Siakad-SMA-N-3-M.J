@extends('layouts.app')
@section('content')

<div class="panel panel-headline" style="border: 1px solid lightgray">
    <div class="panel-body">
        <h3>Jadwal Pelajaran</h3>
        <hr>
        @if(empty($kelas))
        <h3 align="center">Belum Memiliki Kelas</h3>
        @else
        <h3>Kelas</h3>
        <table>
            <tbody>
                <tr>
                    <td>Kelas</td>
                    <td>&emsp;: {{ $kelas->nama_kelas }}</td>
                </tr>
                <tr>
                    <td>Wali Kelas</td>
                    <td>&emsp;: {{ $kelas->guru->nama }}</td>
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
        <table class="table table-striped table-bordered" id="tabel-2">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Mapel</th>
                    <th>Hari</th>
                    <th>Jam</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwal as $item)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td>{{ $item->mapel->nama_pelajaran }}</td>
                    <td>{{ $item->hari }}</td>
                    <td>{{ $item->jam }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
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