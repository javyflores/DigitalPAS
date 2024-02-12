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


    <div>
    	@if(session('sol_asistencia'))
        <h1>Detalles de la solicitud de asistencia</h1>
        <p>Requerimiento: {{ session('sol_asistencia')->req }}</p>
        @endif
    </div>




	  <div class="imp">
		  <h3>Comprobante de Solicitud N° {{ session('usuario') }} </h3>
		  <div class="container" style="background-color:white">
		  	  <label>Nombre y Apellido:</label>
		      <input type="text" name="name" value= "{{ session('usuario') }}" style="background-color:rgba(255, 105, 97, 0.1)" readonly>
		      <label>Nombre y Apellido:</label>
			  <input type="text" name="usuario" id="usuario" value= "" style="background-color: rgba(119, 221, 119, 0.1)" readonly>
			  <label>Nombre y Apellido:</label>
		      <input type="text" name="ced_afi" id="ced_afi" value= "" style="background-color:rgba(253, 253, 150, 0.1)" readonly>
		      <label>Nombre y Apellido:</label>
		      <input type="text" name="estado" id="estado" value="" style="background-color:rgba(132, 182, 244, 0.1)" readonly>
		      <label>Nombre y Apellido:</label>
			  <input type="text" name="cod_prio" id="cod_prio" value= "" style="background-color:rgba(253, 202, 225, 0.1)" readonly>

		  </div>
	  </div>
			  <!--
			  <textarea name="desc_sol" id="desc_sol" placeholder="Detalla tu Solicitud" style="background-color:#fdcae1" rows="2" cols="30"></textarea>

		      <input type="file" name="reca_dig" id="reca_dig" accept=".pdf" size="10000000">
		      <input type="file" name="ced_dig" id="ced_dig" accept=".pdf" size="10000000">
		  	  -->

			  <input type="hidden" name="req" id="req" value="">
			  <input type="hidden" name="req_reg" id="req_reg" value="">
			  <input type="hidden" name="edo" id="edo" value="">
			  <input type="hidden" name="cod_usr" id="cod_usr" value="">
			  <input type="hidden" name="fec_crea" id="fec_crea" value= "">

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
</div>

@endsection

