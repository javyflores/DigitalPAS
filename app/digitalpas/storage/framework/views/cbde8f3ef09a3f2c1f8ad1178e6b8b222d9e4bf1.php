
<?php $__env->startSection('contenido'); ?>
<div>
	<h2>Nómina de Afiliados</h2>
    <div class="table-responsive">
    <table class="table table-bordered">
	    <thead>
	        <tr>
                <th>Estado</th>
                <th>Seccional</th>
                <th>Cédula</th>
                <th>ID</th>
                <th>1er Nombre</th>
                <th>2do Nombre</th>
                <th>1er Apellido</th>
                <th>2do Apellido</th>
                <th>Fecha de Nac.</th>
                <th>Sexo</th>
                <th>Edo. Cívil</th>
                <th>Hijos</th>
                <th>Discapacidad</th>
                <th>Grado Disc.</th>
                <th>Nivel Aca.</th>
                <th>Prof. u Oficio</th>
	        </tr>
	    </thead>
	    <tbody>
	        <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <tr>
                <td><?php echo e($dato->edo); ?></td>
                <td><?php echo e($dato->cod_sec); ?></td>
                <td><?php echo e($dato->cedula); ?></td>
                <td><?php echo e($dato->id_afi); ?></td>
                <td><?php echo e($dato->p_nombre); ?></td>
                <td><?php echo e($dato->s_nombre); ?></td>
                <td><?php echo e($dato->p_apellido); ?></td>
                <td><?php echo e($dato->s_apellido); ?></td>
                <td><?php echo e($dato->fec_nac); ?></td>
                <td><?php echo e($dato->sexo); ?></td>
                <td><?php echo e($dato->est_civ); ?></td>
                <td><?php echo e($dato->hijos); ?></td>
                <td><?php echo e($dato->discap); ?></td>
                <td><?php echo e($dato->gra_disc); ?></td>
                <td><?php echo e($dato->niv_aca); ?></td>
                <td><?php echo e($dato->prof_ofc); ?></td>
	        </tr>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </tbody>
	</table>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.afilplantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DigitalPAS\app\digitalpas\resources\views\prueba.blade.php ENDPATH**/ ?>