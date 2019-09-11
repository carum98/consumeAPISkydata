@extends('layouts.app')

@section('content')

    <div class="col-5">
        <div class="row">
            <h2 class="display-2">{{$cliente->nombre}}</h2>  
        <a href="{{route('edit.cliente.form', $cliente->id)}}">Editar</a>
        </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Imei</th>
                    <th scope="col">Modelo</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($radios as $radio)
                <tr>
                <td scope="row" > <a href="{{route('radio.show',$radio->id)}}">{{$radio->id}}</a></td>
                    <td scope="row" >{{$radio->nombre}}</td>
                    <td scope="row" >{{$radio->imei}}</td>
                    <td scope="row" >{{$radio->modelo}}</td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>    
@endsection