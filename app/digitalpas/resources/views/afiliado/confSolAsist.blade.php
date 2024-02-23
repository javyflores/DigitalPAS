@extends('layouts.afilplantilla')

<head>
    <!-- Otros elementos del head -->
	<style>
	body {font-family: Arial, Helvetica, sans-serif;}

	form {
	  border: 3px solid #f1f1f1;
	  font-family: Arial;
	}

	.container {
	  padding: 20px;
	  background-color: #f1f1f1;
	}

	input[type=text], input[type=submit] {
	  width: 100%;
	  padding: 12px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  box-sizing: border-box;
	}

	input[type=submit] {
	  background-color: #04AA6D;
	  color: white;
	  border: none;
	}

	input[type=submit]:hover {
	  opacity: 0.8;
	}
	</style>

</head>

@section('contenido')

<div>
	<form>
	  <div class="container">
	    <h4>Datos de su Requerimiento</h4>
	    <p>Por Favor verifique los datos de su Solicitud de Beneficio Contractual.<br>
	    Si los datos son correctos, confirme e imprima el comprobante.</p>
	  </div>

	  <div class="imp">
		  <h3>Comprobante de Solicitud N° {{ $reqr }} </h3>
		  <div class="container" style="background-color:white">
		  	  <div>
		  	  <label>Nombre y Apellido:</label>
		      <input type="text" name="name" value= "{{ session('usuario') }}" style="background-color:rgba(255, 105, 97, 0.1)" readonly>
			  </div>
			  <div>
			  <label>Cédula de Identidad N°:</label>
		      <input type="text" name="ced_afi" id="ced_afi" value= " {{ $sol_asistencia->ced_afi }}" style="background-color:rgba(253, 253, 150, 0.2)" readonly>
		      </div>
		      <div>
		      <label>Estado:</label>
		      <input type="text" name="estado" id="estado" value="{{ $estado }}" style="background-color:rgba(132, 182, 244, 0.1)" readonly>
		      </div>
		      <div>
		      <label>Prioridad:   1.-Normal / 2.-Alta</label>
			  <input type="text" name="cod_prio" id="cod_prio" value= "{{ $sol_asistencia->cod_prio }}" style="background-color:rgba(253, 202, 225, 0.2)" readonly>
			  </div>
			  <div>
			  <label>Descripción:</label>
		      <input type="text" name="desc_sol" id="desc_sol" value= " {{ $sol_asistencia->desc_sol }}" style="background-color:rgba(253, 253, 150, 0.1)" readonly>
		      </div>
		      <div>
		      <label>Recaudos Digitalizados: Nombre del archivo</label>
			  <input type="text" name="reca_dig" id="reca_dig" value= "{{ $sol_asistencia->reca_dig }}" style="background-color: rgba(119, 221, 119, 0.2)" readonly>
			  </div>
			  <div>
		      <label>Cédula Digitalizada: Nombre del archivo</label>
			  <input type="text" name="ced_dig" id="ced_dig" value= "{{ $sol_asistencia->ced_dig }}" style="background-color:rgba(253, 202, 225, 0.1)" readonly>
			  </div>
		  </div>
	  </div>

	  <div class="container">
	    <input type="submit" value="Confirmar e Imprimir" onclick="printDocument()">
		  <script>
		    function printDocument() {
		      var printContents = document.getElementsByClassName("imp")[0].innerHTML;
		      var originalContents = document.body.innerHTML;
		      document.body.innerHTML = printContents;
		      window.print();
		      document.body.innerHTML = originalContents;
		    }
		  </script>
	  </div>

	</form>


	  <div align="center">
	  	<form method="POST">
	  	@csrf
		  	<input type="hidden" name="reqr" id="reqr" value="{{ $reqr }}">
		  	<input type="hidden" name="estado" id="estado" value="{{ $estado }}">

		    <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-window-close fa-sm text-white-50"></i> Eliminar Solicitud</button>
	    
		    <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Editar Solicitud</a>

	    </form>
	  </div>
	</form>

	
</div>

@endsection

