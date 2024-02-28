

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

	.custom-progress {
      width: 300px;
      height: 20px;
    }
	</style>

</head>

<?php $__env->startSection('contenido'); ?>

<div>
	<form>
	  <div class="container">
	    <h4>Estatus de su Requerimiento</h4>
	  </div>

	  <div class="imp">
		  <h3>Comprobante de Solicitud N° <?php echo e($req_seg); ?> </h3>
		  <div class="container" style="background-color:white">

			  <div>
			  <label>Cédula del Solicitante:</label>
		      <input type="text" name="ced_sol" id="ced_sol" value= " <?php echo e($sol_asis->ced_afi); ?>" style="background-color:rgba(253, 253, 150, 0.2)" readonly>
		      </div>

		      <div>
		      <label>Fecha de su Solicitud:</label>
			  <input type="text" name="fec_crea" id="fec_crea" value= "<?php echo e($sol_asis->fec_crea); ?>" style="background-color: rgba(119, 221, 119, 0.2)" readonly>
			  </div>

			  <div>
			  <label>Descripción:</label>
		      <input type="text" name="desc_sol" id="desc_sol" value= " <?php echo e($sol_asis->desc_sol); ?>" style="background-color:rgba(253, 253, 150, 0.1)" readonly>
		      </div>

			  <div>
		      <label>Progreso de la Solicitud:</label>
				<?php
				    $accionesRealizadas = 0;
				    $totalAcciones = 7;

				    if ($requerimiento[0]['fec_crea']) {
				        $accionesRealizadas++;
				    }

				    if ($requerimiento[0]['fec_env']) {
				        $accionesRealizadas++;
				    }

				    if ($requerimiento[0]['fec_adm']) {
				        $accionesRealizadas++;
				    }

				    if ($requerimiento[0]['fec_rev']) {
				        $accionesRealizadas++;
				    }

				    if ($requerimiento[0]['fec_consig']) {
				        $accionesRealizadas++;
				    }

				    if ($requerimiento[0]['fec_resl']) {
				        $accionesRealizadas++;
				    }

				    if ($requerimiento[0]['fec_resp']) {
				        $accionesRealizadas++;
				    }

				    $progreso = ($accionesRealizadas / $totalAcciones) * 100;
				?>
				<progress class="custom-progress" value="<?php echo e($progreso); ?>" max="100"></progress>

			  </div>
		  </div>
	  </div>

	</form>

	</form>
	
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.afilplantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DigitalPAS\app\digitalpas\resources\views\afiliado\segsolcons.blade.php ENDPATH**/ ?>