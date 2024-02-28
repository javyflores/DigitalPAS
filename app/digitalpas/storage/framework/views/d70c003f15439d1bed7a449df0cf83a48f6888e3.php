


<?php $__env->startSection('contenido'); ?>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    
                        <div class="container-fluid">
                            <h3>Panel de Control</h3>
                        </div>
                    
                        <!-- Topbar Search -->
                        <div class="container-fluid">
                        <form method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <?php echo csrf_field(); ?>
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" name="cedula" placeholder="Buscar por Cédula" aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        </div>



                    </div>
                </div>

    <div class="container mt-3">

      <h2>Nómina de Afiliados</h2>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                   
                    <th>nombre</th>
                    <th>cedula</th>
                    <th>email</th>
                    <th>codigo afiliado</th>
                    <th>rol</th>
                    <th>cargo</th>
                    
                  </tr>
                </thead>
                <tbody>
                    <?php if(!empty($afiliados)): ?>
                        <?php $__currentLoopData = $itemsPaginados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $afiliado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                               
                                <td><?php echo e($afiliado['nombre']); ?></td>
                                <td><?php echo e($afiliado['cedula']); ?></td>
                                <td><?php echo e($afiliado['email']); ?></td>
                                <td><?php echo e($afiliado['id_afi']); ?></td>
                                <td><?php echo e($afiliado['rol']); ?></td>
                                <td><?php echo e($afiliado['cod_cargo']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <h5>No se encontró ningún Afiliado con ese número de Cédula</h5>             
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <p>Total de Afiliados: <?php echo e($totalAfiliados); ?></p>
        <p>Pag actual: <?php echo e($paginaActual); ?></p>
        <p>Pag:

        <!-- Para mostrar la paginación -->
        <?php
        for ($i = 1; $i <= $totalPaginas; $i++) {
            echo '<a href="?pagina=' . $i . '">' . $i . '</a> ';
        }
        ?>

        </p>

        <div class="container-fluid" align="right">
            <a href="<?php echo e(route('afiliado.report')); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
        </div>

    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admplantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DigitalPAS\app\digitalpas\resources\views\indexusers.blade.php ENDPATH**/ ?>