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
                        <h4 class="card-title">LISTADO PREDIOS</h4>
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>COD CATASTRAL</th>
                                    <th>COD ANT CATASTRAL</th>
                                    <th>N. INMUEBLE</th>
                                    <th>DISTRITO</th>
                                    <th>MANZANA</th>
                                    <th>PREDIO</th>
                                    <th>REGISTRO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>COD CATASTRAL</th>
                                    <th>COD ANT CATASTRAL</th>
                                    <th>N. INMUEBLE</th>
                                    <th>DISTRITO</th>
                                    <th>MANZANA</th>
                                    <th>PREDIO</th>
                                    <th>REGISTRO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($listado_predios as $lp): ?>
                                    <tr>
                                        <td><?php echo $lp->codcatas; ?></td>
                                        <td><?php echo $lp->codcatas_anterior; ?></td>
                                        <td><?php echo $lp->nro_inmueble; ?></td>
                                        <td><?php echo $lp->distrito; ?></td>
                                        <td><?php echo $lp->manzana; ?></td>
                                        <td><?php echo $lp->predio; ?></td>
                                        <td>
                                            <?php 
                                                $fecha_mod = explode(".", $lp->fec_creacion); 
                                                echo $fecha_mod[0]; 
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-xs" role="group">
                                                <a href="<?php echo base_url(); ?>predios/editar/<?php echo $lp->codcatas; ?>" class="btn btn-primary footable-edit">
                                                    <span class="fas fas fa-map" aria-hidden="true"></span>
                                                </a> 
                                                <a href="<?php echo base_url(); ?>predios/certificado/<?php echo $lp->codcatas; ?>" class="btn btn-warning footable-edit">
                                                    <span class="fas fas fa-edit" aria-hidden="true"></span>
                                                </a> 
                                                <a href="<?php echo base_url(); ?>predios/certificado/<?php echo $lp->codcatas; ?>" class="btn btn-info footable-edit">
                                                    <span class="fas fas fa-edit" aria-hidden="true"></span>
                                                </a> 

                                                <a href="<?php echo base_url(); ?>predios/certificado/<?php echo $lp->codcatas; ?>" class="btn btn-success footable-edit">
                                                    <span class="fas fas fa-print" aria-hidden="true"></span>
                                                </a> 
                                                <button type="button" class="btn btn-danger footable-delete">
                                                    <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                                </button>
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