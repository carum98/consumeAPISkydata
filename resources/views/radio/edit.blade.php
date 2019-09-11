@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('edit.radio', $radio->id)}}" method="POST" class="col-5">
        @csrf
        <div class="form-group">

        <label for="nombre">Nombre del Radio</label>
        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingrese el nombre del radio" value="{{$radio->nombre}}">
        
        <label for="imei">IMEI del Radio</label>
        <input type="number" class="form-control" name="imei" id="imei" aria-describedby="helpId" placeholder="Ingrese el Imei del radio" value="{{$radio->imei}}">

        <label for="cliente_id">Cliente</label>
        <select class="form-control" name="cliente_id" id="cliente_id">
            @foreach ($clientes as $cliente)
                <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>  
            @endforeach
        </select>

          <button class="btn btn-submit" type="submit">Enviar</button>
        </div>
    </form>
    </div>
@endsection