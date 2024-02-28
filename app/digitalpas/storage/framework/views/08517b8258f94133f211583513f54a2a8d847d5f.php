


<?php $__env->startSection('contenido'); ?>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <div class="container-fluid">
                            <h3>Panel de Seguimiento</h3>
                        </div>

                        <!-- Topbar Search -->
                        <div class="container-fluid">
                        <form method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <?php echo csrf_field(); ?>
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" name="req_seg" id="req_seg" placeholder="Buscar por N° de Requerimiento" aria-label="Search" aria-describedby="basic-addon2">
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

      <h5>Solicitudes de trámites:</h5>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Usuario</th>
                    <th>Requerimiento</th>
                    <th>Progreso</th>

                  </tr>
                </thead>
                <tbody>
                    <?php if(!empty($requerimientos)): ?>

                        <?php $__currentLoopData = $itemsPaginados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $requerimiento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($requerimiento['cod_usr']); ?></td>

                                <td>
                                    <form method="POST" class="d-inline-block">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="req_seg" id="req_seg" value="<?php echo e($requerimiento['req_seg']); ?>">
                                        <button type="submit" class="btn btn-link"><?php echo e($requerimiento['req_seg']); ?></button>
                                    </form>
                                </td>

                                <td>
                                    <?php
                                        $accionesRealizadas = 0;
                                        $totalAcciones = 7;

                                        if ($requerimiento['fec_crea']) {
                                            $accionesRealizadas++;
                                        }

                                        if ($requerimiento['fec_env']) {
                                            $accionesRealizadas++;
                                        }

                                        if ($requerimiento['fec_adm']) {
                                            $accionesRealizadas++;
                                        }

                                        if ($requerimiento['fec_rev']) {
                                            $accionesRealizadas++;
                                        }

                                        if ($requerimiento['fec_consig']) {
                                            $accionesRealizadas++;
                                        }

                                        if ($requerimiento['fec_resl']) {
                                            $accionesRealizadas++;
                                        }

                                        if ($requerimiento['fec_resp']) {
                                            $accionesRealizadas++;
                                        }

                                        $progreso = ($accionesRealizadas / $totalAcciones) * 100;
                                    ?>
                                    <progress value="<?php echo e($progreso); ?>" max="100"></progress>

                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <h5>No se encontró ningún Requerimiento con ese número</h5>  

                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <p>Total de Requerimientos: <?php echo e($totalrequerimientos); ?></p>
        <p>Pag actual: <?php echo e($paginaActual); ?></p>
        <p>Pag:

        <!-- Para mostrar la paginación -->
        <?php
        for ($i = 1; $i <= $totalPaginas; $i++) {
            echo '<a href="?pagina=' . $i . '">' . $i . '</a> ';
        }
        ?>

        </p>

    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nacplantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DigitalPAS\app\digitalpas\resources\views\nacional\nacsoltramite.blade.php ENDPATH**/ ?>