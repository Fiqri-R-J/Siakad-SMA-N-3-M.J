@extends('layouts.app')

@section('content')

<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Data Nilai Siswa</h3>
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
                <tr>
                    <td>Mata Pelajaran</td>
                    <td>&emsp;: {{ $mapel->nama_pelajaran }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-bordered" id="tabel-1">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>SISWA</th>
                    <th>NILAI AKHIR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>
                        @php
                        $nilai = \App\Nilai::where('kelas_id', $kelas_id)->where('mapel_id',
                        $mapel_id)->where('siswa_id', $item->id);
                        @endphp
                        @if($nilai->count() > 0)
                        {{$nilai->first()->nilai}}
                        @else
                        Tidak Ada Nilai
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