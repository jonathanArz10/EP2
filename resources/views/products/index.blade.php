@extends('layouts.app')
@section('content')
@if(Auth::user()->admin())
  @foreach($products as $product)
  <div class="col-md-4">
    <img style="height:150px;" class="col-xs-12" src="/images/products/{{$product->image}}"
    alt="img-responsive" />
    <h3>{{$product->name}}</h3>
    <h3>{{$product->price}}</h3>
    <p>{{$product->description}}</p>

      <input type="hidden" name="product_id" value="{{$product->id}}">
      <input type="hidden" name="product_name" value="{{$product->name}}">
      <input type="hidden" name="product_price" value="{{$product->price}}">
      <input type="hidden" name="product_description" value="{{$product->description}}">
      <a class="col-xs-12 btn btn-success" href="{{url('/products/'.$product->id.'/edit')}}">Editar</a>
      <a onclick ="eliminarProducto({{$product->id}})"class="col-xs-12 btn btn-danger">Eliminar</a>


  </div>
  @endforeach
@else
<div class="container">
  <center>
    <div class="col-xs-12">
      @foreach($shopping_cart as $product)
        {{$product->name}} ${{$product->price}}
      @endforeach
    </div>
    <div class="col-xs-12">
      @if($productsSize>0)
      número de productos: {{$productsSize}}
      total a pagar: ${{$total}}
      <br>
      <div class="col-xs-3"></div>
      {!!Form::open(['url' => '/orders', 'method' => 'POST', 'class' => 'inline-block']) !!}
      <input type="submit" class="col-xs-3 btn btn-success" name="" value="Pagar">
      {!! Form::close() !!}
      {!!Form::open(['url' => '/shopping_carts/1', 'method' => 'DELETE', 'class' => 'inline-block']) !!}
        <input type="submit" class="col-xs-3 btn btn-danger" name="" value="Cancelar">
      {!! Form::close() !!}
      @endif
    </div>
  </center><br>
  @foreach($products as $product)
    <div class="col-md-4">
      <img style="height:150px;" class="col-xs-12" src="/images/products/{{$product->image}}"
  alt="img-responsive" />
      <h3>{{$product->name}}</h3>
      <h3>{{$product->price}}</h3>
      <p>{{$product->description}}</p>

      {!!Form::open(['url' => '/shopping_carts/', 'method' => 'POST', 'class' => 'inline-block']) !!}
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <input type="hidden" name="product_name" value="{{$product->name}}">
        <input type="hidden" name="product_price" value="{{$product->price}}">
        <input type="hidden" name="product_description" value="{{$product->description}}">
        <label>cantidad:</label>
        <input type="number" class="col-xs-12" name="qty" >
        <input type="submit" class="col-xs-12 btn btn-success" name="" value="Agregar al carrito">
      {!! Form::close() !!}
    </div>
  @endforeach
@endif


    <div class="col-xs-12">
      {{ $products->links() }}
    </div>
  </div>
@endsection
