@extends('layouts.app')

@section('content')
<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Tambah Tugas</h3>
        <hr>
        {{ Form::model($model, $form_options) }}
        <div class="form-group">
            {{ Form::label('tugas', 'TUGAS') }}
            {{ Form::text('tugas',null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('tugas') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('kelas', 'KELAS') }}
            <select class="form-control" name="kelas">
                @foreach ($kelas as $item)
                <option value="{{ $item['kelas_id'] .'|'. $item['mapel_id'] }}">
                    {{ $item['nama_kelas'] . ' | ' . $item['nama_pelajaran'] }}</option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('kelas') }}</span>
        </div>
        <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
        {!! Form::close() !!}
    </div>
</div>

@endsection