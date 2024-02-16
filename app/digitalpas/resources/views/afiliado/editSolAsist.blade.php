@extends('layouts.afilplantilla')

@section('contenido')


<h5> {{ session('usuario') }} aca puedes modificar la Solicitud.</h5>

<div>

<form class="form-horizontal" method="POST">
	@csrf
  <div class="form-group">
    <label class="control-label col-sm-2">Número de Solicitud:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usuario" value= "{{ $solicitud }}" readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Nombre y Apellido:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usuario" value= "{{ session('usuario') }}" readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Cédula:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ced_afi" id="ced_afi" value= "" readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Estado:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="estado" id="estado" value="session('estado')" readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Descripción:</label>
    <div class="col-sm-10">
      <textarea name="desc_sol" id="desc_sol" placeholder="Detalla tu Solicitud" rows="2" cols="30" maxlength="100" oninput="updateCounter()"></textarea>
      <span id="counter">100</span> caracteres restantes
      <script>
        function updateCounter() {
          var textarea = document.getElementById("desc_sol");
          var counter = document.getElementById("counter");
          var remainingChars = 100 - textarea.value.length;
          counter.textContent = remainingChars;
        }
      </script>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <select name="cod_prio" id="cod_prio">
      <option>Prioridad de la Solicitud: </option>

    </select>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Recaudos Digitalizados:</label>
    <div class="col-sm-10">
      <input type="file" name="reca_dig" id="reca_dig" accept=".pdf" size="10000000">
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

  <input type="hidden" name="req_reg" id="req_reg" value="">

  <input type="hidden" name="edo" id="edo" value="">
  
  <input type="hidden" name="cod_usr" id="cod_usr" value="">
  
  <input type="hidden" name="fec_crea" id="fec_crea" value= "{{ now() }}">

  <div class="form-group" align="center">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Confirmar Cambios
      </button>
    </div>
  </div>
</form>

</div>


@endsection