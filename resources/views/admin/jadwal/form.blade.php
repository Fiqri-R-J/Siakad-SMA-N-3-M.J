@extends('layouts.app')

@section('content')
<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Tambah Jadwal</h3>
        <hr>
        {{ Form::model($model, $form_options) }}
        <div class="form-group">
            {{ Form::label('guru_id', 'GURU') }} <br>
            {{ Form::select('guru_id', \App\Guru::pluck('nama', 'id'),null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('jenkel') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('mapel_id', 'MAPEL') }} <br>
            {{ Form::select('mapel_id', \App\Mapel::pluck('nama_pelajaran', 'id'),null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('mapel_id') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('jam', 'JAM') }}
            {{ Form::text('jam',null,['class' => 'form-control', 'placeholder' => '24:00 - 24:00']) }}
            <span class="text-danger">{{ $errors->first('jam') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('hari', 'HARI') }}
            {{ Form::select('hari', ['Senin' => 'Senin', 'Selasa' => 'Selasa','Rabu' => 'Rabu','Kamis' =>
            'Kamis','Jumat' => 'Jumat','Sabtu' => 'Sabtu'], null, ['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('hari') }}</span>
        </div>
        <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
        {!! Form::close() !!}
    </div>
</div>

@endsection