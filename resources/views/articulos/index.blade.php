@extends('layouts.app')
 
@section('content')
<br/>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div style="text-align:center">
                <h2>Visualizar todos los articulos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('articulos.create') }}"> Crear nuevo Articulo</a>
                <input  type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br/>
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($articulos as $articulo)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $articulo->descripcion }}</td>
            <td>{{ $articulo->precio }}</td>
            <td>{{ $articulo->stock }}</td>
            <td>
                <form action="{{ route('articulos.destroy',$articulo->id) }}" method="POST">
   
                    <a class="btn btn-primary" href="{{ route('articulos.edit',$articulo->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $articulos->links() !!}
      
@endsection
