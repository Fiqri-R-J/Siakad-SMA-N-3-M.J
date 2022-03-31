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
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-bordered" id="tabel-1">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>SISWA</th>
                    <th>HISTORI NILAI</th>
                    <th>NILAI AKHIR</th>
                    <th>AKSI</th>
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
                        $mapel_id)->where('siswa_id', $item->id)->where('status' , 0);
                        @endphp
                        @if($nilai->count() > 0)
                        {{$nilai->first()->nilai}}
                        @else
                        Tidak Ada Nilai
                        @endif
                    </td>
                    <td>
                        @php
                        $nilai = \App\Nilai::where('kelas_id', $kelas_id)->where('mapel_id',
                        $mapel_id)->where('siswa_id', $item->id)->where('status' , 1);
                        @endphp
                        @if($nilai->count() > 0)
                        {{$nilai->first()->nilai}}
                        @else
                        Tidak Ada Nilai
                        @endif
                    </td>
                    <td width="200px">
                        <form class="form-inline" method="POST"
                            action="{{ request()->url() . '/siswa/' . $item->id . '/nilai' }}">
                            @csrf
                            <div class="input-group">
                                <input class="form-control" name="nilai" type="text" style="width: 50px"
                                    placeholder="100">
                                <span class="input-group-btn"><button type="submit" class="btn btn-primary"
                                        type="button">Nilai</button></span>
                            </div>
                        </form>
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