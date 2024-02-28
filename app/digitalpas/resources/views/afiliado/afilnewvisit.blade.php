@extends('layouts.afilplantilla')

@section('contenido')


<h5>Hola {{ $usuario }} aca puedes Solicitar una visita a tu centro de trabajo</h5>

<div>

<form class="form-horizontal" method="POST">
	@csrf
  <div class="form-group">
    <label class="control-label col-sm-2">Primer Nombre del Solicitante:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="p_nombre_sol" id="p_nombre_sol">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Primer Apellido del Solicitante:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="p_apellido_sol" id="p_apellido_sol">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Cédula del Solicitante:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ced_sol" id="ced_sol">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Estado:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="estado" id="estado" value="{{ $estado }}" readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Centro de Trabajo:</label>
    <div class="col-sm-10">
      <textarea name="dependencia" id="dependencia" placeholder="Nombre del Centro de Trabajo" rows="1" cols="30" maxlength="30" oninput="updateCounter1()"></textarea>
      <span id="counter1">30</span> caracteres restantes
      <script>
        function updateCounter1() {
          var textarea = document.getElementById("dependencia");
          var counter1 = document.getElementById("counter1");
          var remainingChars = 30 - textarea.value.length;
          counter1.textContent = remainingChars;
        }
      </script>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Fecha de su Solicitud:</label>
    <div class="col-sm-10">
      <input type="text" name="fec_crea" id="fec_crea" value= "{{ now() }}" readonly>
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

  <input type="hidden" name="sec" id="sec" value = "{{ $sec }}">

  <input type="hidden" name="edo" id="edo" value="{{ $edo }}">
  
  <input type="hidden" name="cod_usr_sol" id="cod_usr_sol" value="{{ $codigo }}">
  


  <div class="form-group" align="center">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Solicitud
      </button>
    </div>
  </div>
</form>

</div>


@endsection