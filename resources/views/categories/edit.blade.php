@extends('layouts.app')
@section('content')
  {!!Form::open(['url' => '/categories/'.$category->id, 'method' => 'PATCH', 'class' => 'inline-block', 'files' => true]) !!}
    Imagen del producto:
    {!! Form::file('image') !!}
    Nombre de la categoría:
    {{ Form::text('name',$category->name,['class'=>'form-control'])   }}

    Descripción de la categoría:
    {{ Form::textarea('description',$category->description,['class'=>'form-control'])   }}
    
    <input type="submit" class="btn btn-success" value="guardar">
  {!! Form::close() !!}


@endsection
