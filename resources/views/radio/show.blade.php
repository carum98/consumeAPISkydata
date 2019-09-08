@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>{{$radio->nombre}}</h1>
    <h2>{{$radio->imei}}</h2>
    </div>
@endsection