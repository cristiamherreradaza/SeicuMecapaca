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
                            <h4 class="card-title">Form Validation</h4>
                            <h6 class="card-subtitle">Bootstrap Form Validation check the <a href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>

                            <!-- <form action="#" class="validation-wizard wizard-circle"> -->
                        <?php echo form_open('predios/guarda', array('class'=>'validation-wizard wizard-circle', 'method'=>'POST')); ?>
                            <h6>Datos del terreno</h6>
                            <section>

                                <div class="row">

                                    <div class="col-md-2">
                                       <div class="form-group">
                                            <label for="codigo_catastral"> Cod Catastral : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="codigo_catastral" name="codigo_catastral"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="codigo_catastral_anterior"> Cod Cat Ant : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="codigo_catastral_anterior" name="codigo_catastral_anterior"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="nro_inmueble"> Num inmueble : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="nro_inmueble" name="nro_inmueble"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="distrito"> Distrito : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="distrito" name="distrito"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="manzana"> Manzana : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="manzana" name="manzana"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="predio"> Predio : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="predio" name="predio"> 
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tipo_predio_id"> Tpo Predio: <span class="text-danger">*</span> </label>
                                            <?php //echo vdebug($dc_tipos_predio); ?>
                                            <select class="custom-select form-control required" id="tipo_predio" name="tipo_predio_id">
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
                                            <input type="text" class="form-control required" id="zona_econo" name="zona_econo"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                        <?php //echo vdebug($dc_tipos_predio); ?>
                                            <label for="zonaurb_id"> Zona urbana: <span class="text-danger">*</span> </label>
                                            <select class="custom-select form-control required" id="zonaurb_id" name="zonaurb_id">
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
                                            <input type="text" class="form-control required" id="n_puerta" name="nro_puerta"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="latitud"> Latitud : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="latitud" name="latitud"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="longintud"> Longitud : <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control required" id="longitud" name="longitud"> 
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="superficie_geo">Superficie Geo : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" id="superficie_geo" name="superficie_geo"> 
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="superficie_campo">Superficie Campo : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" id="superficie_campo" name="superficie_campo"> 
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="superficie_legal">Superficie Legal : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" id="superficie_legal" name="superficie_legal"> 
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ubicacion_id"> Ubicacion : <span class="text-danger">*</span> </label>
                                        <?php //echo vdebug($dc_tipos_predio); ?>
                                        <select class="custom-select form-control required" id="ubicacion_id" name="ubicacion_id">
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
                                        <select class="custom-select form-control required" id="pendiente_id" name="pendiente_id">
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
                                        <select class="custom-select form-control required" id="nivel_id" name="nivel_id">
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
                                        <select class="custom-select form-control required" id="forma_id" name="forma_id">
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
                                            <input type="text" class="form-control required" id="c_principal" name="principal"> 
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zona">Zona : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" id="zona" name="zona"> 
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="frente">Frente : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" id="frente" name="frente"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="fondo">Fondo : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" id="fondo" name="fondo"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                        <?php //echo vdebug($dc_tipos_predio); ?>
                                            <label for="forma_id"> Clase Predio : <span class="text-danger">*</span> </label>
                                            <select class="custom-select form-control required" id="forma_id" name="clase_predio_id">
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
                                            <select class="custom-select form-control required" id="forma_id" name="uso_suelo_id">
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
                                            <input type="text" class="form-control required" id="forma" name="matriz_ph"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                        <?php //echo vdebug($dc_tipos_predio); ?>
                                            <label for="forma_id"> Edificio : <span class="text-danger">*</span> </label>
                                            <select class="custom-select form-control required" id="forma_id" name="edificio_id">
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
                                                        <input type="checkbox" class="custom-control-input" name="dervicios][<?php echo $key; ?>]" value="<?php echo $ls->servicio_id; ?>" id="customCheck<?php echo $key; ?>">
                                                        <label class="custom-control-label" for="customCheck<?php echo $key; ?>"><?php echo $ls->descripcion ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones : </label>
                                            <input type="text" class="form-control" id="observaciones" name="dbservaciones]"> 
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