

<?php $__env->startSection('contenido'); ?>


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

<?php $__env->startSection('contenido'); ?>

<div>
  <form>
    <div class="container">
      <h4>Datos de la Afiliación</h4>
    </div>

    <div class="imp">

      <h3>Comprobante de Solicitud N° <?php echo e($reqr); ?> </h3>
      <div class="container" style="background-color:white">

          <div>
            <label>Nombre y Apellido:</label>
            <input type="text" name="name" value= "<?php echo e($afiliacion->p_nombre); ?> <?php echo e($afiliacion->p_apellido); ?>" style="background-color:rgba(255, 105, 97, 0.1)" readonly>
          </div>

          <div>
              <label>Cédula de Identidad N°:</label>
              <input type="text" name="ced_sol" id="ced_sol" value= " <?php echo e($afiliacion->cedula); ?>" style="background-color:rgba(253, 253, 150, 0.2)" readonly>
          </div>

          <div>
            <label>Estado:</label>
            <input type="text" name="estado" id="estado" value="<?php echo e($estado); ?>" style="background-color:rgba(132, 182, 244, 0.1)" readonly>
          </div>

          <div>
            <label>Fecha de su Solicitud:</label>
            <input type="text" name="fec_crea" id="fec_crea" value= "<?php echo e($afiliacion->fec_crea); ?>" style="background-color: rgba(119, 221, 119, 0.2)" readonly>
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

  </form>
  
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dirsecplantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DigitalPAS\app\digitalpas\resources\views/seccional/confafi.blade.php ENDPATH**/ ?>