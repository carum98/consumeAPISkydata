@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-7">
        <h2 class="display-2">Radios</h2>
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
</div>
    
@endsection