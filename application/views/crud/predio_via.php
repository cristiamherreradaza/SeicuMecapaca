<link href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css" rel="stylesheet">
<style type="text/css">
    #izquierda{
        padding-left: 10px;
        float:left;
    }
    
    #derecha{
        padding-left: 10px;
        float:left;
    }
</style>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        ADMINISTRACI&Oacute;N DE V&Iacute;A <?php $i=1; //echo $data['title']; ?>
                        <div class="card-body wizard-content">
                            <div class="col-lg-2 col-md-4">
                                <button type="button" class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#Modal_insert">Nueva V&iacute;a</button>
                            </div><div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Codcatas</th>
                                                <th>Objectid_via</th>
                                                <th>Mat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($zona_urbana as $lis){
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $lis->descripcion;?></td>
                                                <?php if ($lis->activo == 1) {?>
                                                <td><?php echo 'ACTIVO';?></td> 
                                                <?php    
                                                }else
                                                {?>
                                                <td><?php echo 'INACTIVO';?></td>
                                                <?php
                                                }
                                                ?>
                                                <td>
                                                    <div id="izquierda"><a href="<?= base_url('zona_urbana/editar/'. $lis->zonaurb_id); ?>" data-toggle="modal" data-target="#Modal_edit"><i class="fas fa-edit"></i> Editar</a></div>

                                                    <div id="derecha"><a href="<?= base_url('zona_urbana/eliminar/'. $lis->zonaurb_id); ?>"><i class="fas fa-trash-alt"></i>Borrar</a></div>
                                                </td>
                                            </tr>
                                        <?php 
                                         }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-6">
                        
                    </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

              
        <div class="modal fade" id="Modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Editar Zona Urbana</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>zona_urbana/editar" method="POST">-->
                        <?php echo form_open('zona_urbana/update', array('method'=>'POST')); ?>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Descripci&oacute;n</label>
                                <input type="text" class="form-control" id="recipient-name1" name="descripcion" value="<?php echo $lis->zonaurb_id;?>">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Activo</label>
                                
                                <div class="col-sm-9">
                                    <select class="form-control" id="activo" name="activo">
                                        <option value="1">ACTIVO</option>
                                        <option value="0">INACTIVO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="modal fade" id="Modal_insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Insertar Nueva Zona Urbana</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>zona_urbana/insertar" method="POST">-->
                        <?php echo form_open('zona_urbana/insertar', array('method'=>'POST')); ?>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Descripci&oacute;n</label>
                                <input type="text" class="form-control" id="recipient-name1" name="descripcion">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Activo</label>
                                
                                <div class="col-sm-9">
                                    <select class="form-control" id="activo" name="activo">
                                        <option value="1">ACTIVO</option>
                                        <option value="0">INACTIVO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
       


        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
