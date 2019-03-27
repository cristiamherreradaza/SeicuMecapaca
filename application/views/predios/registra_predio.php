<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">
<!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.9/dist/vue.js"></script> -->

<!-- sample modal content -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Mapa de ubicacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!-- <div id="map" style="width: 100%; height: 650px;"></div> -->
                <!-- <div id="carga_ajax_mapa"></div> -->
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <h4 class="card-title">
                                Registro de Predio
                                <button type="button" class="btn waves-effect waves-light btn-success" id="btn_sel_predio">Seleccionar predio</button>
                            </h4>
                            <div id="muestra_mapa" style="display: none;">
                                <div id="map" style="width: 100%; height: 650px;"></div>
                                <div style="width: 100%;">
                                    <button class="btn btn-block btn-warning" type="button" id="btn_finalizado">FINALIZADO</button>
                                </div>
                            </div>

                            <!-- <h6 class="card-subtitle">Ingrese los datos del predio </h6> -->
                            <br />
                            <span class="metadata-marker" style="display: none;" data-region_tag="html-body"></span>

                            <div class="row">

                                <div class="col-md-4">
                                    <button class="btn btn-block btn-info" type="button"><span class="btn-label">1</span> REGISTRO DEL PREDIO</button>
                                </div>

                                <div class="col-md-4">
                                    <button class="btn btn-block btn-outline-info waves-effect waves-light" type="button"><span class="btn-label">2</span> REGISTRO DE BLOQUES</button>
                                </div>

                                <div class="col-md-4">
                                    <button class="btn btn-block btn-outline-info waves-effect waves-light" type="button"><span class="btn-label">3</span> REGISTRO DE PROPIETARIO</button>
                                </div>
                            </div>
                            <p></p>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 30%; height:15px;" role="progressbar"> 30% </div>
                            </div>
                            <p></p>

                            <!-- <form action="#" class="validation-wizard wizard-circle"> -->
                            <?php // echo form_open('predios/guarda', array('method'=>'POST', 'enctype'=>"multipart/form-data")); ?>
                            <?php echo form_open_multipart('predios/guarda', array('method'=>'POST')); ?>

                            <h6>Datos del terreno</h6>
                                <div class="row">
                                    <div class="col-md-9">

                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <label for="codigo_catastral"> Cod Catastral : <span class="text-danger">*</span> </label>
                                                <textarea rows="4" class="form-control" id="cod_referencial"></textarea>
                                                <div style="width: 100%;">
                                                    <button class="btn btn-block btn-warning" type="button" id="btn_genera_catas">FINALIZADO</button>
                                                </div>
                                                <small id="msg_error_catastral" class="form-control-feedback" style="display: none; color: #ff0000"></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="background-color: #f6f6f6;">

                                        <div class="col-md-2">
                                        <div class="form-group">
                                                <label for="codigo_catastral"> Cod Catastral : <span class="text-danger">*</span> </label>
                                                <input autofocus type="text" class="form-control" id="codigo_catastral" name="codigo_catastral" maxlength="11" required />
                                                <small id="msg_error_catastral" class="form-control-feedback" style="display: none; color: #ff0000"></small>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="codigo_catastral_anterior"> Cod Cat Ant : <span class="text-danger">*</span> </label>
                                                <input type="number" class="form-control" step='1' id="codigo_catastral_anterior" name="codigo_catastral_anterior" required />
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="nro_inmueble"> Num inmueble : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="nro_inmueble" name="nro_inmueble" required />
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="distrito"> Distrito : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="distrito" step='1' name="distrito" required />
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="manzana"> Manzana : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="manzana" step='1' name="manzana" required />
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="predio"> Predio : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="predio" step='1' name="predio" required />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" style="background-color: #f6f6f6;">

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="tipo_predio_id"> Tpo Predio: <span class="text-danger">*</span> </label>
                                                <?php //echo vdebug($dc_tipos_predio); ?>
                                                <select class="custom-select form-control" id="tipo_predio" name="tipo_predio_id" required />
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
                                                <input type="text" class="form-control" id="zona_econo" name="zona_econo" maxlength="5"/d>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                                <label for="zonaurb_id"> Zona urbana: <span class="text-danger">*</span> </label>
                                                <select class="custom-select form-control" id="zonaurb_id" name="zonaurb_id" required />
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
                                                <input type="text" class="form-control" id="n_puerta" name="nro_puerta" required />
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="latitud"> Latitud : <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" maxlength="13" id="latitud" name="latitud" required />
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="longintud"> Longitud : <span class="text-danger">*</span> </label>
                                                <!-- <input type="text" class="form-control" id="longitud" name="longitud">  -->
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" name="longitud" id="longitud" maxlength="13" required />
                                                    <!-- <div class="input-group-append">
                                                        <button class="btn btn-warning" type="button" id="google_maps" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="muestra_mapa();">Mapa</button>
                                                    </div> -->
                                                </div>
                                                 <!-- <img src="../assets/images/alert/model2.png" alt="default" data-toggle="modal" data-target=".bs-example-modal-lg" class="model_img img-fluid" required /> -->
                                            </div>
                                        </div>

                                        </div>

                                        <div class="row" style="background-color: #fffef7;">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="superficie_geo">Superficie Geo : <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" step='0.01' value="0.00" id="superficie_geo" name="superficie_geo" required />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="superficie_campo">Superficie Campo : <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" step='0.01' value="0.00" id="superficie_campo" name="superficie_campo" min="1" required />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="superficie_legal">Superficie Legal : <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" step='0.01' value="0.00" id="superficie_legal" name="superficie_legal" min="1" required />
                                            </div>
                                        </div>

                                        </div>

                                        <div class="row" style="background-color: #fffef7;">

                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="ubicacion_id"> Ubicacion : <span class="text-danger">*</span> </label>
                                                <?php //echo vdebug($dc_tipos_predio); ?>
                                                <select class="custom-select form-control" id="ubicacion_id" name="ubicacion_id" required />
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
                                                <select class="custom-select form-control" id="pendiente_id" name="pendiente_id" required />
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
                                                <select class="custom-select form-control" id="nivel_id" name="nivel_id" required />
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
                                                <select class="custom-select form-control" id="forma_id" name="forma_id" required />
                                                    <option value="">Seleccione forma</option>
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
                                                <input type="text" class="form-control" id="c_principal" name="principal" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="zona">Zona : <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="zona" name="zona" required />
                                            </div>
                                        </div>

                                        </div>

                                        <div class="row" style="background-color: #f6f6f6;">

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="frente">Frente : <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" step='0.01' value="0.00" id="frente" name="frente"/d>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="fondo">Fondo : <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" step='0.01' value="0.00" id="fondo" name="fondo"/d>
                                            </div>
                                        </div>

                                        <div class="col-md-2" style="background-color: #f6f6f6;">
                                            <div class="form-group">
                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                                <label for="forma_id"> Clase Predio : <span class="text-danger">*</span> </label>
                                                <select class="custom-select form-control" id="forma_id" name="clase_predio_id" required />
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
                                                <select class="custom-select form-control" id="forma_id" name="uso_suelo_id" required />
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
                                                <input type="number" class="form-control" id="forma" step='1' name="matriz_ph" required />
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                                <label for="forma_id"> Edificio : <span class="text-danger">*</span> </label>
                                                <select class="custom-select form-control" id="forma_id" name="edificio_id" required />
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

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck99">
                                                    <label class="custom-control-label" for="customCheck99"><b>Selecciona Todos</b></label>
                                                </div>
                                                    <?php foreach ($listado_servicios as $key => $ls): ?>
                                                    <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="servicios[<?php echo $key; ?>]" value="<?php echo $ls->servicio_id; ?>" id="customCheck<?php echo $key; ?>">
                                                            <label class="custom-control-label" for="customCheck<?php echo $key; ?>"><?php echo $ls->descripcion ?></label>
                                                    </div>
                                                    <?php endforeach; ?>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="col"  style="background-color: #fffef7;">
                                            <div class="form-group">
                                                <label for="observaciones">Observaciones : </label>
                                                <input type="text" class="form-control" id="observaciones" name="observaciones" required />
                                            </div>
                                        </div>

                                        </div>

                                    </div>

                                    <div class="col-md-3">

                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Foto Plano</h4>
                                                <label for="input-file-now">
                                                <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                    <i class="fas fa-exclamation"></i>
                                                </button>
                                                    OJO Solo archivos jpg
                                                </label>
                                                <input type="file" id="input-file-now" class="dropify" name="foto_plano" data-allowed-file-extensions="jpg" required />
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Foto Fachada</h4>
                                                <label for="input-file-now">
                                                <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                    <i class="fas fa-exclamation"></i>
                                                </button>
                                                    OJO Solo archivos jpg
                                                </label>
                                                <input type="file" id="input-file-now" class="dropify" name="foto_fachada" data-allowed-file-extensions="jpg" required />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 offset-md-11">
                                        <button type="submit" class="btn waves-effect waves-light btn-info">Siguiente Paso</button>
                                    </div>
                                </div>

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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap&libraries=drawing" async defer></script>

    <script type="text/javascript">

        // var map;
        // var lat = $("#latitud").val();
        // var lon = $("#longitud").val();

        // modificacion

        // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.

          var map, infoWindow;

          function initMap() {
              map = new google.maps.Map(document.getElementById('map'), {
                  center: {
                      lat: -34.397,
                      lng: 150.644
                  },
                  zoom: 18
              });
              infoWindow = new google.maps.InfoWindow;

              // Try HTML5 geolocation.
              if (navigator.geolocation) {

                  navigator.geolocation.getCurrentPosition(function(position) {
                      var pos = {
                          lat: position.coords.latitude,
                          lng: position.coords.longitude
                      };

                    // console.log(position.coords.latitude);
                      // infoWindow.setPosition(pos);
                      // infoWindow.setContent('Estoy aqui.');
                      infoWindow.open(map);
                      map.setCenter(pos);

                      var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                        var marker = new google.maps.Marker({
                            position: latlng,
                            map: map,
                            title: 'Set lat/lon values for this property',
                            draggable: true
                        });

                        google.maps.event.addListener(marker, 'dragend', function (event) {
                            // document.getElementById("latbox").value = this.getPosition().lat();
                            // document.getElementById("lngbox").value = this.getPosition().lng();
                            console.log(marker.getPosition().lat());
                            console.log(this.getPosition().lng());
                        });

                        var drawingManager = new google.maps.drawing.DrawingManager({
                            drawingMode: google.maps.drawing.OverlayType.MARKER,
                            drawingControl: true,
                            drawingControlOptions: {
                                position: google.maps.ControlPosition.TOP_CENTER,
                                drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
                            },
                            markerOptions: {
                                icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
                            },
                            circleOptions: {
                                fillColor: '#ffff00',
                                fillOpacity: 1,
                                strokeWeight: 5,
                                clickable: false,
                                editable: true,
                                zIndex: 1
                            }
                        });
                        drawingManager.setMap(map);


                  }, function() {
                      handleLocationError(true, infoWindow, map.getCenter());
                  });
              } else {
                  // Browser doesn't support Geolocation
                  handleLocationError(false, infoWindow, map.getCenter());
              }

          }

          function handleLocationError(browserHasGeolocation, infoWindow, pos) {
              infoWindow.setPosition(pos);
              infoWindow.setContent(browserHasGeolocation ?
                  'Error: El servicio tiene un problema.' :
                  'Error: Tu navegador no soporta geolocalizacion.');
              infoWindow.open(map);
          }

