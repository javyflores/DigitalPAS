<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>DigitalPASirtrame</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/estilo.css')); ?>">
    </head>

    <body>
        <div align="center">
             <img src="<?php echo e(asset('img/Logo DigitalPAS.png')); ?>" alt="Logo" style="height:100px;">           
            <img src="<?php echo e(asset('img/Logo SIRTRAME.png')); ?>" alt="Logo" style="height:100px;">
        </div>

        <div class="contenedor" align="center">
            <br><br><ul class="nav" style= "text-align:center">
                <input type="submit" id="btn-abrir-inst" class="btn-abrir-inst" value="ACCEDER" >
            </ul>
            <div class="overlay1" id="overlay1">
                <div class="popup1" id="popup1">
                        <h3>DigitalPASirtrame</h3>
                <form method="POST" class="contenedor-inputs">
                    <?php echo csrf_field(); ?>
                    Usuario: <br><input type="text" name="username"><br>
                    Contrseña: <br><input type="password" name="password"><br><br>
                    <input type="submit" class="btn-submit-inst" value="Iniciar sesión"><br><br>
                    <input type="reset" class="btn-reset" value="Limpiar"><br><br/>
                    <a href="<?php echo e(url()->current()); ?>" class="btn-cancelar">Cancelar</a>
                </form>
                </div>
            </div>
        </div>
            <section class="footer__copy container" align="center">
                <h3 class="footer__copyright" align="center">Derechos reservados &copy; @UNEXCA  30142 2023</h3>
            </section>
        <script src="<?php echo e(asset('js/ani.js')); ?>"></script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Digital PAS\app\digitalpas\resources\views/login.blade.php ENDPATH**/ ?>