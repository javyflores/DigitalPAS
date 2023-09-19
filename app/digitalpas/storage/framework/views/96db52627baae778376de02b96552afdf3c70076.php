


<?php $__env->startSection('contenido'); ?>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <div class="container-fluid">
                            <h3>Panel de Control</h3>
                        </div>

                        <!-- Topbar Search -->
                        <div class="container-fluid">
                        <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por Cédula"
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        </div>

                        <div class="container-fluid">
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
                        </div>
                    </div>

                </div>


    <div class="container mt-3">

      <h2>NÓMINA</h2>
      <!-- <h3> Datos Personales</h3>  -->

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Estado</th>
                    <th>Cédula</th>
                    <th>ID-Afiliado</th>
                    <th>1er Nombre</th>
                    <th>2do Nombre</th>
                    <th>1er Apellido</th>
                    <th>2do Apellido</th>
                    <th>Fecha de Nac.</th>
                    <th>Sexo</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if(!empty($afiliados)): ?>
                        <?php $__currentLoopData = $afiliados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $afiliado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($afiliado['edo']); ?></td>
                                <td><?php echo e($afiliado['cedula']); ?></td>
                                <td><?php echo e($afiliado['id_afi']); ?></td>
                                <td><?php echo e($afiliado['p_nombre']); ?></td>
                                <td><?php echo e($afiliado['s_nombre']); ?></td>
                                <td><?php echo e($afiliado['p_apellido']); ?></td>
                                <td><?php echo e($afiliado['s_apellido']); ?></td>
                                <td><?php echo e($afiliado['fec_nac']); ?></td>
                                <td><?php echo e($afiliado['sexo']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
        <p>Pag: <strong>1</strong> 2 3 4 5 .... 9 </p>
        <p>Total de Afiliados: <?php echo e($totalAfiliados); ?></p>
            
            

    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admplantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Digital PAS\app\digitalpas\resources\views/nomina/admnomina.blade.php ENDPATH**/ ?>