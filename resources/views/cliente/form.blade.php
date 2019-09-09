@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{route('crear.cliente')}}" method="POST" class="col-5">
    @csrf
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingrese el nombre del cliente">
      <label for="modalidad">Modalidad</label>
      <select class="form-control" name="modalidad" id="modalidad">
        <option value="venta">Venta</option>
        <option value="alquiler">Alquiler</option>
        <option value="demo">DEMO</option>
      </select>

      <label for="ejecutivo">Ejecutivo</label>
      <select class="form-control" name="ejecutivo" id="ejecutivo">
        <option value="Cindy">Cindy</option>
        <option value="Nathalia">Nathalia</option>
        <option value="Alonso">Alonso</option>
      </select>
      <button class="btn btn-submit" type="submit">Enviar</button>
    </div>
</form>
</div>
@endsection