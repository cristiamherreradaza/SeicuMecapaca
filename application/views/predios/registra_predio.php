<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<!-- sample modal content -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Mapa de ubicacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            
                aqui el mapa
            <div id="map" height="100%" width="100%">aqui</div>
    
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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
                        <div class="card-body">
                            <h4 class="card-title">Registro de Predio</h4>
                            <h6 class="card-subtitle">Ingrese los datos del predio </h6>

                            <!-- <form action="#" class="validation-wizard wizard-circle"> -->
                        <?php echo form_open('predios/guarda', array('method'=>'POST', 'enctype'=>"multipart/form-data")); ?>

                            <h6>Datos del terreno</h6>
                                <div class="row">
                                    <div class="col-md-9">

                                    <div class="row" style="background-color: #f6f6f6;">

                                        <div class="col-md-2">
                                        <div class="form-group">
                                                <label for="codigo_catastral"> Cod Catastral : <span class="text-danger" autofocus>*</span> </label>
                                                <input type="text" class="form-control" id="codigo_catastral" name="codigo_catastral" placeholder="4012457896" required> 
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="codigo_catastral_anterior"> Cod Cat Ant : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="codigo_catastral_anterior" name="codigo_catastral_anterior" required> 
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="nro_inmueble"> Num inmueble : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="nro_inmueble" name="nro_inmueble" required> 
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="distrito"> Distrito : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="distrito" name="distrito" required> 
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="manzana"> Manzana : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="manzana" name="manzana" required> 
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="predio"> Predio : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="predio" name="predio" required> 
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" style="background-color: #f6f6f6;">

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="tipo_predio_id"> Tpo Predio: <span class="text-danger">*</span> </label>
                                                <?php //echo vdebug($dc_tipos_predio); ?>
                                                <select class="custom-select form-control" id="tipo_predio" name="tipo_predio_id" required>
                                                    <option value="">Seleccione tipo</option>
                                                    <?php foreach ($dc_tipos_predio as $d): ?>
                                                        <option value="<?php echo $d->tipo_predio_id; ?>"><?php echo $d->descripcion; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="zona_econo"> Zona eco : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="zona_econo" name="zona_econo" required> 
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                                <label for="zonaurb_id"> Zona urbana: <span class="text-danger">*</span> </label>
                                                <select class="custom-select form-control" id="zonaurb_id" name="zonaurb_id" required>
                                                    <option value="">Seleccione zona</option>
                                                    <?php foreach ($dc_zona_urbana as $d): ?>
                                                        <option value="<?php echo $d->zonaurb_id; ?>"><?php echo $d->descripcion; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="n_puerta"> Numero puerta : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="n_puerta" name="nro_puerta" required> 
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="latitud"> Latitud : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="latitud" name="latitud" required> 
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="longintud"> Longitud : <span class="text-danger">*</span> </label>
                                                <!-- <input type="text" class="form-control" id="longitud" name="longitud">  -->
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" name="longitud" required>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-warning" type="button" id="google_maps" data-toggle="modal" data-target=".bs-example-modal-lg">Mapa</button>
                                                    </div>
                                                </div>
                                                 <!-- <img src="../assets/images/alert/model2.png" alt="default" data-toggle="modal" data-target=".bs-example-modal-lg" class="model_img img-fluid" /> -->
                                            </div>
                                        </div>

                                        </div>

                                        <div class="row" style="background-color: #fffef7;">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="superficie_geo">Superficie Geo : <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="superficie_geo" name="superficie_geo" required> 
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="superficie_campo">Superficie Campo : <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="superficie_campo" name="superficie_campo" required> 
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="superficie_legal">Superficie Legal : <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="superficie_legal" name="superficie_legal" required> 
                                            </div>
                                        </div>

                                        </div>

                                        <div class="row" style="background-color: #fffef7;">

                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="ubicacion_id"> Ubicacion : <span class="text-danger">*</span> </label>
                                                <?php //echo vdebug($dc_tipos_predio); ?>
                                                <select class="custom-select form-control" id="ubicacion_id" name="ubicacion_id" required>
                                                    <option value="">Seleccione ubicacion</option>
                                                    <?php foreach ($dc_ubicacion as $d): ?>
                                                    <option value="<?php echo $d->ubicacion_id; ?>">
                                                        <?php echo $d->descripcion; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pendiente_id"> Pendiente : <span class="text-danger">*</span> </label>
                                                <?php //echo vdebug($dc_tipos_predio); ?>
                                                <select class="custom-select form-control" id="pendiente_id" name="pendiente_id" required>
                                                    <option value="">Seleccione pendiente</option>
                                                    <?php foreach ($dc_pendiente as $d): ?>
                                                    <option value="<?php echo $d->pendiente_id; ?>">
                                                        <?php echo $d->descripcion; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <?php //echo vdebug($dc_tipos_predio); ?>
                                                <label for="nivel_id"> Nivel : <span class="text-danger">*</span> </label>
                                                <select class="custom-select form-control" id="nivel_id" name="nivel_id" required>
                                                    <option value="">Seleccione nivel</option>
                                                    <?php foreach ($dc_nivel as $d): ?>
                                                    <option value="<?php echo $d->nivel_id; ?>">
                                                        <?php echo $d->descripcion; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <?php //echo vdebug($dc_tipos_predio); ?>
                                                <label for="forma_id"> Forma : <span class="text-danger">*</span> </label>
                                                <select class="custom-select form-control" id="forma_id" name="forma_id" required>
                                                    <option value="">Seleccione zona</option>
                                                    <?php foreach ($dc_forma as $d): ?>
                                                    <option value="<?php echo $d->forma_id; ?>">
                                                        <?php echo $d->descripcion; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        </div>

                                        <div class="row" style="background-color: #f6f6f6;">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="c_principal">Calle Principal : <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="c_principal" name="principal" required> 
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="zona">Zona : <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="zona" name="zona" required> 
                                            </div>
                                        </div>

                                        </div>

                                        <div class="row" style="background-color: #f6f6f6;">

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="frente">Frente : <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="frente" name="frente" required> 
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="fondo">Fondo : <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="fondo" name="fondo" required> 
                                            </div>
                                        </div>

                                        <div class="col-md-2" style="background-color: #f6f6f6;">
                                            <div class="form-group">
                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                                <label for="forma_id"> Clase Predio : <span class="text-danger">*</span> </label>
                                                <select class="custom-select form-control" id="forma_id" name="clase_predio_id" required>
                                                    <option value="">Seleccione clase</option>
                                                    <?php foreach ($dc_clase_predio as $d): ?>
                                                        <option value="<?php echo $d->clase_predio_id; ?>"><?php echo $d->descripcion; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>                                    

                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                                <label for="forma_id"> Uso Suelo : <span class="text-danger">*</span> </label>
                                                <select class="custom-select form-control" id="forma_id" name="uso_suelo_id" required>
                                                    <option value="">Seleccione clase</option>
                                                    <?php foreach ($dc_uso_suelo as $d): ?>
                                                        <option value="<?php echo $d->uso_suelo_id; ?>"><?php echo $d->descripcion; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="forma">Matriz PH : <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="forma" name="matriz_ph" required> 
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                                <label for="forma_id"> Edificio : <span class="text-danger">*</span> </label>
                                                <select class="custom-select form-control" id="forma_id" name="edificio_id" required>
                                                    <option value="">Seleccione edificio</option>
                                                    <?php foreach ($dc_edificio as $d): ?>
                                                        <option value="<?php echo $d->edificio_id; ?>"><?php echo $d->descripcion; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        </div>

                                        <div class="row">

                                        <div class="col" style="background-color: #f7f9ff;">
                                        <label for="forma_id"> Servicios Basicos : <span class="text-danger">*</span> </label>

                                            <div class="form-group row pt-12">
                                                <div class="col-sm-12">
                                                    <?php foreach ($listado_servicios as $key => $ls): ?>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="dervicios][<?php echo $key; ?>]" value="<?php echo $ls->servicio_id; ?>" id="customCheck<?php echo $key; ?>">
                                                            <label class="custom-control-label" for="customCheck<?php echo $key; ?>"><?php echo $ls->descripcion ?></label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="col"  style="background-color: #fffef7;">
                                            <div class="form-group">
                                                <label for="observaciones">Observaciones : </label>
                                                <input type="text" class="form-control" id="observaciones" name="dbservaciones]"> 
                                            </div>
                                        </div>

                                        </div>

                                    </div>

                                    <div class="col-md-3">

                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Foto Plano</h4>
                                                <label for="input-file-now">Adjunte la foto del plano</label>
                                                <input type="file" id="input-file-now" class="dropify" name="foto_plano" />
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Foto Fachada</h4>
                                                <label for="input-file-now">Adjunte la foto de la fachada</label>
                                                <input type="file" id="input-file-now" class="dropify" name="foto_fachada" />
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                            <input type="submit" value="Guardar">
                            </form>                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript">
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 43.5293101, lng: -5.6773233},
          zoom: 13
      });
    }
</script>
    <script type="text/javascript">
        $("#codigo_catastral").focusout(function(){
            // alert('Demo');
            var cod_catastral = $("#codigo_catastral").val();
            var predio = cod_catastral.substr(0, 3);
            var distrito = cod_catastral.substr(3, 3);
            var manzana = cod_catastral.substr(6, 9);
            // console.log(predio);
            // console.log(distrito);
            // console.log(manzana);
            $("#distrito").val(distrito);
            $("#manzana").val(manzana);
            $("#predio").val(predio);

            $("#distrito").prop('readonly', true);
            $("#manzana").prop('readonly', true);
            $("#predio").prop('readonly', true);

        });
    </script>