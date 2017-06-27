@extends('layouts.app')
@section('content')

    @foreach($categories as $category)

      <div class="col-md-4">
        <center><h3>{{$category->name}}</h3>
        <p>{{$category->description}}</p></center>

        <input type="hidden" name="category_id" value="{{$category->id}}">
        <input type="hidden" name="category_name" value="{{$category->name}}">
        <input type="hidden" name="category_description" value="{{$category->description}}">
        <a class="col-xs-12 btn btn-success" href="{{url('/categories/'.$category->id.'/edit')}}">Editar</a>
        <a onclick ="eliminarCategoria({{$category->id}})"class="col-xs-12 btn btn-danger">Eliminar</a>

      </div>
    @endforeach

    <div class="col-xs-12">
      {{ $categories->links() }}
    </div>
  </div>
@endsection
