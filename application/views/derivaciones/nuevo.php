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
                    
                        <div class="row">
                            <div class="col-6">
                            <?php //vdebug($tramite); ?>
                                <h2 class="mb-0">CITE: <?php echo $tramite->cite; ?></h2>
                                <h4 class="font-light mt-0">Referencia <?php echo $tramite->referencia; ?></h4>
                            </div>
                            <div class="col-6 align-self-center display-8 text-info text-right">Fecha: <?php echo $tramite->fecha; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                REMITENTE: <?php echo $tramite->remitente; ?>
                            </div>
                            <div class="col-6">
                                PROCEDENCIA: <?php echo $tramite->procedencia; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Derivar a: </label><br>
                                    <?php //vdebug($cargo_inmediato_superior) ?>
                                    <?php //vdebug($inmediato_superior) ?>
                                    <?php //echo $inmediato_superior->nombres; ?>
                                    <?php //echo $inmediato_superior->paterno; ?>
                                    <?php //echo $inmediato_superior->materno; ?><br>
                                    <?php //echo $cargo_inmediato_superior[0]->descripcion; ?>
                                    <?php //vdebug($personas_derivacion, false, FALSE, TRUE); ?>
                                    <select class="custom-select form-control" />
                                        <option value="1">
                                            <?php echo $inmediato_superior->nombres; ?>
                                            <?php echo $inmediato_superior->paterno; ?>
                                            <?php echo $inmediato_superior->materno; ?><br>
                                        </option>
                                        <?php foreach ($personas_derivacion as $key => $pd): ?>
                                            <option value="0">
                                                <?php echo $pd->nombres; ?>
                                                <?php echo $pd->paterno; ?>
                                                <?php echo $pd->materno; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                            
                                <div class="form-group">
                                    <label>Descripcion: </label>
                                    <input type="text" class="form-control">
                                </div>
                                <!-- <label>&nbsp;</label> -->
                                <?php // echo $tramite->procedencia; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn waves-effect waves-light btn-block btn-info">Derivar</button>
                            </div>
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

         var contador_eliminados = 0;
         var todos = new Array();

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
                    // var datos = JSON.parse
                    // var datos = JSON.parse(data);
                    var datos = jQuery.parseJSON(JSON.stringify(data));
                    // console.log(datos.vias);

                    //var combos_vias = '<select class="custom-select form-control" id="" name="" required="">';
                    var checkbox_vias = '<table>';
                    var contador = 0;
                   
                    datos.vias.forEach(function(element){
                        // console.log(element.sp_get_vias);
                        var aux1 = element.sp_get_vias;
                        var aux2 = element.sp_get_vias.split(",");
                        var aux3 = aux2[0].substring(1);
                        todos.push(aux3); 
                        // console.log(todos);
                        // console.log(contador);
                        // combos_vias += '<option value="'+aux3+'">'+element.sp_get_vias+'</option>';
                        // checkbox_vias += '<input type="checkbox" name="'+aux3+'" value="Bike"> '+element.sp_get_vias+'<br>';
                        checkbox_vias += '<tr id=fila_'+aux3+'>\
                            <td><div class="custom-control custom-radio">\
                                            <input type="radio" id="customRadio_'+aux3+'" name="calle_principal" class="custom-control-input" value="'+aux3+'">\
                                            <label class="custom-control-label" for="customRadio_'+aux3+'">'+element.sp_get_vias+'</label></div>\
                                            </td><td><button type="button" class="btn btn-danger" onclick="elimina_fila_tabla('+aux3+')">\
                                                    <span class="fas fa-trash-alt"></span>\
                                                </button></td></tr>';
                        contador++;
                        });
                    checkbox_vias += '</table>';

                    $("#calles_colindantes").val(todos);
                    // console.log('Aqui los datos: '+todos);

                    //combos_vias += "</select>"
                    // console.log(combos_vias);
                    $("#predio_vias").html(checkbox_vias);

                    // var cod_cat = parseInt(data);
                    $("#codigo_catastral").val(datos.codcatas);

                    cantidad_codcatas = datos.codcatas.length;
                    // console.log(datos.codcatas.length);


                    if (cantidad_codcatas != 10) {
                        swal("Error!", "El codigo catastral no es valido!", "error");
                    }

                    // $("#codigo_catastral").val(codigo_cat);
                    var s_codigo_cat = datos.codcatas.toString();
                    // var cod_catastral = $("#codigo_catastral").val();
                    var predio = s_codigo_cat.substr(6, 10);
                    var distrito = s_codigo_cat.substr(0, 3);
                    var manzana = s_codigo_cat.substr(3, 3);

                    $("#distrito").val(distrito);
                    $("#manzana").val(manzana);
                    $("#predio").val(predio);

                    $("#codigo_catastral").prop('readonly', true);
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

            // console.log('Aqui mi cod'+lat);
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

function elimina_fila_tabla(fila){

    // console.log('Aqui los datos '+ todos);
    var fila_numero = parseInt(fila);
    $('#fila_'+fila).remove();

    // console.log(array)
    // var index = todos.indexOf("fila_numero");

    // var index = todos.findIndex(fila_numero);
    // console.log('array ', todos);
    // console.log('encontrado '+todos.indexOf(fila));
    // console.log('A buscar '+fila_numero);
    // console.log('El indice '+index);

    todos.forEach(function (elemento, indice, array) {
        // console.log(elemento, indice);
        if(elemento==fila){
            // console.log('Si '+indice);
            todos.splice(indice, 1);
            // console.log(todos.indexOf(fila));
        }else{
            // console.log('No');
        }
    });
    // console.log('Aqui los modificados '+ todos);
    $('#calles_colindantes').val(todos);

    // if (index > -1) {
    // }
    // array = [2, 9]
    // console.log(array);

    // contador_eliminados++;
    // console.log(contador_eliminados);
    // console.log(todos);
    // console.log(fila);
}

// $('#predio_form').submit(function(e) {
    
//     swal("Excelente!", "Puedes continuar con el siguiente paso!", "success");
//     e.preventDefault(); // don't submit multiple times
//     this.submit(); // use the native submit method of the form element
    // $('#imagefile').val(''); // blank the input
// });

function getGeneraRandom(min, max) {
    return Math.floor(Math.random() * (max - min + 1) ) + min;
}

</script>