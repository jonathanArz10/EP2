@extends('layouts.app')
@section('content')
  {!!Form::open(['url' => '/products/', 'method' => 'POST', 'class' => 'inline-block', 'files' => true]) !!}
    Imagen del producto:
    {!! Form::file('image') !!}

    Nombre del producto:
    {{ Form::text('name','',['class'=>'form-control'])   }}

    descripción del producto:
    {{ Form::textarea('description','',['class'=>'form-control'])   }}

    Precio del producto:
    {{ Form::text('price','',['class'=>'form-control'])   }}

    Categoría del producto:
    {{ Form::select('category_id',$categories,['class'=>'form-control'])   }}
    <input type="submit" class="btn btn-success" value="guardar">
  {!! Form::close() !!}


@endsection
