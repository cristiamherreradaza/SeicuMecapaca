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

                        <?php 
                        /*$max = sizeof($grupos_subgrupos);
                        echo $max;

                        for ($i = 0; $i < $max ; $i++) {

                           //$last_names = array_column($result_array, 'alias');
                           
                         echo "<pre>";                                                                         
                         print_r($grupos_subgrupos[$i]['desc_grupo']);
                         echo "</pre>"; }*/


                        ?>
                        <!-- Step 2 -->

                        <div class="row page-titles">
                            <div class="col-md-6 col-8 align-self-center">
                                <h3 class="text-themecolor mb-0 mt-0">Registro Bloque Nro: <?php echo $nro_bloque; ?></h3>

                            </div>
                            <div class="col-md-6 col-4 align-self-center">
                                <button class="btn float-right hidden-sm-down btn-success">Cod. Catastral: <?php echo $cod_catastral; ?>
                                </button>
                            </div>
                        </div>
                        <?php echo form_open('Edificacion/create', array('method' => 'POST')); ?>

                        <input type="hidden" class="form-control required" id="cod_catastral" name="cod_catastral" readonly="" value="<?php echo $cod_catastral; ?>">
                        <input type="hidden" class="form-control required" id="nro_bloque" name="nro_bloque" readonly="" value="<?php echo $nro_bloque; ?>">
                        <h4>Caracteristicas de la construccion</h4>


                        <div class="row">
                            <!-- column -->


                            <div class="col-lg-3">
                                <!--grid 1-->
                                <div class="container-fluid">


                                    <?php 
                                    $max = sizeof($grupos_subgrupos);
                                    $long = $max - 1;
                                    $count = 0; //contador de las sumas

                                    $ngrupos = sizeof($grupos);
                                    $longgrupo = $ngrupos - 1;
                                    $cant = $longgrupo / 3;
                                    $cantgrupos = round($cant, 0);


                                    $count2 = 0; //contador de los ciclos

                                    $pos = 0; //posicion final de la ultima grid                                                                        


                                    for ($i = 0; $i < $max; $i++) { ?>

                                    <?php 

                                    if ($i == 0) {  ?>
                                    <hr>
                                    <div class="row" style="background-color:Ivory;">
                                        <div class="col-sm-5 col-md-8 " style="background-color:Ivory">
                                            <h6> <b> <?php print_r($grupos_subgrupos[$i]['desc_grupo']); ?> </b></h6>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;"><small><i>Porcentaje %</i></small>
                                        </div>
                                    </div>
                                    <?php 
                                } else { ?>

                                    <?php 
                                } ?>
                                    <div class="row" style="background-color:Ivory;">
                                        <input type="hidden" class="form-control required" id="tam_grup_sub" name="tam_grup_sub" readonly="" value="<?php echo $max; ?>">

                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:Ivory">
                                            <small><i>
                                                    <?php 
                                                    print_r($grupos_subgrupos[$i]['desc_item']);
                                                    ?></i></small>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;">

                                            <input type="hidden" class="form-control required" id="<?php echo $i; ?>a" name="<?php echo $i; ?>a" readonly="" value="<?php 
                                                                                                                                                                    echo $grupos_subgrupos[$i]['grupo_mat_id'];
                                                                                                                                                                    ?>">
                                            <input type="hidden" class="form-control required" id="<?php echo $i; ?>b" name="<?php echo $i; ?>b" readonly="" value="<?php 
                                                                                                                                                                    echo $grupos_subgrupos[$i]['mat_item_id'];
                                                                                                                                                                    ?>">
                                            <input type="number" class="form-control sumcontrol<?php echo $count ?>" name="<?php echo $i; ?>c" required value="0" size="3" min="0">
                                        </div>
                                    </div>

                                    <?php $j = $i + 1;
                                    if ($i == $long) { ?>
                                    <?php $j = $i; ?>
                                    <div class="row" style="background-color:White;">

                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" value="" readonly />
                                            <div class="form-control-feedback" Style="color:red;"><small id="validsuma<?php echo $count ?>"><i></i></small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php 
                                } ?>
                                    <?php 

                                    if ($grupos_subgrupos[$i]['grupo_mat_id'] != $grupos_subgrupos[$j]['grupo_mat_id']) {  ?>

                                    <div class="row" style="background-color:White;">

                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0 " style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" value="" readonly />
                                            <div class="form-control-feedback" Style="color:red;"><small id="validsuma<?php echo $count ?>"><i></i></small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php 
                                    $count2++;
                                    //echo $count2;
                                    if ($count2 < $cantgrupos) { ?>
                                    <p></p>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-md-8" style="background-color:Ivory">
                                            <h6> <b><?php 
                                                    print_r($grupos_subgrupos[$j]['desc_grupo']);
                                                    ?></h6></b>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;"><small><i>Porcentaje %</i></small>
                                        </div>
                                    </div>

                                    <?php 
                                } ?>

                                    <?php 
                                    if ($count2 == $cantgrupos) { ?>

                                    <?php $pos = $i;
                                    $i = $long;
                                } ?>

                                    <?php $count++;
                                } ?>
                                    <?php 
                                } ?>

                                </div>
                                <!--FIN container-->


                            </div>
                            <!--col-lg-10-->


                            <div class="col-lg-3">
                                <!--grid 2-->
                                <div class="container-fluid">
                                    <?php 
                                    $max = sizeof($grupos_subgrupos);
                                    $long = $max - 1;
                                    //$count=0;//contador de las sumas

                                    $ngrupos = sizeof($grupos);
                                    $longgrupo = $ngrupos - 1;
                                    $cant = $longgrupo / 3;
                                    $cantgrupos = round($cant, 0);
                                    $count3 = $cantgrupos * 2; //contador de los ciclos


                                    for ($i = $pos + 1; $i < $max; $i++) { ?>

                                    <?php 

                                    if ($i == $pos + 1) {  ?>
                                    <hr>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-md-8" style="background-color:Ivory">
                                            <h6> <b> <?php 
                                                        print_r($grupos_subgrupos[$i]['desc_grupo']);
                                                        ?> </b> </h6>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;"><small><i>Porcentaje %</i></small>
                                        </div>
                                    </div>
                                    <?php 
                                } else { ?>

                                    <?php 
                                } ?>
                                    <div class="row" style="background-color:Ivory;">
                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:Ivory">
                                            <small><i>
                                                    <?php 
                                                    print_r($grupos_subgrupos[$i]['desc_item']);
                                                    ?>
                                                </i></small>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;">
                                            <input type="hidden" class="form-control required" id="<?php echo $i; ?>a" name="<?php echo $i; ?>a" readonly="" value="<?php 
                                                                                                                                                                    echo $grupos_subgrupos[$i]['grupo_mat_id'];
                                                                                                                                                                    ?>">
                                            <input type="hidden" class="form-control required" id="<?php echo $i; ?>b" name="<?php echo $i; ?>b" readonly="" value="<?php 
                                                                                                                                                                    echo $grupos_subgrupos[$i]['mat_item_id'];
                                                                                                                                                                    ?>">
                                            <input type="number" class="form-control sumcontrol<?php echo $count ?>" name="<?php echo $i; ?>c" required value="0" size="3" min="0">

                                        </div>
                                    </div>

                                    <?php $j = $i + 1;
                                    if ($i == $long) { ?>
                                    <?php $j = $i; ?>
                                    <div class="row" style="background-color:White;">

                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" readonly />
                                            <div class="form-control-feedback" Style="color:red;"><small id="validsuma<?php echo $count ?>"><i></i></small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php 
                                } ?>
                                    <?php 

                                    if ($grupos_subgrupos[$i]['grupo_mat_id'] != $grupos_subgrupos[$j]['grupo_mat_id']) {  ?>

                                    <div class="row" style="background-color:White;">

                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" value="" readonly />
                                            <div class="form-control-feedback" Style="color:red;"><small id="validsuma<?php echo $count ?>"><i></i></small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <?php 
                                    $count2++; //echo $count2;
                                    if ($count2 < $count3) { ?>
                                    <p></p>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-md-8" style="background-color:Ivory">
                                            <h6> <b> <?php 
                                                        print_r($grupos_subgrupos[$j]['desc_grupo']);
                                                        ?></h6> </b>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;"><small><i>Porcentaje %</i></small>
                                        </div>
                                    </div>
                                    <?php 
                                } ?>

                                    <?php 
                                    if ($count2 == $count3) { ?>

                                    <?php $pos = $i;
                                    $i = $long;
                                } ?>

                                    <?php $count++;
                                } ?>
                                    <?php 
                                } ?>

                                </div>
                                <!--FIN container-->
                            </div>
                            <!--col-lg-10-->
                            <div class="col-lg-3">
                                <!--grid 2-->
                                <div class="container-fluid">


                                    <?php 
                                    $max = sizeof($grupos_subgrupos);
                                    $long = $max - 1;
                                    //$count=0;//contador de las sumas

                                    $ngrupos = sizeof($grupos);
                                    $longgrupo = $ngrupos;
                                    $cant = $longgrupo / 3;
                                    $cantgrupos = round($cant, 0);
                                    $count3 = $cantgrupos * 2; //contador de los ciclos

                                    for ($i = $pos + 1; $i < $max; $i++) { ?>

                                    <?php 

                                    if ($i == $pos + 1) {  ?>
                                    <hr>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-md-8" style="background-color:Ivory">
                                            <h6> <b> <?php 
                                                        print_r($grupos_subgrupos[$i]['desc_grupo']);
                                                        ?></h6> </b>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;"><small><i>Porcentaje %</i></small>
                                        </div>
                                    </div>
                                    <?php 
                                } else { ?>

                                    <?php 
                                } ?>
                                    <div class="row" style="background-color:White;">

                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:Ivory">
                                            <small><i> <?php 
                                                        print_r($grupos_subgrupos[$i]['desc_item']);
                                                        ?></i></small>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;">
                                            <input type="hidden" class="form-control required" id="<?php echo $i; ?>a" name="<?php echo $i; ?>a" readonly="" value="<?php 
                                                                                                                                                                    echo $grupos_subgrupos[$i]['grupo_mat_id'];
                                                                                                                                                                    ?>">
                                            <input type="hidden" class="form-control required" id="<?php echo $i; ?>b" name="<?php echo $i; ?>b" readonly="" value="<?php 
                                                                                                                                                                    echo $grupos_subgrupos[$i]['mat_item_id'];
                                                                                                                                                                    ?>">
                                            <input type="number" class="form-control sumcontrol<?php echo $count ?>" name="<?php echo $i; ?>c" value="0" size="3" min="0">
                                        </div>
                                    </div>

                                    <?php $j = $i + 1;
                                    if ($i == $long) { ?>
                                    <?php $j = $i; ?>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" value="" readonly />
                                            <div class="form-control-feedback" Style="color:red;"><small id="validsuma<?php echo $count ?>"><i></i></small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <?php 
                                } ?>
                                    <?php 

                                    if ($grupos_subgrupos[$i]['grupo_mat_id'] != $grupos_subgrupos[$j]['grupo_mat_id']) {  ?>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" value="" readonly />
                                            <div class="form-control-feedback" Style="color:red;"><small id="validsuma<?php echo $count ?>"><i></i></small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php 
                                    $count2++;
                                    //echo $count2;
                                    if ($count2 < $longgrupo) { ?>
                                    <p></p>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-md-8" style="background-color:Ivory">
                                            <h6> <b>
                                                    <?php 
                                                    print_r($grupos_subgrupos[$j]['desc_grupo']);
                                                    ?></h6></b>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;"><small><i>Porcentaje %</i></small>
                                        </div>
                                    </div>
                                    <?php 
                                } ?>
                                    <?php $count++;
                                } ?>
                                    <?php 
                                } ?>
                                </div>
                                <!--FIN container-->
                            </div>
                            <!--col-lg-10-->
                            <div class="col-lg-3">
                                <h6 class="card-subtitle">Caracteristicas de la construccion</h6>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wfirstName2">Nombre de Bloque :<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control required" id="nom_bloque" name="nom_bloque" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wfirstName2">Año de construccion: <span class="text-danger"> *</span></label>
                                            <input type="number" size="4" class="form-control required" id="anio_cons" name="anio_cons" min="1000" max="2019" required>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wfirstName2">Año de remodelacion: <span class="text-danger"> *</span></label>
                                            <input type="number" size="4" class="form-control required" id="anio_remo" name="anio_remo" min="1000" max="2019" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="location1">Destino :<span class="text-danger"> *</span></label>
                                            <select class="custom-select form-control" id="destino_bloque_id" name="destino_bloque_id" required>
                                                <option value="">Seleccione destino</option>
                                                <?php foreach ($destino_bloque as $d) : ?>
                                                <option value="<?php echo $d->destino_bloque_id; ?>"><?php echo $d->descripcion; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="location1">Uso :<span class="text-danger"> *</span></label>
                                            <select class="custom-select form-control" id="uso_bloque_id" name="uso_bloque_id" required>
                                                <option value="">Seleccione Uso</option>
                                                <?php foreach ($destino_uso as $du) : ?>
                                                <option value="<?php echo $du->uso_bloque_id; ?>"><?php echo $du->descripcion; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">                                            
                                            <label for="wfirstName2">Estado Fisico : <span class="text-danger"> *  <small> </small> </span> </label>
                                            <input type="text" class="form-control"  id="estado_fisico" name="estado_fisico"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wfirstName2">Altura : <span class="text-danger"> * (90.1) <small> metros </small> </span> </label>
                                            <input type="number" class="form-control" step='0.1' id="altura" name="altura" value="0.0" required>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="card-subtitle">Superficie de la Planta</h6>
                                <!--modal-->

                                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Registro de niveles</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                                            </div>
                                            <div class="modal-body">                                                                                                
                                                    
                                                    <div class="row" >
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="location1">Tipo de planta :<span class="text-danger"> *</span></label>
                                                                <select class="custom-select form-control" id="tipo_planta_id" name="tipo_planta_id">
                                                                    <option value="">Seleccione Tipo de planta</option>
                                                                    <?php foreach ($tipo_planta as $tp) : ?>
                                                                    <option value="<?php echo $tp->tipo_planta_id; ?>"><?php echo $tp->descripcion; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="wfirstName2">Nivel : <span class="text-danger"> * <small>metros</small></span> </label>
                                                                <input type="number" class="form-control" step='1' id="nivel" name="nivel" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="wfirstName2">Superficie : <span class="text-danger"> * <small>metros</small></span> </label>
                                                                <input type="number" class="form-control" step='0.100' id="superficie" name="superficie" value="0.00">
                                                            </div>
                                                        </div>
                                                    </div>

                                              
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar</button>
                                                <button type="button" class="btn btn-success waves-effect waves-light" id="bt_add" >Agregar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--fin modal-->




                                <div class="row" >
                                    <div class="col-md-12">                                        
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#responsive-modal">Adicionar Niveles</button>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="detalles" class="table table-hover no-wrap">
                                                <thead>
                                                    <tr>
                                                        <th>Planta</th>
                                                        <th>Nivel</th>
                                                        <th>Sup. mts</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <!--fin col-lg-5-->
                        </div>
                        <!--fin column-->
                        <div class="col-md-12" align="right">
                            <button type="submit" class="btn btn-info" value="save" id="">Guardar</button>
                            <a class="btn btn-danger" href="<?php echo site_url('edificacion/nuevo'); ?>/<?php echo $cod_catastral ?>" align="right">Cancelar</a>
                        </div>
                        </form>
                    </div>
                    <!--</form>-->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#bt_add').click(function() {
            agregar();
            $('#responsive-modal').modal('hide');
        });
    });
    var cont_n = 0;
    estado = 0;
    total = 0;
    subtotal = [];
    $("#guardar").hide();

    function agregar() {
        tipo_planta_id = $("#tipo_planta_id").val();
        tipo_planta = $("#tipo_planta_id option:selected").text();
        idnivel = $("#nivel").val();
        nivel = $("#nivel option:selected").text();
        superficie = $("#superficie").val();

        if (tipo_planta_id != "" && idnivel != "" && superficie != "") {
            total = total++;
            var fila = '<tr class="selected" id="fila' + cont_n + '"><td><input type="hidden" name="id_tipo_planta[]" value="' + tipo_planta_id + '">' + tipo_planta + '</td><td><input type="hidden" name="niveles[]" value="' + idnivel + '">' + idnivel + '</td><td><input type="hidden" name="superficies[]" value="' + superficie + '">' + superficie + '</td><td><button type="button" cLass="btn btn-danger" onclick="eliminar(' + cont_n + ');"><span class="fas fa-trash-alt" aria-hidden="true"></span></button></td></tr>';
            cont_n++;
            limpiar();
            evaluar();
            $('#detalles').append(fila);
        } else {
            alert("los campos estan vacios");
        }
    }

    function limpiar() {
        $("#tipo_planta_id").val(""); //id
        $("#nivel").val("0");
        $("#superficie").val("0.00");
    }

    function evaluar() {
        if (cont_n > 0) {
            $("#guardar").show();
        } else {
            $("#guardar").hide();
        }
    }

    function eliminar(index) {
        total = total - 1;
        $("#fila" + index).remove();
        evaluar();
    }
</script>


<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== --> 