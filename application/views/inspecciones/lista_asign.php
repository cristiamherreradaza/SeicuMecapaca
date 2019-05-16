
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
                        <h4 class="card-title">INSPECCIONES</h4></h4>
                        <?php //vdebug($mis_tramites, true, false, true); ?>
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr> 
                                    <th>TRAMITE</th>                                   
                                    <th>INSPECTOR</th>
                                    <th>TIPO ASIGNACION</th>
                                    <th>INICIO</th>
                                    <th>FIN</th>                                    
                                    <th>acciones</th>
                                </tr>
                            </thead>
                          
                            <tbody>
                                <?php foreach ($lista as $mt): ?>
                                    <tr>
                                         <td><?php echo $mt->tramite_id; ?></td>
                                        <td><?php echo $mt->nombres.' '.$mt->paterno.' '.$mt->materno; ?></td>
                                        
                                        <td><?php echo $mt->tipo; ?></td>
                                        <td>                                  
                                        <?php echo $mt->inicio; ?>
                                        <td>
                                     
                                        <?php echo $mt->fin; ?>
                                        </td>
                                  
                                        <td>   
                                        <a <?php echo $verifica['baja'];?>="<?= base_url('asignacion/editar/'. $mt->asignacion_id); ?>" type="button" class="btn btn-info footable-delete">
                                                        <span class="fas fas fa-edit" aria-hidden="true">
                                                        </span>
                                                    </a>
                                                    <a <?php echo $verifica['baja'];?>="<?= base_url('asignacion/eliminar/'. $mt->asignacion_id); ?>" type="button" class="btn btn-danger footable-delete">
                                                        <span class="fas fa-trash-alt" aria-hidden="true">
                                                        </span>
                                                    </a>
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
     <!-- Trigger the modal with a button -->
     
        <!-- Modal -->
        <div id="Modaluno" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Acta de inspeccion</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                    </div>
                    <div class="modal-body">

                        <embed src="<?php echo base_url().'public/assets/files/inspeccion/'.$mt->acta_inspeccion; ?>"
                               frameborder="0" width="100%" height="400px">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="Modaldos" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Acta de notificacion</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>                        
                    </div>
                    <div class="modal-body">

                        <embed src="<?php echo base_url().'public/assets/files/inspeccion/'.$mt->acta_notificacion; ?>"
                               frameborder="0" width="100%" height="400px">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ==============================================================