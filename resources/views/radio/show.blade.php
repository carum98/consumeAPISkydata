@extends('layouts.app')

@section('content')
    <div class="container col-3">    
        <div class="card">
            <div class="card-header">
                {{$radio->nombre}}
            </div>
            <div class="card-body">
                <h5>{{$radio->imei}}</h5>
                <p class="card-text">{{$radio->modelo}}</p>
            <a href="{{route('edit.radio.form', $radio->id)}}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </div>
@endsection