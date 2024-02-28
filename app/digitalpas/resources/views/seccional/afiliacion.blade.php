@extends('layouts.dirsecplantilla')

@section('contenido')


<h5>Hola {{ $usuario }} Registra una nueva afiliación:</h5>

<div>

<form class="form-horizontal" method="POST">
    @csrf

  <div class="form-group">
    <label class="control-label col-sm-2">Primer Nombre:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="p_nombre" id="p_nombre">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Primer Apellido:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="p_apellido" id="p_apellido">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Cédula a Afiliar:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="cedula" id="cedula">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Seccional:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="estado" id="estado" value="{{ $estado }}" readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Afiliación Digitalizada:</label>
    <div class="col-sm-10">
      <input type="file" name="afi_dig" id="afi_dig" accept=".pdf" size="10000000">
    </div>
    <div class="col-sm-10">
      <span id="valid" colour=red>Solo archivos PDF con un máximo de 10MB</span>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Cédula Digitalizada:</label>
    <div class="col-sm-10">
      <input type="file" name="ced_dig" id="ced_dig" accept=".pdf" size="10000000">
    </div>
    <div class="col-sm-10">
      <span id="valid" colour=red>Solo archivos PDF con un máximo de 10MB</span>
    </div>
  </div>


  <input type="hidden" name="cod_usr" id="cod_usr" value="{{ $codigo }}">

  <input type="hidden" name="sec" id="sec" value="{{ $sec }}">
  
  <input type="hidden" name="fec_crea" id="fec_crea" value= "{{ now() }}">

  <input type="hidden" name="edo" id="edo" value="{{ $edo }}">


  <div class="form-group" align="center">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Solicitud
      </button>
    </div>
  </div>
</form>

</div>


@endsection