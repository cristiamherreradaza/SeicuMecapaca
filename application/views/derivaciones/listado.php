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
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>FECHA REGISTRO</th>
                                    <th>REMITENTE</th>
                                    <th>REFERENCIA</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>FECHA REGISTRO</th>
                                    <th>REMITENTE</th>
                                    <th>REFERENCIA</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($mis_tramites as $la): ?>
                                    <tr>
                                        <td>
                                            <?php 
                                                $fecha_mod = explode(".", $la->fec_creacion); 
                                                echo $fecha_mod[0]; 
                                            ?>
                                        </td>
                                        <td><?php echo $la->fuente; ?></td>
                                        <!-- <td><?php //echo $la->codcatas_anterior; ?></td> -->
                                        <td><?php echo $la->descripcion; ?></td>
                                        <td>
                                            <div class="btn-group btn-group-xs" role="group">
                                                <a <?php echo $verifica['imprimir'];?>="<?php echo base_url(); ?>predios/certificado/<?php echo $la->derivacion_id; ?>" class="btn btn-success footable-edit">
                                                    <span class="fas fas fa-print" aria-hidden="true"></span>
                                                </a> 
                                                <a <?php echo $verifica['baja'];?>="" type="button" class="btn btn-danger footable-delete">
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
<!-- ==============================================================