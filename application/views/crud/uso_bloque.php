
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
                        ADMINISTRACI&Oacute;N USO BLOQUE <?php $i=1; //echo $data['title']; ?>
                        <div class="card-body wizard-content">
                            <div class="col-lg-2 col-md-4">
                                <button type="button" class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#Modal_insert">Nueva Uso Bloque</button>
                            </div><div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Descripci&oacute;n</th>
                                                <th>Alias</th>
                                                <th>Coeficientes</th>
                                                <th>Acci&oacute;n</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($uso_bloque as $lis){
                                                 $datos = $lis->uso_bloque_id."||".
                                                         $lis->descripcion."||".
                                                         $lis->alias."||".
                                                         $lis->coeficiente;
                                                
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $lis->descripcion;?></td>
                                                <td><?php echo $lis->alias;?></td>
                                                <td><?php echo $lis->coeficiente;?></td>
                                                <td>
                                                    <div id="izquierda"><a href="" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')"><i class="fas fa-edit"></i> Editar</a></div>

                                                    <div id="derecha"><a href="<?= base_url('uso_bloque/eliminar/'. $lis->uso_bloque_id); ?>"><i class="fas fa-trash-alt"></i>Borrar</a></div>
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
                        <h4 class="modal-title" id="exampleModalLabel1">Editar Ubicaci&oacute;n</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url();?>uso_bloque/update" method="POST">

                            <div class="form-group">
                                <input type="text" hidden="" id="uso_bloque_id" name="uso_bloque_id">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Descripci&oacute;n</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Alias</label>
                                <input type="text" class="form-control" id="alias" name="alias">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Coeficiente</label>
                                <input type="integer" class="form-control" id="coeficiente" name="coeficiente">
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
                        <h4 class="modal-title" id="exampleModalLabel1">Insertar Uso Bloque</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url();?>uso_bloque/insertar" method="POST">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Descripci&oacute;n</label>
                                <input type="text" class="form-control" id="recipient-name1" name="descripcion">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Alias</label>
                                <input type="text" class="form-control" id="recipient-name1" name="alias">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Coeficiente</label>
                                <input type="integer" class="form-control" id="recipient-name1" name="coeficiente">
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
     <script>
        function agregarform(datos)
        {
             d=datos.split('||');
              $('#uso_bloque_id').val(d[0]);
              $('#descripcion').val(d[1]);
              $('#alias').val(d[2]);
              $('#coeficiente').val(d[3]);
        }

    </script>