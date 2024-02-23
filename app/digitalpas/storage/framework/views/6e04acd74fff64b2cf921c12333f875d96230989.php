


<?php $__env->startSection('contenido'); ?>

<h5>Registra el Usuario DIRECTIVO NACIONAL</h5>

<div>

<form class="form-horizontal" method="POST">
    <?php echo csrf_field(); ?>

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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admplantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DigitalPAS\app\digitalpas\resources\views/regusuarios/regnacional.blade.php ENDPATH**/ ?>