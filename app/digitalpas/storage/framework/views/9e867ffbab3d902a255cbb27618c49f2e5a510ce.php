<table>
    <caption>Encabezado de la tabla</caption>
   
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Afiliados</td>
            <td></td>
            <td></td>
            <td><?php echo e(now()->format('d/m/Y')); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td width="200px" style="text-align:left;">Registro de Requerimiento</td>
            <td width="200px" style="text-align:left;">Requerimiento</td>
            <td width="200px" style="text-align:left;">estado</td>
            <td width="200px" style="text-align:left;">Código del usuario</td>
            <td width="200px" style="text-align:left;">cédula</td>
            <td width="200px" style="text-align:left;">Primer nombre</td>
            <td width="200px" style="text-align:left;">primer apellido</td>
            <td width="200px" style="text-align:left;">fecha de creación</td>
        </tr>
        <?php $__currentLoopData = $afiliaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $afiliacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <tr>
                <td style="text-align:right;"><?php echo e($afiliacion->req_reg); ?></td>
                <td style="text-align:right;"><?php echo e($afiliacion->req); ?></td>
                <td style="text-align:right;"><?php echo e($afiliacion->edo); ?></td>
                <td style="text-align:right;"><?php echo e($afiliacion->cod_usr); ?></td>
                <td style="text-align:right;"><?php echo e($afiliacion->cedula); ?></td>
                <td style="text-align:right;"><?php echo e($afiliacion->p_nombre); ?></td>
                <td style="text-align:right;"><?php echo e($afiliacion->p_apellido); ?></td>
                <td style="text-align:right;"><?php echo e($afiliacion->fec_crea); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH C:\xampp\htdocs\DigitalPAS\app\digitalpas\resources\views\export\exportexcel.blade.php ENDPATH**/ ?>