@extends('layouts.app')

@section('content')
    <div class="container col-3">    
            <div class="card">
                <div class="card-header">
                        {{$cliente->nombre}}
                </div>
                <div class="card-body">
                    <h5>{{$cliente->ejecutivo}}</h5>
                    <p class="card-text">{{$cliente->modalidad}}</p>
                <a href="{{route('radios.cliente.show',$cliente->id)}}" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>
@endsection