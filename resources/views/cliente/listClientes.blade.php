@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-7">
    <h2 class="display-2">Clientes</h2>  
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Ejecutivo</th>
                <th scope="col">Modalidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td scope="row" > <a href="{{route('radios.cliente.show',$cliente->id)}}">{{$cliente->id}}</a></td>
                <td scope="row" >{{$cliente->nombre}}</td>
                <td scope="row" >{{$cliente->ejecutivo}}</td>
                <td scope="row" >{{$cliente->modalidad}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
