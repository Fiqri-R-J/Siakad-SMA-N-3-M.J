@extends('layouts.app')

@section('content')
<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Tambah Kelas</h3>
        <hr>
        {{ Form::model($model, $form_options) }}
        <div class="form-group">
            {{ Form::label('nama_kelas', 'NAMA KELAS') }}
            {{ Form::text('nama_kelas',null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('nama_kelas') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('guru_id', 'WALI KELAS') }} <br>
            {{ Form::select('guru_id', \App\Guru::pluck('nama', 'id'),null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('jenkel') }}</span>
        </div>
        <div class="form-group">
            @php
            $tahunajaran = \App\Tahunajaran::where('status', 1)->first();
            @endphp
            {{ Form::label('tahunajaran_id', 'TAHUN AJARAN') }}
            {{ Form::text(null, $tahunajaran->tahun . ' | ' . $tahunajaran->semester, ['class' => 'form-control','disabled']) }}
            {{ Form::hidden('tahunajaran_id', $tahunajaran->id) }}
            <span class="text-danger">{{ $errors->first('jenkel') }}</span>
        </div>
        <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
        {!! Form::close() !!}
    </div>
</div>

@endsection