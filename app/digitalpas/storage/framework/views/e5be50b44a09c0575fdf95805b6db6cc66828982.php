

<?php $__env->startSection('contenido'); ?>


<h5>Hola <?php echo e($usuario); ?> ¿Qué Beneficio Contractual deseas gestionar?</h5>


<div>
	<h6>Requerimiento Nº<?php echo e($reqregnew); ?></h6>
</div>


<div>

<form class="form-horizontal" method="POST">
	<?php echo csrf_field(); ?>
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
      <input type="text" class="form-control" id="usuario" value= "<?php echo e($usuario); ?>" readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Cédula:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ced_afi" id="ced_afi" value= "<?php echo e($cedula); ?>" readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Estado:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="estado" id="estado" value="<?php echo e($estado); ?>" readonly>
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
      <option>Prioridad de la Solicitud </option>
      <option value="1">1.-Normal</option>
      <option value="2">2.-Alta</option>
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

  <input type="hidden" name="req" id="req" readonly>
  <script>
    // Obtener referencias a los campos
    var cod_tipo = document.getElementById('cod_tipo');
    var req = document.getElementById('req');
    // Escuchar el evento de cambio en tipo
    cod_tipo.addEventListener('input', function() {
    // Obtener el valor de tipo
    var valorCod_tipo = cod_tipo.value;
    // Agregar el prefijo As al valor de tipo y reqreg, para agregar valor a req
    req.value = "As<?php echo e($sec); ?>-" + valorCod_tipo + '-<?php echo e($reqregnew); ?>';
    });
  </script>

  <input type="hidden" name="req_reg" id="req_reg" value="<?php echo e($reqregnew); ?>">

  <input type="hidden" name="edo" id="edo" value="<?php echo e($edo); ?>">
  
  <input type="hidden" name="cod_usr" id="cod_usr" value="<?php echo e($codigo); ?>">
  
  <input type="hidden" name="fec_crea" id="fec_crea" value= "<?php echo e(now()); ?>">

  <div class="form-group" align="center">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Solicitud
      </button>
    </div>
  </div>
</form>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.afilplantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DigitalPAS\app\digitalpas\resources\views/afiliado/afilnewreq.blade.php ENDPATH**/ ?>