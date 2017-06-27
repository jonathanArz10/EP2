@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <center>Bienvenido, sitio web para pedir pizzas y más 7u7</center>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::user()->admin())
        <center>
            <label>Elija una opción: </label><br>
            <a href="{{url('/categories')}}" class="btn btn-raised btn-default">Categorías</a>
            <a href="{{url('/products')}}" class="btn btn-raised btn-default">Productos</a>
            <a href="{{url('/orders')}}" class="btn btn-raised btn-default">Ordenes</a>
        </center>
    @else
        <center>
            <label>Elija una opción: </label><br>
            <a href="{{url('/products')}}" class="btn btn-raised btn-default">Productos</a>
        </center>
    @endif
</div>

@endsection
