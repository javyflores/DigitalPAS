@extends('layouts.afilplantilla')

@section('contenido')


<h5>Hola {{ $usuario }} que requerimiento deseas gestionar</h5>


<div>
	<h6>Requerimiento Nº{{ $nuevoReqReg}}</h6>
</div>


<div>

<form class="form-horizontal" method="POST">
	@csrf
  <div class="form-group">
		<select name="cod_tipo" id="cod_tipo">
			<option>Tipo de Trámite </option>
			<option value="1">1.-Profesionalización</option>
			<option value="2">2.-Clasificación de cargo</option>
			<option value="3">3.-Prima por hijos</option>
			<option value="4">4.-Beca</option>
			<option value="5">5.-Discapacidad</option>
			<option value="6">6.-Hijos con discapacidad</option>
			<option value="7">7.-Reclamo</option>
		</select>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Nombre y Apellido:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usuario" value= "{{ $usuario }}" readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Cédula:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ced_afi" id="ced_afi" value= "{{ $codigo }}" readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Estado:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="edo" id="edo" value= "{{ $codigo }}" readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Descripción:</label>
    <div class="col-sm-10">
      <textarea name="desc_sol" id="desc_sol" placeholder="Detalla tu Solicitud"rows="2" cols="30"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Recaudos Digitalizados:</label>
    <div class="col-sm-10">
      <input type="file" name="reca_dig" id="reca_dig">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Cédula Digitalizada:</label>
    <div class="col-sm-10">
      <input type="file" name="ced_dig" id="ced_dig">
    </div>
  </div>

  <input type="hidden" name="req" id="req">
  <script>
    // Obtener referencias a los campos
    var cod_tipo = document.getElementById('cod_tipo');
    var req = document.getElementById('req');

    // Escuchar el evento de cambio en tipo
    cod_tipo.addEventListener('input', function() {
        // Obtener el valor de tipo
        var valorCod_tipo = cod_tipo.value;

        // Agregar el prefijo al valor de campo1 y asignarlo a campo2
        req.value = valorCod_tipo + {{ $nuevoReqReg}};
    });
  </script>
  <input type="hidden" name="campo_oculto" id="" value="valor_oculto">
  <input type="hidden" name="campo_oculto" id="" value="valor_oculto">




  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>


</form>

</div>



@endsection