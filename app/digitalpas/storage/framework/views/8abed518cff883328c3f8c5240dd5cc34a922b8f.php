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
            <td>willer</td>
            <td>Requerimiento</td>
            <td>estado</td>
            <td>Código del usuario</td>
            <td>cédula</td>
            <td>Primer nombre</td>
            <td>primer apellido</td>
            <td>fecha de creación</td>
        </tr>
        <?php $__currentLoopData = $afiliaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $afiliacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <tr>
                <td><?php echo e($afiliacion->req_reg); ?></td>
                <td><?php echo e($afiliacion->req); ?></td>
                <td><?php echo e($afiliacion->edo); ?></td>
                <td><?php echo e($afiliacion->cod_usr); ?></td>
                <td><?php echo e($afiliacion->cedula); ?></td>
                <td><?php echo e($afiliacion->p_nombre); ?></td>
                <td><?php echo e($afiliacion->p_apellido); ?></td>
                <td><?php echo e($afiliacion->fec_crea); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH C:\xampp\htdocs\DigitalPAS\app\digitalpas\resources\views/export/exportexcel.blade.php ENDPATH**/ ?>