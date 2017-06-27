@extends('layouts.app')
@section('content')
  {!!Form::open(['url' => '/categories/', 'method' => 'POST', 'class' => 'inline-block']) !!}
    Nombre de la categoría:
    {{ Form::text('name','',['class'=>'form-control'])   }}

    Descripción de la categoría:
    {{ Form::textarea('description','',['class'=>'form-control'])   }}

    <input type="submit" class="btn btn-success" value="guardar">
  {!! Form::close() !!}
@endsection
