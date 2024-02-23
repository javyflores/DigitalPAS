@extends('layouts.admplantilla')


@section('contenido')

<h5>Registra el Usuario AFILIADO</h5>

<div>

<form class="form-horizontal" method="POST">
    @csrf

  <div class="form-group">
    <label class="control-label col-sm-2">Introduzca la cédula del usuario:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="" id="" value="">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Dato</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="" id="" value="" readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Dato</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="" id="" value= "" readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Dato</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="" id="" value="" readonly>
    </div>
  </div>



  <div class="form-group" align="center">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Crear Usuario
      </button>
    </div>
  </div>
</form>

</div>


@endsection