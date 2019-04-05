<link href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css" rel="stylesheet">
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
                <div class="card wizard-content">

                    <div class="card-body">


                        <div class="row page-titles">
                            <div class="col-md-6 col-8 align-self-center">
                                <h4 class="card-title">Datos Tipo de Documento</h4>                                
                            </div>
                           
                        </div>
                       
                        <p></p>
                       
                         <!-- Step 1 -->                         
                         <div class="row" >
                                <div class="col-md-12">                                        
                                    <button <?php echo $verifica['alta']; ?> type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_insertar"><i class="mdi mdi-plus"></i> Nuevo Documento</button>
                                </div>
                        </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Documentos Registrados</h4>                                        
                                        <div class="table-responsive m-t-40">
                                            <table id="documento_table" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>descripcion</th>                                                        
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data_tdoc as $row) { $datos = $row->tipo_documento_id."||".
                                                         $row->documento; ?>
                                                    <tr>
                                                        <td scope="row"><?php echo $row->tipo_documento_id; ?></td>
                                                        <td><?php echo $row->documento; ?></td>                                                                                                             
                                                        <td>
                                                        <button <?php echo $verifica['modificacion']; ?> type="button" class="btn btn-warning footable-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')">
                                                            <span class="fas fas fa-edit" aria-hidden="true">
                                                            </span>
                                                        </button>                                                        
                                                        <a <?php echo $verifica['baja'];?>="<?php echo site_url('tipo_documento/delete'); ?>/<?php echo $row->tipo_documento_id; ?>"><button type="button" class="btn btn-danger"><span class="fas fa-trash-alt" aria-hidden="true"></span></button></a>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                } ?>
                                                </tbody>
                                            </table>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modal_insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Insertar nuevo documento</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>zona_urbana/insertar" method="POST">-->
                        <?php echo form_open('tipo_documento/create', array('method'=>'POST', 'id'=>'insertar')); ?>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Documento</label>
                                <input type="text" class="form-control" id="documento" name="documento">
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
        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Editar Grupo Material</h4>
                    </div>
                    <div class="modal-body">                        
                        <?php echo form_open('tipo_documento/update', array('method'=>'POST')); ?>                            
                            <div class="form-group">
                                <input type="text" class="form-control" hidden="" id="tipo_documento_id_e" name="tipo_documento_id_e">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Documento</label>
                                <input type="text" class="form-control" id="documento_e" name="documento" >
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



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== --> 
        <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
        <script>
        function agregarform(datos)
        {
             d=datos.split('||');
              $('#tipo_documento_id_e').val(d[0]);
              $('#documento_e').val(d[1]);
        }
    </script>
        