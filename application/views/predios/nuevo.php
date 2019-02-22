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
                        <h4 class="card-title">Formulario de registro de predio</h4>
                        <h6 class="card-subtitle">ingrese los datos llenados correctamente</h6>
                        <!-- <form action="#" class="validation-wizard wizard-circle"> -->
                        <?php echo form_open('predios/guardar', array('class'=>'validation-wizard wizard-circle', 'method'=>'POST')); ?>
                            <!-- Step 1 -->
                            <h6>Datos del terreno</h6>
                            <section>

                                <div class="row">

                                    <div class="col-md-2">
                                       <div class="form-group">
                                            <label for="codigo_catastral"> Cod Catastral : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="codigo_catastral" name="data[predio][codigo_catastral]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="codigo_catastral_anterior"> Cod Cat Ant : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="codigo_catastral_anterior" name="data[predio][codigo_catastral_anterior]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="n_inmueble"> Num inmueble : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="n_inmueble" name="data[predio][n_inmueble]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="distrito"> Distrito : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="distrito" name="data[predio][distrito]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="manzana"> Manzana : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="manzana" name="data[predio][manzana]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="predio"> Predio : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="predio" name="data[predio][predio]"> 
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tipo_predio_id"> Tpo Predio: <span class="text-danger">*</span> </label>
                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                            <select class="custom-select form-control required" id="tipo_predio" name="data[predio][tipo_predio]">
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
                                            <input type="text" class="form-control required" id="zona_econo" name="data[predio][zona_econo]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                        <?php //echo vdebug($dc_tipos_predio); ?>
                                            <label for="zonaurb_id"> Zona urbana: <span class="text-danger">*</span> </label>
                                            <select class="custom-select form-control required" id="zonaurb_id" name="data[predio][zonaurb_id]">
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
                                            <input type="text" class="form-control required" id="n_puerta" name="data[predio][n_puerta]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="latitud"> Latitud : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="latitud" name="data[predio][latitud]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="longintud"> Longitud : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="longitud" name="data[predio][longitud]"> 
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="superficie_geo">Superficie Geo : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" id="superficie_geo" name="data[predio][superficie_geo]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="superficie_campo">Superficie Campo : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" id="superficie_campo" name="data[predio][superficie_campo]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="superficie_legal">Superficie Legal : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" id="superficie_legal" name="data[predio][superficie_legal]"> 
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ubicacion_id"> Ubicacion : <span class="text-danger">*</span> </label>
                                        <?php //echo vdebug($dc_tipos_predio); ?>
                                        <select class="custom-select form-control required" id="ubicacion_id" name="data[predio][ubicacion_id]">
                                            <option value="">Seleccione ubicacion</option>
                                            <?php foreach ($dc_ubicacion as $d): ?>
                                                <option value="<?php echo $d->ubicacion_id; ?>"><?php echo $d->descripcion; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pendiente_id"> Pendiente : <span class="text-danger">*</span> </label>
                                        <?php //echo vdebug($dc_tipos_predio); ?>
                                        <select class="custom-select form-control required" id="pendiente_id" name="data[predio][pendiente_id]">
                                            <option value="">Seleccione pendiente</option>
                                            <?php foreach ($dc_pendiente as $d): ?>
                                                <option value="<?php echo $d->pendiente_id; ?>"><?php echo $d->descripcion; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                    <?php //echo vdebug($dc_tipos_predio); ?>
                                        <label for="nivel_id"> Nivel : <span class="text-danger">*</span> </label>
                                        <select class="custom-select form-control required" id="nivel_id" name="data[predio][nivel_id]">
                                            <option value="">Seleccione nivel</option>
                                            <?php foreach ($dc_nivel as $d): ?>
                                                <option value="<?php echo $d->nivel_id; ?>"><?php echo $d->descripcion; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                    <?php //echo vdebug($dc_tipos_predio); ?>
                                        <label for="forma_id"> Forma : <span class="text-danger">*</span> </label>
                                        <select class="custom-select form-control required" id="forma_id" name="data[predio][forma_id]">
                                            <option value="">Seleccione zona</option>
                                            <?php foreach ($dc_forma as $d): ?>
                                                <option value="<?php echo $d->forma_id; ?>"><?php echo $d->descripcion; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="c_principal">Calle Principal : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" id="c_principal" name="data[predio][longitud]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zona">Zona : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" id="zona" name="data[predio][zona]"> 
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="frente">Frente : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" id="frente" name="data[predio][frente]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="fondo">Fondo : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" id="fondo" name="data[predio][fondo]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                        <?php //echo vdebug($dc_tipos_predio); ?>
                                            <label for="forma_id"> Clase Predio : <span class="text-danger">*</span> </label>
                                            <select class="custom-select form-control required" id="forma_id" name="data[predio][forma_id]">
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
                                            <select class="custom-select form-control required" id="forma_id" name="data[predio][forma_id]">
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
                                            <input type="text" class="form-control required" id="forma" name="data[predio][forma]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                        <?php //echo vdebug($dc_tipos_predio); ?>
                                            <label for="forma_id"> Edificio : <span class="text-danger">*</span> </label>
                                            <select class="custom-select form-control required" id="forma_id" name="data[predio][forma_id]">
                                                <option value="">Seleccione edificio</option>
                                                <?php foreach ($dc_edificio as $d): ?>
                                                    <option value="<?php echo $d->edificio_id; ?>"><?php echo $d->descripcion; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col">
                                    <label for="forma_id"> Servicios Basicos : <span class="text-danger">*</span> </label>

                                        <div class="form-group row pt-12">
                                            <div class="col-sm-12">
                                                <?php foreach ($listado_servicios as $key => $ls): ?>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="data[predio][servicios][<?php echo $key; ?>]" value="<?php echo $ls->servicio_id; ?>" id="customCheck<?php echo $key; ?>">
                                                        <label class="custom-control-label" for="customCheck<?php echo $key; ?>"><?php echo $ls->descripcion ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones : </label>
                                            <input type="text" class="form-control" id="observaciones" name="data[predio][observaciones]"> 
                                        </div>
                                    </div>

                                    <!-- <div class="col">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Fotografia Frete :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Foto</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Seleccionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- <div class="col">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Fotografia Plano :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Foto</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Seleccionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                </div>
                                
                            </section>
                            <!-- <input type="submit" value="Guardar">
                            </form> -->
                            <!-- Step 2 -->
                            <h6>Step 2</h6>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jobTitle2">Company Name :</label>
                                            <input type="text" class="form-control required" id="jobTitle2">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="webUrl3">Company URL :</label>
                                            <input type="url" class="form-control required" id="webUrl3" name="webUrl3"> </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="shortDescription3">Short Description :</label>
                                            <textarea name="shortDescription" id="shortDescription3" rows="6" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 3 -->
                            <h6>Step 3</h6>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="wint1">Interview For :</label>
                                            <input type="text" class="form-control required" id="wint1"> </div>
                                        <div class="form-group">
                                            <label for="wintType1">Interview Type :</label>
                                            <select class="custom-select form-control required" id="wintType1" data-placeholder="Type to search cities" name="wintType1">
                                                <option value="Banquet">Normal</option>
                                                <option value="Fund Raiser">Difficult</option>
                                                <option value="Dinner Party">Hard</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="wLocation1">Location :</label>
                                            <select class="custom-select form-control required" id="wLocation1" name="wlocation">
                                                <option value="">Select City</option>
                                                <option value="India">India</option>
                                                <option value="USA">USA</option>
                                                <option value="Dubai">Dubai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="wjobTitle2">Interview Date :</label>
                                            <input type="date" class="form-control required" id="wjobTitle2">
                                        </div>
                                        <div class="form-group">
                                            <label>Requirements :</label>
                                            <div class="mb-2">
                                                <label class="custom-control custom-radio">
                                                    <input id="radio3" name="radio" type="radio" class="custom-control-input">
                                                    <span class="custom-control-label">Employee</span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input id="radio4" name="radio" type="radio" class="custom-control-input">
                                                    <span class="custom-control-label">Contract</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 4 -->
                            <h6>Step 4</h6>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="behName1">Behaviour :</label>
                                            <input type="text" class="form-control required" id="behName1">
                                        </div>
                                        <div class="form-group">
                                            <label for="participants1">Confidance</label>
                                            <input type="text" class="form-control required" id="participants1">
                                        </div>
                                        <div class="form-group">
                                            <label for="participants1">Result</label>
                                            <select class="custom-select form-control required" id="participants1" name="location">
                                                <option value="">Select Result</option>
                                                <option value="Selected">Selected</option>
                                                <option value="Rejected">Rejected</option>
                                                <option value="Call Second-time">Call Second-time</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="decisions1">Comments</label>
                                            <textarea name="decisions" id="decisions1" rows="4" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Rate Interviwer :</label>
                                            <div class="c-inputs-stacked">
                                                <label class="inline custom-control custom-checkbox block">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">1 star</span> </label>
                                                <label class="inline custom-control custom-checkbox block">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">2 star</span> </label>
                                                <label class="inline custom-control custom-checkbox block">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">3 star</span> </label>
                                                <label class="inline custom-control custom-checkbox block">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">4 star</span> </label>
                                                <label class="inline custom-control custom-checkbox block">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">5 star</span> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
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
