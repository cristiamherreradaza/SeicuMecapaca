<!--alerts CSS -->
<link href="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

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
                        ADMINISTRACI&Oacute;N DE ZONA URBANA <?php $i=1; //echo $data['title']; ?>
                        <div class="card-body wizard-content">
                            <div class="col-lg-2 col-md-4">
                                <button type="button" class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#Modal_insert">Nueva Zona Urbana</button>
                            </div><div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Descripci&oacute;n</th>
                                                <th>Estado</th>
                                                <th>Acci&oacute;n</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($zona_urbana as $lis){
                                                $datos = $lis->zonaurb_id."||".
                                                         $lis->descripcion."||".
                                                         $lis->activo;
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
                                                    <div id="izquierda"><a href="" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')"><i class="fas fa-edit"></i> Editar</a></div>

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

              
        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Editar Zona Urbana</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>zona_urbana/update" method="POST">-->
                        <?php echo form_open('zona_urbana/update', array('method'=>'POST')); ?>

                            
                            <div class="form-group">
                                <input type="text" hidden="" id="zonaurb_id" name="zonaurb_id">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Descripci&oacute;n</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $lis->zonaurb_id;?>">
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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/edit/ubicacionscript.js"></script>

    <script>
        function agregarform(datos)
        {
             d=datos.split('||');
              $('#zonaurb_id').val(d[0]);
              $('#descripcion').val(d[1]);
              $('#activo').val(d[2]);
        }

    </script>

     <!-- Sweet-Alert  -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
   