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
                            <section>
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
                                                       
                                                        <?php echo form_open('Edificacion/create', array('method'=>'POST')); ?>
                                                           
                                                            <div class="row">
                                                                <!-- column -->                                                              

                                                            <div class="col-lg-7"><!--TABLES-->
                                                                    <div class="container-fluid">
                                                                    <h3>Tabla de estructuras</h3>                                                                      
                                                                      <div class="row" style="background-color:White;">
                                                                        <div class="col-sm-5 col-md-4" style="background-color:LightGray">Estructura</div>
                                                                        <div class="col-sm-5 col-sm-offset-2 col-md-5 col-md-offset-0" style="background-color:lightyellow">Ladrillo</div>
                                                                        <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-0" style="background-color:White;"><input type="text" class="form-control sumcontrol" ></div>
                                                                    </div>
                                                                     <div class="row" style="background-color:White;">
                                                                        <div class="col-sm-5 col-md-4" style="background-color:lightgray;">Estructura</div>
                                                                        <div class="col-sm-5 col-sm-offset-2 col-md-5 col-md-offset-0" style="background-color:lightyellow;">Cemento</div>
                                                                        <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-0" style="background-color:White;"><input type="text" class="form-control sumcontrol" ></div>
                                                                             </div>

                                                                              <div class="row" style="background-color:White;">
                                                                        <div class="col-sm-5 col-md-4" style="background-color:lightgray;">Estructura</div>
                                                                        <div class="col-sm-5 col-sm-offset-2 col-md-5 col-md-offset-0" style="background-color:lightyellow;">Metal</div>
                                                                        <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-0" style="background-color:White;"><input type="text" class="form-control sumcontrol" ></div>
                                                                             </div>
                                                                              <div class="row" style="background-color:White;">
                                                                        <div class="col-sm-5 col-md-4" style="background-color:White;"></div>
                                                                        <div class="col-sm-5 col-sm-offset-2 col-md-5 col-md-offset-0" style="background-color:White;">Total</div>
                                                                        <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-0" style="background-color:White;" align="right">
                                                                               <input type="text" class="form-control total" value="" />
                                                                                    <div id="validsuma" Style="color:red;"></div>
                                                                        </div>
                                                                             </div>
                                                                </div><!--FIN TABLES-->

                                                           





                                                       </div>


                                                       <div class="col-lg-5">
                                                        <h6 class="card-subtitle">Caracteristicas de la construccion</h6>
                                                        <div class="row">
                                                            <!--test-->
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="location1">Nro de Bloque:</label>
                                                                    <select class="custom-select form-control" id="nro_bloque" name="nro_bloque">
                                                                        <option value="">Seleccionar</option>                                                                           
                                                                        <option value="B1">1</option>
                                                                        <option value="B2">2</option>
                                                                        <option value="B3">3</option>
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

                                                        <div class="row">
                                                            <!--test-->
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="location1">Año de construccion:</label>
                                                                    <select class="custom-select form-control" id="anio_cons" name="anio_cons">
                                                                        <option value="">Seleccionar</option>                                                                           
                                                                        <option value="1950">1950</option>
                                                                        <option value="1920">1920</option>
                                                                  
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="location1">Año de remodelacion:</label>
                                                                    <select class="custom-select form-control" id="anio_remo" name="anio_remo">
                                                                        <option value="">Seleccionar</option>                                                                           
                                                                        <option value="1950">1950</option>
                                                                        <option value="1920">1920</option>
                                                                  
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row">

                                                        <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="location1">Destino :</label>
                                                                    <select class="custom-select form-control" id="destino_bloque_id" name="destino_bloque_id">
                                                                        

                                                                        <?php foreach ($destino_bloque as $d): ?>
                                                                            <option value="<?php echo $d->destino_bloque_id; ?>"><?php echo $d->descripcion; ?></option>
                                                                        <?php endforeach; ?>



                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="location1">Uso :</label>
                                                                    <select class="custom-select form-control" id="uso_bloque_id" name="uso_bloque_id">
                                                                       <?php foreach ($destino_uso as $du): ?>
                                                                        <option value="<?php echo $du->uso_bloque_id; ?>"><?php echo $du->descripcion; ?></option>
                                                                    <?php endforeach; ?>



                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="location1">Estado Fisico :</label>
                                                                <select class="custom-select form-control" id="estado_fisico" name="estado_fisico">
                                                                    <option value="">Seleccionar</option>
                                                                    <option value="Bueno">Bueno</option>
                                                                    <option value="Preacrio">Precario</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <h6 class="card-subtitle">Superficie de la Planta</h6>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="location1">Nivel :</label>
                                                                <select class="custom-select form-control" id="nivel" name="nivel">
                                                                    <option value="">Seleccionar</option>
                                                                    <option value="-1">-1</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="location1">Tipo de planta :</label>
                                                                <select class="custom-select form-control" id="tipo_planta_id" name="tipo_planta_id">
                                                                   <?php foreach ($tipo_planta as $tp): ?>
                                                                    <option value="<?php echo $tp->tipo_planta_id; ?>"><?php echo $tp->descripcion; ?></option>
                                                                <?php endforeach; ?>                                                                          
                                                            </select>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="wfirstName2"> Superficie : <span class="danger">*</span> </label>
                                                            <input type="text" class="form-control required" id="superficie" name="superficie">
                                                        </div>
                                                    </div>
                                                </div>                                             
                                            </div>
                                        </div>                                        
                                        <button type="submit" class="btn btn-success" value="save">Guardar</button>
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Cancelar</button>
                                    </form>


                                </div>
                              
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
                                <th>Nivel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Bloque A</td>
                                <td>Bueno</td>
                                <td>1950</td>
                                <td>Vivienda</td>
                                <td>Planta Baja</td>
                            </tr>    
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </section>


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