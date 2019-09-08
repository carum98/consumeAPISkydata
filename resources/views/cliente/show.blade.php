@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>{{$cliente->nombre}}</h1>
    <h2>{{$cliente->ejecutivo}}</h2>
    <h2>{{$cliente->modalidad}}</h2>
    </div>
@endsection