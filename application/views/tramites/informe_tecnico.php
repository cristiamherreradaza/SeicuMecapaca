<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">
<!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.9/dist/vue.js"></script> -->

<!-- sample modal content -->

<!-- /.modal -->

<!-- ============================================================== -->
<!-- Start Page Content 
   <select class="custom-select form-control" id="tipo_predio" name="tipo_predio_id" required />
        <option value="">Seleccione tipo</option>
        <?php foreach ($dc_tipos_predio as $d): ?>
            <option value="<?php echo $d->tipo_predio_id; ?>"><?php echo $d->descripcion; ?></option>
        <?php endforeach; ?>
    </select>  
-->
<!-- ============================================================== -->

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <?php echo form_open_multipart('tipo_tramite/guardar_informe', array('method'=>'POST')); ?>
                                <h3 class="" style="text-align: center;">INFORME TECNICO
                                    </h3>
                                    <div>
                                        <input type="hidden" name="organigrama_persona_id" value="" >
                                        <div class="form-group mt-5 row">
                                            <label for="example-text-input" class="col-2 col-form-label">CITE: GAMM-SMDT-TEC-Nº </label>
                                            <div class="col-10">
                                                <input type="text" class="form-control" id="cite" name="cite" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">A : </label>
                                            <div class="col-10">
                                                <select class="custom-select col-12" id="a" name="a" required>
                                                    <option value=""></option>
                                                    <?php foreach ($personas as $key => $p): ?>
                                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?></option>
                                                        <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">VIA : </label>
                                            <div class="col-10">
                                                <select class="custom-select col-12" id="via" name="via" required>
                                                    <option value=""></option>
                                                    <?php foreach ($personas as $key => $p): ?>
                                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mt-5 row">
                                            <label for="example-text-input" class="col-2 col-form-label">Referencia</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="referencia" name="referencia" required>
                                            </div>
                                        </div>

                                        <?php $fecha= date('d-m-Y'); ?>
                                        <!-- <div class="col-md-12 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="fecha_tramite" name="fecha_tramite" value="<?php echo $fecha ?>" required>
                                            <label >Fecha<span class="text-danger">*</span></label>
                                        </div> -->
                                        
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">Procesador : </label>
                                            <div class="col-10">
                                                <select class="custom-select col-12"  id="procesador" name="procesador" required>
                                                    <option value=""></option>
                                                    <?php foreach ($personas as $key => $p): ?>
                                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                        <div class="col-md-12 mb-form-group mb-5">
                                            ANTECEDENTES <br>   
                                        Da curso a la siguiente solicitud <br/>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mt-5 row col-6">
                                                <label for="example-text-input" class="col-2 col-form-label">GAMM</label>
                                                <div class="col-8">
                                                    <input class="form-control" type="text" id="correlativo" name="correlativo" required>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5 row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">De fecha</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="fecha_solicitud" name="fecha_solicitud" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mt-5 row col-8">
                                                <label for="example-text-input" class="col-2 col-form-label">Solicitante</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" id="solicitante" name="solicitante" required>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5 row col-4">
                                                <label for="example-text-input" class="col-2 col-form-label">CI</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" id="ci" name="ci" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php $lista2 = $this->db->query("SELECT * FROM tramite.tipo_tramite  WHERE activo = '1' ORDER BY tipo_tramite_id ASC")->result();
                                            ?>
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">Tipo de Tramite : </label>
                                            <div class="col-10">
                                                <select class="custom-select col-12"   id="tipo_tramite_id" name="tipo_tramite_id"  onchange="CargarProductos(this.value);" required>
                                                    <option value=""></option>
                                                    <?php foreach ($lista2 as $tc): ?>
                                                    <option value="<?php echo $tc->tipo_tramite_id; ?>"><?php echo $tc->tramite; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group mb-5" id="listas">    
                                            
                                        </div>
                                        <div class="form-group mt-5 row ">
                                            <label for="example-text-input" class="col-2 col-form-label">Ubicacion</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="ubicacion" name="ubicacion">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mt-5 row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">Lote</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="lote" name="lote">
                                                </div>
                                            </div>
                                            <div class="form-group mt-5 row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">Urbanizacion</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="urbanizacion" name="urbanizacion">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mt-5 row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">Manzano</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="manzana" name="manzana">
                                                </div>
                                            </div>
                                            <div class="form-group mt-5 row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">Comunidad</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="comunidad" name="comunidad">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mt-5 row col-6">
                                                <label for="example-text-input" class="col-6 col-form-label">Superficie segun testimonio</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" id="superficie_testimonio" name="superficie_testimonio" required>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5 row col-6">
                                                <label for="example-text-input" class="col-6 col-form-label">Superficie segun medicion</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" id="superficie_medicion" name="superficie_medicion" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        

                                        <div class="col-md-12 mb-form-group mb-5">
                                            DOCUMENTACION PRESENTADA <br>
                                            Folio
                                        </div>
                                        <div class="form-group mt-5 row">
                                            <label for="example-text-input" class="col-2 col-form-label">N°  </label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="nro_folio" name="nro_folio" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-form-group mb-5">
                                            Testimonio de propiedad
                                        </div>
                                        <div class="row">
                                            <div class="form-group mt-5 row col-4">
                                                <label for="example-text-input" class="col-4 col-form-label">N°</label>
                                                <div class="col-8">
                                                    <input class="form-control" type="text" id="nro_testimonio" name="nro_testimonio" required>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5 row col-4">
                                                <label for="example-text-input" class="col-4 col-form-label">Notaria</label>
                                                <div class="col-8">
                                                    <input class="form-control" type="text" id="notaria" name="notaria" required>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5 row col-4">
                                                <label for="example-text-input" class="col-4 col-form-label">Fecha</label>
                                                <div class="col-8">
                                                    <input class="form-control" type="text" id="fecha_testimonio" name="fecha_testimonio" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group mt-5 row">
                                            <label for="example-text-input" class="col-2 col-form-label">Notario Dr(a)</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="notario" name="notario" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-form-group mb-5">
                                            Impuestos
                                        </div>

                                        <div class="form-group mt-5 row">
                                            <label for="example-text-input" class="col-2 col-form-label">Años</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text"id="impuestos" name="impuestos" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-form-group mb-5">
                                            OBSERVACIONES
                                        </div>
                                        <div class="form-group mt-5 row">
                                            <label for="example-text-input" class="col-2 col-form-label">Observaciones</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="observaciones" name="observaciones" required>
                                            </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" name="boton" value="generar" class="btn waves-effect waves-light btn-block btn-info">Guardar</button>
                                        </div>
                                        
                                    </div>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12" >
                <div class="card" style="background: #0489B1;">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class=""><img src="<?php echo base_url(); ?>public/assets/images/users/1.jpg" alt="user" class="img-circle" width="100"></div>
                            <div class="pl-3">
                                <h3 style="color: white;" class="font-medium">Daniel Kristeen</h3>
                                <h6 style="color: white;">UIUX Designer</h6>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col border-right">
                                <h2 style="color: white;" class="font-light">14</h2>
                                <h6 style="color: white;" >Photos</h6></div>
                            <div class="col border-right">
                                <h2 style="color: white;" class="font-light">54</h2>
                                <h6 style="color: white;">Videos</h6></div>
                            <div class="col">
                                <h2 style="color: white;" class="font-light">145</h2>
                                <h6 style="color: white;" >Tasks</h6></div>
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
 <script>
                                function CargarProductos(val)
                                {   

                                    $.ajax({
                                        type: "GET",
                                        url: '<?php echo base_url(); ?>tipo_tramite/ajax_verifica1/',
                                        data: 'param1='+val,
                                        success: function(resp){
                                            //alert(resp[resp.length]);
                                            asistente = JSON.parse(resp);
                                            $('.borrar').remove();
                                            for (var i = 0; i < asistente.length; i++) {

                                                $('#listas').append('<div class="borrar"> <input type="checkbox" id="requisitos['+i+']" name="requisitos['+i+']" value="'+asistente[i]['requisito_id']+'"> '+asistente[i]['descripcion']+' </div>');
                                                //console.log(asistente[i]['descripcion']);
                                            }
                                        }
                                    });
                                }
                            </script>

<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap&libraries=drawing" async defer></script>