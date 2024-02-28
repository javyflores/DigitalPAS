

<?php $__env->startSection('contenido'); ?>


<h5>Hola <?php echo e($usuario); ?> Registra una nueva afiliación:</h5>

<div>

<form class="form-horizontal" method="POST">
    <?php echo csrf_field(); ?>

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
      <input type="text" class="form-control" name="estado" id="estado" value="<?php echo e($estado); ?>" readonly>
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
<?php echo $__env->make('layouts.dirsecplantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DigitalPAS\app\digitalpas\resources\views/seccional/afiliacion.blade.php ENDPATH**/ ?>