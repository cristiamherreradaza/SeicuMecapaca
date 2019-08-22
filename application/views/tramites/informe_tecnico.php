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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <?php echo form_open_multipart('tipo_tramite/guardar_informe', array('method'=>'POST')); ?>
                                <h4 class="card-title">Informe tecnico
                                    </h4>
                                <div class="floating-labels mt-5">
                                    <div class="form-row">
                                        <input type="hidden" name="organigrama_persona_id" value="" >
                                        <div class="col-md-12 form-group mb-5">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="cite" name="cite" required>
                                                <label > CITE: GAMM-SMDT-TEC-Nº </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group mb-5"> 
                                            <select class="custom-select form-control" id="a" name="a" required />
                                                <option value=""></option>
                                                <?php foreach ($personas as $key => $p): ?>
                                                    <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
                                                <?php endforeach ?>
                                            </select>  
                                            <label >A : </label>
                                        </div>
                                        <div class="col-md-6 form-group mb-5"> 
                                            <select class="custom-select form-control" id="via" name="via" required />
                                                <option value=""></option>
                                                <?php foreach ($personas as $key => $p): ?>
                                                    <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
                                                <?php endforeach ?>
                                            </select>  
                                            <label >Via : </label>
                                        </div>
                                       <!--  <div class="col-md-7 form-group mb-5"> 
                                            <select class="custom-select form-control" id="de" name="de" required />
                                                <option value=""></option>
                                                <?php //foreach ($personas as $key => $p): ?>
                                                    <option value="<?php //echo $p['id'] ?>"><?php //echo $p['nombre']; ?> - <?php //echo $p['cargo']; ?> (<?php //echo $p['unidad']; ?>)</option>
                                                <?php //endforeach ?>
                                            </select>  
                                            <label >De : </label>
                                        </div> -->
                                        <div class="col-md-12 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="referencia" name="referencia" required>
                                            <label >Referencia<span class="text-danger">*</span></label>
                                        </div>
                                        <?php $fecha= date('d-m-Y'); ?>
                                        <!-- <div class="col-md-12 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="fecha_tramite" name="fecha_tramite" value="<?php echo $fecha ?>" required>
                                            <label >Fecha<span class="text-danger">*</span></label>
                                        </div> -->
                                       
                                        <div class="col-md-6 form-group mb-5"> 
                                            <select class="custom-select form-control" id="procesador" name="procesador" required />
                                                <option value=""></option>
                                                <?php foreach ($personas as $key => $p): ?>
                                                    <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
                                                <?php endforeach ?>
                                            </select>  
                                            <label >Procesador </label>
                                        </div>


                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-form-group mb-5">
                                            ANTECEDENTES <br>   
                                        Da curso a la siguiente solicitud <br/>
                                        </div>
                                        
                                        <div class="col-md-6 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="correlativo" name="correlativo" required>
                                            <label >GAMM<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-6 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="fecha_solicitud" name="fecha_solicitud" required>
                                            <label >De fecha<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="solicitante" name="solicitante" required>
                                            <label >Solicitante<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-3 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="ci" name="ci" required>
                                            <label >Cedula de identidad<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-12 form-group mb-5">
                                            <!-- CONSULTA POR LA TABLA TIPO DE DOCUMENTO -->
                                            <?php $lista2 = $this->db->query("SELECT * FROM tramite.tipo_tramite  WHERE activo = '1' ORDER BY tipo_tramite_id ASC")->result();
                                            ?> 
                                            <select class="custom-select form-control" id="tipo_tramite_id" name="tipo_tramite_id"  onchange="CargarProductos(this.value);" required />
                                                <option value=""></option>
                                                <?php foreach ($lista2 as $tc): ?>
                                                    <option value="<?php echo $tc->tipo_tramite_id; ?>"><?php echo $tc->tramite; ?></option>
                                                <?php endforeach; ?>
                                            </select>  
                                            <label>Tipo de Tramite</label>
                                        </div>
                                        <div class="col-md-9 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="ubicacion" name="ubicacion">
                                            <label >Ubicacion<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-6 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="lote" name="lote">
                                            <label >Lote<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-6 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="urbanizacion" name="urbanizacion">
                                            <label >Urbanizacion<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-6 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="manzana" name="manzana">
                                            <label >Manzano<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-6 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="comunidad" name="comunidad">
                                            <label >Comunidad<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-6 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="superficie_testimonio" name="superficie_testimonio" required>
                                            <label >Superficie segun testimonio<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-6 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="superficie_medicion" name="superficie_medicion" required>
                                            <label >Superficie segun medicion   <span class="text-danger">*</span></label>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12 mb-form-group mb-5">
                                            DOCUMENTACION PRESENTADA <br>
                                            Folio
                                        </div>
                                        <div class="col-md-6 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="nro_folio" name="nro_folio" required>
                                            <label >N°   <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-12 mb-form-group mb-5">
                                            Testimonio de propiedad
                                        </div>
                                        <div class="col-md-4 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="nro_testimonio" name="nro_testimonio" required>
                                            <label >N°<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-4 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="notaria" name="notaria" required>
                                            <label >Notaria<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-4 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="fecha_testimonio" name="fecha_testimonio" required>
                                            <label >Fecha<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-12 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="notario" name="notario" required>
                                            <label >Notario Dr(a)<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-12 mb-form-group mb-5">
                                            Impuestos
                                        </div>
                                        <div class="col-md-6 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="impuestos" name="impuestos" required>
                                            <label >Años<span class="text-danger">*</span></label>
                                        </div>
                                                                                
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-form-group mb-5">
                                            OBSERVACIONES
                                        </div>
                                        <div class="col-md-12 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="observaciones" name="observaciones" required>
                                            <label >Observaciones   <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" name="boton" value="generar" class="btn waves-effect waves-light btn-block btn-info">Guardar</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap&libraries=drawing" async defer></script>