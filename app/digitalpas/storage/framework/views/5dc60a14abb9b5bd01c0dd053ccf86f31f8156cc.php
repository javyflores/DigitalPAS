

<?php $__env->startSection('contenido'); ?>


<h5>Hola <?php echo e($usuario); ?> Registra un nuevo Trámite de Beneficio:</h5>

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
    </select>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Nombre y apellido del Beneficiario:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nombre" id="nombre">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Cédula del Beneficiario:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="cedula" id="cedula">
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


  <input type="hidden" name="cod_usr" id="cod_usr" value="<?php echo e($codigo); ?>">

  <input type="hidden" name="sec" id="sec" value="<?php echo e($sec); ?>">
  
  <input type="hidden" name="fec_crea" id="fec_crea" value= "<?php echo e(now()); ?>">

  <input type="hidden" name="edo" id="edo" value="<?php echo e($edo); ?>">


  <div class="form-group" align="center">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Solicitud
      </button>
    </div>
  </div>
</form>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dirsecplantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DigitalPAS\app\digitalpas\resources\views/seccional/sol_tramite.blade.php ENDPATH**/ ?>