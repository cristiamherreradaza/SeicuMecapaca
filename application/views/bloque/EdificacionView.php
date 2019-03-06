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
                        <h4 class="card-title">Datos Edificaciones</h4>
                        <h6 class="card-subtitle">Material de Construccion</h6>
                        <?php /*
                        $max = sizeof($result_array);
                        echo $max;

                        for ($i = 0; $i < $max ; $i++) {

                           //$last_names = array_column($result_array, 'alias');
                           
                         echo "<pre>";                                                                         
                         print_r($result_array[$i]['alias']);
                         echo "</pre>"; }*/

                         ?>

                         
                         <!-- Step 1 -->
                         <h6>Step 1</h6>
                         <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg">
                            Nuevo Bloque
                        </button>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">

                                    <!-- sample modal content -->
                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myLargeModalLabel">Datos Bloque</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>

                                                <div class="modal-body">

                                                    <?php echo form_open('edificacion/create', array('method'=>'POST')); ?>

                                                    <div class="row">
                                                        <!-- column -->                                                              

                                                        <div class="col-lg-7">
                                                    


                                                       </div><!--col-lg-7-->


                                                       <div class="col-lg-5">
                                                        <h6 class="card-subtitle">Caracteristicas de la construccion</h6>
                                                        <div class="row">
                                                            <!--test-->
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="location1">Nro de Bloque:</label>
                                                                    <select class="custom-select form-control" id="nro_bloque" name="nro_bloque">
                                                                        <option value="">Seleccionar</option>                                                                           
                                                                        <option value="11">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="wfirstName2">Nombre de Bloque : <span class="danger">*</span> </label>
                                                                    <input type="text" class="form-control required" id="nom_bloque" name="nom_bloque">
                                                                </div>
                                                            </div>
                                                        </div>                                                  
                                                
                                               
                                               
                                             

                                        </div><!--fin col-lg-5-->
                                    </div><!--fin column-->                                        


                                       <button type="submit" class="btn btn-success" value="save">Guardar</button>
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Cancelar</button>
                                               <?php echo form_close(); ?>


                               </div><!--fin modal body-->    

                                <div class="modal-footer">


                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->


                </div>
            </div>
        </div>
        <!-- div-boton--nuevo-->


        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Bloques Registrados</h4>
                <h6 class="card-subtitle">...</h6>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nro de bloque</th>
                                <th>Nombre</th>
                                <th>Estado fisico</th>
                                <th>Año construccion</th>
                                <th>Destino</th>
                                <th>Uso</th>
                            </tr>
                        </thead>
                        <tbody>


                         <?php foreach($bloques as $row) {?>
                            <tr>
                              <th scope="row"><?php echo $row->nro_bloque; ?></th>
                              <td><?php echo $row->nom_bloque; ?></td>
                              <td><?php echo $row->estado_fisico; ?></td>
                              <td><?php echo $row->anio_cons; ?></td>
                              <td><?php echo $row->destino_bloque_id; ?></td>
                              <td><?php echo $row->uso_bloque_id; ?> </td>
                              <td>
                               <a href="<?php echo site_url('edificacion/edit');?>/<?php echo $row->bloque_id;?>"><button type="button" class="btn btn-warning">Editar</button></a> 
                               <a href="<?php echo site_url('edificacion/delete');?>/<?php echo $row->bloque_id;?>"><button type="button" class="btn btn-danger">Eliminar</button></a>

                           </td>


                       </tr>
                   <?php } ?> 

               </tbody>
           </table>
       </div>
   </div>
</div>







<!--</form>-->
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