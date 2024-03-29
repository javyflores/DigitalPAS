


<?php $__env->startSection('contenido'); ?>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    
                        <div class="container-fluid">
                            <h3>Nomina del Estado: <?php echo e($estado); ?></h3>
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
                    <th>Item</th>
                    <th>Estado</th>
                    <th>Seccional</th>
                    <th>Cédula</th>
                    <th>ID-Afiliado</th>
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
                    <?php if(!empty($afiliados)): ?>
                        <?php $__currentLoopData = $itemsPaginados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $afiliado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($estado); ?></td>
                                <td><?php echo e($afiliado['cod_sec']); ?></td>
                                <td><?php echo e($afiliado['cedula']); ?></td>
                                <td><?php echo e($afiliado['id_afi']); ?></td>
                                <td><?php echo e($afiliado['p_nombre']); ?></td>
                                <td><?php echo e($afiliado['s_nombre']); ?></td>
                                <td><?php echo e($afiliado['p_apellido']); ?></td>
                                <td><?php echo e($afiliado['s_apellido']); ?></td>
                                <td><?php echo e($afiliado['fec_nac']); ?></td>
                                <td><?php echo e($afiliado['sexo']); ?></td>
                                <td><?php echo e($afiliado['est_civ']); ?></td>
                                <td><?php echo e($afiliado['hijos']); ?></td>
                                <td><?php echo e($afiliado['discap']); ?></td>
                                <td><?php echo e($afiliado['gra_disc']); ?></td>
                                <td><?php echo e($afiliado['niv_aca']); ?></td>
                                <td><?php echo e($afiliado['prof_ofc']); ?></td>
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
<?php echo $__env->make('layouts.dirsecplantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DigitalPAS\app\digitalpas\resources\views\seccional\secnomina.blade.php ENDPATH**/ ?>