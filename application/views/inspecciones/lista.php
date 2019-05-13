
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
                                    <th>asignacion</th>
                                    <th>actuacion</th>
                                    <th>infraccion</th>
                                    <th>inspeccion</th>
                                    <th>notificacion</th>
                                    <th>vobo</th>
                                    <th></th>
                                </tr>
                            </thead>
                          
                            <tbody>
                                <?php foreach ($lista as $mt): ?>
                                    <tr>
                                        <td><?php echo $mt->asignacion_id; ?></td>
                                        <td><?php echo $mt->actuacion; ?></td>
                                        <td><?php echo $mt->infraccion; ?></td>
                                        <td>
                                        <a href="<?php echo base_url().'public/assets/files/inspeccion/'.$mt->acta_inspeccion; ?>"  title="ver" target="blank">
                                                    <i class="fas fa-file-pdf" aria-hidden="true" style-color="red"></i><?php echo $mt->acta_inspeccion; ?>
                                                </a>
                                        <td><?php echo $mt->acta_notificacion; ?></td>
                                        <td>                                        
                                        <?php 
                                         $bool=$mt->vobo;
                                        if($bool=1){
                                                echo "SI";
                                            }else{
                                                echo "NO";
                                            }
                                            ?>
                                        </td>
                                        <td>                                         
                                              <!--<a href="<?php echo base_url(); ?>inspeccion/editar/<?php echo $mt->inspeccion_id; ?>" class="btn btn-success footable-edit" title="Derivar">
                                                    <span class="fas fas fa-edit" aria-hidden="true"></span>
                                                </a>
                                                <a href="<?php echo base_url(); ?>derivaciones/eliminar/<?php echo $mt->inspeccion_id; ?>" class="btn btn-primary footable-edit" title="Ver" >
                                                    <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                                </a>-->
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