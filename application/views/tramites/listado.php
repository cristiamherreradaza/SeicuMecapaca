<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ASIGNADOS</h4></h4>
                        <?php //vdebug($mis_tramites, true, false, true); ?>
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>FECHA</th>
                                    <th>CITE</th>
                                    <th>REFERENCIA</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>FECHA</th>
                                    <th>CITE</th>
                                    <th>REFERENCIA</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($mis_tramites as $mt): ?>
                                    <tr>
                                        <td>
                                            <?php 
                                                $fecha_mod = explode(".", $mt->fec_creacion); 
                                                echo $fecha_mod[0]; 
                                            ?>
                                        </td>
                                        <td><?php echo $mt->cite; ?></td>
                                        <td><?php echo $mt->referencia; ?></td>
                                        <!-- <td><?php //echo $mt->codcatas_anterior; ?></td> -->
                                        <td>
                                            <div class="btn-group btn-group-xs" role="group">
                                                <a href="<?php echo base_url(); ?>derivaciones/nuevo/<?php echo $mt->tramite_id; ?>" class="btn btn-success footable-edit">
                                                    <span class="fas fa-paper-plane" aria-hidden="true"></span>
                                                </a>

                                                <a href="<?php echo base_url(); ?>derivaciones/ver/<?php echo $mt->tramite_id; ?>" class="btn btn-primary footable-edit">
                                                    <span class="fas fa-bars" aria-hidden="true"></span>
                                                </a>

                                                <a href="#" type="button" class="btn btn-danger footable-delete">
                                                    <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>    
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->