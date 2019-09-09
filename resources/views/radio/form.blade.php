@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('crear.radio')}}" method="POST" class="col-5">
        @csrf
        <div class="form-group">

        <label for="nombre">Nombre del Radio</label>
        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingrese el nombre del radio">
        
        <label for="imei">IMEI del Radio</label>
        <input type="number" class="form-control" name="imei" id="imei" aria-describedby="helpId" placeholder="Ingrese el Imei del radio">

        <label for="cliente_id">Cliente</label>
        <select class="form-control" name="cliente_id" id="cliente_id">
            @foreach ($clientes as $cliente)
                <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>  
            @endforeach
        </select>

        <label for="modelo">Modelo</label>
        <select class="form-control" name="modelo" id="modelo">
                <option value="T199">T199</option> 
                <option value="T199">T320</option>  
                <option value="T199">TM7</option>   
        </select>

        <label for="status">Status</label>
        <select class="form-control" name="status" id="status">
                <option value="nuevo">Nuevo</option> 
                <option value="usado">Usado</option>  
        </select>

          <button class="btn btn-submit" type="submit">Enviar</button>
        </div>
    </form>
    </div>
@endsection