/*        function initMap(){

            var latlng = new google.maps.LatLng(51.4975941, -0.0803232);
            var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 18,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                title: 'Set lat/lon values for this property',
                draggable: true
            });

            google.maps.event.addListener(marker, 'dragend', function (event) {
                // document.getElementById("latbox").value = this.getPosition().lat();
                // document.getElementById("lngbox").value = this.getPosition().lng();
                console.log(marker.getPosition().lat());
                console.log(this.getPosition().lng());
            });

        }
*/
        // fin modificacion

        /*$("#google_maps").hover(function(){

            lat = $("#latitud").val();
            lon = $("#longitud").val();
            // console.log(lat + lon);
            var myLatlng = new google.maps.LatLng(lat, lon);
            var mapOptions = {
                zoom: 18,
                center: myLatlng,
                mapTypeId: 'hybrid',
            }

            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                title:"Predio"
                    // label: "Aqui el predio"
                });

                // To add the marker to the map, call setMap();
                marker.setMap(map);
        });

        /*function initMap() {

            var myLatlng = new google.maps.LatLng(-18.00418108,-63.39072107);
            var mapOptions = {
                zoom: 18,
                center: myLatlng,
                mapTypeId: 'hybrid'
            }

            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                title:"Predio"
                    // label: "Aqui el predio"
                });

                // To add the marker to the map, call setMap();
                marker.setMap(map);
        }*/

    </script>
    <script type="text/javascript">

        $("#codigo_catastral").focusout(function(){

            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
            var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            var cod_catastral = $("#codigo_catastral").val();

            $.ajax({
                url: '<?php echo base_url(); ?>predios/ajax_verifica_cod_catastral/',
                type: 'GET',
                dataType: 'json',
                data: {csrfName: csrfHash, param1: cod_catastral},
                // data: {param1: cod_catastral},
                success:function(data, textStatus, jqXHR) {
                    // alert("Se envio bien");
                    // csrfName = data.csrfName;
                    // csrfHash = data.csrfHash;
                    // alert(data.message);
                    if (data.estado == 'si') {
                        // console.log('Si se esta');
                        $("#msg_error_catastral").show();    
                        $("#codigo_catastral").val("");    
                        $("#msg_error_catastral").html('YA existe el codigo: '+data.codigo);    
                    } else {
                        $("#msg_error_catastral").hide();    
                        // console.log('no');
                    }

                },
                error:function(jqXHR, textStatus, errorThrown) {
                    // alert("error");
                }
            });
            
        });

        $("#btn_genera_catas").click(function(){

            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
            var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            var csrf = $("input[name=csrf_test_name]").val()
            // console.log(csrf);

            var cod_referencial = $("#cod_referencial").val();
            // alert(cod_referencial);
            $.ajax({
                url: '<?php echo base_url(); ?>predios/ajax_genera_codcatas/',
                type: 'POST',
                dataType: 'json',
                data: {csrfName: csrfHash, codigo: cod_referencial, csrf_test_name: csrf},
                success:function(data, textStatus, jqXHR) {
                    // console.log(data);
                    // var cod_cat = parseInt(data);
                    $("#codigo_catastral").val(data);

                    // $("#codigo_catastral").val(codigo_cat);
                    var s_codigo_cat = data.toString();
                    // var cod_catastral = $("#codigo_catastral").val();
                    var predio = s_codigo_cat.substr(6, 10);
                    var distrito = s_codigo_cat.substr(0, 3);
                    var manzana = s_codigo_cat.substr(3, 3);

                    $("#distrito").val(distrito);
                    $("#manzana").val(manzana);
                    $("#predio").val(predio);

                    $("#distrito").prop('readonly', true);
                    $("#manzana").prop('readonly', true);
                    $("#predio").prop('readonly', true);
                },
                error:function(jqXHR, textStatus, errorThrown) {
                }
            });

        });

        $("#btn_sel_predio").click(function(event) {
            $("#muestra_mapa").toggle('slow');
        });

        $('#customCheck99').change(function () {
            var checkboxes = $(this).closest('form').find(':checkbox');
            checkboxes.prop('checked', $(this).is(':checked'));
        });

        $("#btn_finalizado").click(function(){
            $("#muestra_mapa").toggle('slow');
            var codigo_cat = getGeneraRandom(1, 99999999999);
            var s_codigo_cat = codigo_cat.toString();
            $("#codigo_catastral").val(codigo_cat);
            // var cod_catastral = $("#codigo_catastral").val();
            var predio = s_codigo_cat.substr(7, 10);
            var distrito = s_codigo_cat.substr(0, 3);
            var manzana = s_codigo_cat.substr(3, 4);

            $("#distrito").val(distrito);
            $("#manzana").val(manzana);
            $("#predio").val(predio);

            $("#distrito").prop('readonly', true);
            $("#manzana").prop('readonly', true);
            $("#predio").prop('readonly', true);

            $("#latitud").val(-18.00418108);
            $("#longitud").val(-63.39072107);
            $("#superficie_geo").val(125);
            $("#superficie_campo").val(60);
            $("#superficie_legal").val(90);

            console.log('Aqui mi cod'+lat);

        });



/*        var aplicacion = new Vue({
          el: '#aplicacion',
          data: {
            name: 'Cristiam Herrera'
          },
          // define methods under the `methods` object
          methods: {
            oculta: function (event){
                $("#muestra_mapa").toggle('slow');    
            },
            llena: function (event) {
                alert("holas");                      
            }
        });
*/

/*var aplicacion = new Vue({
    el: '#aplicacion',
    data: {
        codcatas: 'Vue.js'
    },
    // define methods under the `methods` object
    methods: {
        oculta: function(event) {
            $("#muestra_mapa").toggle('slow');    
        },
        llena: function(event) {
            // $("#muestra_mapa").toggle('slow');    
            var cod_catastral = getRndInteger(1, 9999999999);


        },
    }
}) */

function getGeneraRandom(min, max) {
  return Math.floor(Math.random() * (max - min + 1) ) + min;
}

</script>
