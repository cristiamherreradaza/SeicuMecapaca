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
                            <!-- <h4 class="card-title">
                                Registro de Predio
                                <button type="button" class="btn waves-effect waves-light btn-success" id="btn_sel_predio">Seleccionar predio</button>
                            </h4> -->
                           

                            <!-- <h6 class="card-subtitle">Ingrese los datos del predio </h6> -->
                            

                          

                            <!-- <form action="#" class="validation-wizard wizard-circle"> -->
                            <?php // echo form_open('predios/guarda', array('method'=>'POST', 'enctype'=>"multipart/form-data")); ?>
                            <?php echo form_open_multipart('tipo_tramite/insertar', array('method'=>'POST')); ?>
                                    <h4 class="card-title">Registro de Tramite</h4>
                               
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Persona</label>
                                            <!-- CONSULTA POR LA TABLA ORGANIGRAMA PERSONA -->
                                            <?php $lista = $this->db->query("SELECT op.organigrama_persona_id, op.persona_id, p.persona_id, p.nombres, p.paterno
                                                                            FROM tramite.organigrama_persona op, public.persona p
                                                                            WHERE op.organigrama_persona_id = '$idss'
                                                                            AND op.persona_id = p.persona_id
                                                                            ORDER BY op.organigrama_persona_id ASC")->row();
                                           
                                            ?>  
                                                <select type="text" class="form-control" id="" name="organigrama_persona_id"/>
                                                    <option value="<?php echo $lista->organigrama_persona_id ?>"><?php echo $lista->nombres ?> <?php echo $lista->paterno ?></option>
                                                </select>

                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Tipo de Documento</label>

                                            <!-- CONSULTA POR LA TABLA TIPO DE DOCUMENTO -->
                                            <?php $lista1 = $this->db->query("SELECT * FROM tramite.tipo_documento  WHERE activo = '1' ORDER BY tipo_documento_id ASC")->result();
                                            ?> 

                                            <select class="custom-select form-control" id="tipo_documento_id" name="tipo_documento_id" required />
                                                <option value="">Seleccione tipo</option>
                                                <?php foreach ($lista1 as $td): ?>
                                                    <option value="<?php echo $td->tipo_documento_id; ?>"><?php echo $td->documento; ?></option>
                                                <?php endforeach; ?>
                                            </select>  
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustomUsername">Tipo de Correspondencia</label>

                                            <!-- CONSULTA POR LA TABLA TIPO DE DOCUMENTO -->
                                            <?php $lista2 = $this->db->query("SELECT * FROM tramite.tipo_tramite  WHERE activo = '1' ORDER BY tipo_correspondencia_id ASC")->result();
                                            ?> 
                                            <div class="input-group">
                                                <select class="custom-select form-control" id="tipo_correspondencia_id" name="tipo_correspondencia_id" required />
                                                <option value="">Seleccione tipo</option>
                                                <?php foreach ($lista2 as $tc): ?>
                                                    <option value="<?php echo $tc->tipo_correspondencia_id; ?>"><?php echo $tc->correspondencia; ?></option>
                                                <?php endforeach; ?>
                                            </select>  
                                                <div class="invalid-feedback">
                                                    Please choose a username.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">Cite<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="validationCustom03" name="cite" placeholder="INF/MOPSV/VMVU/PMGM Nº 0306/2019" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        <div class="form-group">
                                                <label for="codigo_catastral"> Fecha<span class="text-danger">*</span> </label>
                                                <input type="date" class="form-control" id="fecha" name="fecha" maxlength="11" required="">
                                                <small id="msg_error_catastral" class="form-control-feedback"></small>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        <div class="form-group">
                                                <label for="codigo_catastral"> Fojas<span class="text-danger">*</span> </label>
                                                <input type="integer" class="form-control" id="fojas" name="fojas" maxlength="11" required="">
                                                <small id="msg_error_catastral" class="form-control-feedback"></small>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        <div class="form-group">
                                                <label for="codigo_catastral"> Anexos<span class="text-danger">*</span> </label>
                                                <input type="integer" class="form-control" id="anexos" name="anexos" maxlength="11" required="">
                                                <small id="msg_error_catastral" class="form-control-feedback"></small>
                                            </div>
                                        </div>                                                                              
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom03">Remitente<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="validationCustom03" name="remitente" placeholder="Remitente" required>
                                            <div class="invalid-feedback">
                                                Por Favor Ingrese el Remitente.
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom03">Procedencia<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="validationCustom03" name="procedencia" placeholder="Procedencia" required>
                                            <div class="invalid-feedback">
                                                Por Favor Ingrese el Procedencia.
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom03">Referencia<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="validationCustom03" name="referencia" placeholder="Referencia" required>
                                            <div class="invalid-feedback">
                                                Por Favor Ingrese el Referencia.
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <button class="btn btn-primary" type="submit">Guardar</button>

                                </form>
                                <script>
                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                (function() {
                                    'use strict';
                                    window.addEventListener('load', function() {
                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                        var forms = document.getElementsByClassName('needs-validation');
                                        // Loop over them and prevent submission
                                        var validation = Array.prototype.filter.call(forms, function(form) {
                                            form.addEventListener('submit', function(event) {
                                                if (form.checkValidity() === false) {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }
                                                form.classList.add('was-validated');
                                            }, false);
                                        });
                                    }, false);
                                })();
                                </script>
                            
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
</div>

    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap&libraries=drawing" async defer></script>


