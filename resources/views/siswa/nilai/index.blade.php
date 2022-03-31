@extends('layouts.app')
@section('content')
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Nilai</h3>
        <hr>
        @if($kelas->count() < 1)
                <h3 align="center">Belum Memiliki Kelas</h3>
                @else
        @foreach($kelas as $item)
        <div class="panel panel-headline" style="border: 1px solid lightgray">
            <div class="panel-body">
                <h3>{{ $item->nama_kelas }}</h3>
                <table>
                    <tbody>
                        <tr>
                            <td>Kelas</td>
                            <td>&emsp;: {{ $item->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <td>Wali Kelas</td>
                            <td>&emsp;: {{ $item->guru->nama }}</td>
                        </tr>
                        <tr>
                            <td>Tahun Ajaran</td>
                            <td>&emsp;: {{ $item->tahunajaran->tahun }}</td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td>&emsp;: {{ $item->tahunajaran->semester }}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table class="table table-striped table-bordered" id="tabel-1">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>MATA PELAJARAN</th>
                            <th>NILAI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item->jadwal->unique('mapel_id') as $item2)
                        <tr>
                            <td width="75px">{{ $loop->iteration }}</td>
                            <td>{{ $item2->mapel->nama_pelajaran }}</td>
                            <td width="150px">
                                @php
                                $nilai = \App\Nilai::where('kelas_id', $item->id)->where('mapel_id',
                                $item2->mapel_id)->where('siswa_id', auth()->user()->user->id);
                                @endphp
                                @if($nilai->count() > 0)
                                {{ $nilai->first()->nilai }}
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
        @endforeach
        @endif
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