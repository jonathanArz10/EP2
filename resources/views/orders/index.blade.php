@extends('layouts.app')
@section('content')
  <center><h2>Lista de pedidos</h2></center>
  @foreach($orders as $order)
    <div class="col-md-4">
      <center>
        <h3>Número de la orden: {{$order->id}}</h3>
        <!-- <h3>{{$order->user_id}}</h3> -->
        @if(!strcmp($order->status,"Pagado"))
          <h3>Estado: Pendiente</h3>
        @else
          <h3>Estado: {{$order->status}}</h3>
        @endif
      </center>
    </div>
    @endforeach
    <br>
      <div class="col-xs-12">
        {{ $orders->links() }}
      </div>
    </div>
@endsection
