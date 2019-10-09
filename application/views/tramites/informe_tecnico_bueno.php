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
<style type="text/css">
    input{
        text-transform:uppercase;
    }
</style>
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
                                        <div class="form-group  row">
                                            <label for="example-text-input" class="col-3 col-form-label">CITE: GAMM-SMDT-TEC-Nº </label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="cite" name="cite" readonly value="<?php echo $nro_cite; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">A : </label>
                                            <div class="col-10">
                                                <select class="custom-select col-12" id="a" name="a" required>
                                                    <option value=""></option>
                                                    <?php foreach ($personas as $key => $p): ?>
                                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
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
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">DE : </label>
                                            <div class="col-10">
                                                <select class="custom-select col-12" id="via" name="via" required>
                                                    <option value=""></option>
                                                    <?php foreach ($personas as $key => $p): ?>
                                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group  row">
                                            <label for="example-text-input" class="col-2 col-form-label">REF:</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="nro_tramite" name="nro_tramite" required>
                                            </div>
                                        </div>

                                        <div class="form-group  row">
                                            <label for="example-text-input" class="col-2 col-form-label">FECHA:</label>
                                             <?php $fecha = date('d-m-Y'); ?>
                                            <div class="col-10">
                                              <input type="text" class="form-control" id="fecha_tramite" name="fecha_tramite" readonly value="<?php echo $fecha ?>" required>
                                           
                                            </div>
                                        </div>


                                       
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
                                    <div class="col-md-12 mb-form-group" style="padding-top: 30px; padding-bottom: 20px;">
                                            <u><b>1. ANTECEDENTES</b></u> <br>   
                                        <b>Da curso a la siguiente solicitud</b> <br/>
                                        </div>
                                        <div class="form-group row" >
                                            
                                                GAMM:
                                                <div class="col-3">
                                                    <input class="form-control" type="text" id="gamm" name="gamm" readonly required>
                                                </div>
                                           
                                        
                                                de fecha:
                                                <div class="col-5">
                                                    <input class="form-control" type="date" id="fecha_solicitud" name="fecha_solicitud" required>
                                                </div>
                                           
                                        </div>
                                        <!--SOLICITANTES-->
                                        <div style="padding-bottom: 10px;">
                                            <button class="btn-info" id="adicionar_propietario">Adicionar Solicitantes</button>
                                        </div>
                                                                               
                                        <div class="row">
                                             <div class="form-group  row col-7">
                                                <label for="example-text-input" class="col-3 col-form-label">Solicitante</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="solicitante" name="solicitante" required>
                                                </div>
                                            </div>
                                            <div class="form-group  row col-4">
                                                <label for="example-text-input" class="col-2 col-form-label">CI</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" id="ci1" name="ci1" required>
                                                </div>
                                            </div>
                                           
                                            <input type="hidden" name="persona_id1" id="persona_id1">
                                        </div>
                                        <div id="listas">
                                          
                                        </div>


                                        <?php $lista2 = $this->db->query("SELECT * FROM tramite.tipo_tramite  WHERE activo = '1' ORDER BY tipo_tramite_id ASC")->result();
                                            ?>
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">Objetivo de Tramite : </label>
                                            <div class="col-10">
                                                <select class="custom-select col-12"   id="tipo_tramite_id" name="tipo_tramite_id"  onchange="CargarProductos(this.value);" required>
                                                    <option value=""></option>
                                                    <?php foreach ($lista2 as $tc): ?>
                                                    <option value="<?php echo $tc->tipo_tramite_id; ?>"><?php echo $tc->tramite; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    
                                          

                                        <div class="form-group row ">
                                            <label for="example-text-input" class="col-2 col-form-label">Ubicacion</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="ubicacion" name="ubicacion">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">Lote</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="lote" name="lote">
                                                </div>
                                            </div>
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">Urbanizacion</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="urbanizacion" name="urbanizacion">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">Manzano</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="manzana" name="manzana">
                                                </div>
                                            </div>
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-3 col-form-label">Comunidad</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="comunidad" name="comunidad">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-6 col-form-label">Superficie segun testimonio</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" id="superficie_testimonio" name="superficie_testimonio" required>
                                                </div>
                                            </div>
                                            <div class="form-group row col-6">
                                                <label for="example-text-input" class="col-6 col-form-label">Superficie segun medicion</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" id="superficie_medicion" name="superficie_medicion" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!--------Quitar empadronamiento--------------->

                                        <!-- DESDE AQUI SON LAS VISTAS SEGUN EL TIPO DE TRAMITE -->

                                        <!-- EMPADRONAMIENTO -->

                                        <div class="item" id="bloque_1" style="display: none;">
                                                
                                                
                                                        <div class="col-md-12 mb-form-group " style="padding-top: 30px; padding-bottom: 20px;">
                                                            <u><b>2. DOCUMENTACION PRESENTADA</b></u> <br>
                                                            
                                                        </div>
                                                        <div >
                                                                <div style="padding-bottom: 10px;">
                                                                    <button class="btn-info" id="adicionar_vendedor">Adicionar personas</button>
                                                                </div>
                                                                <div class="row">
                                                                    
                                                                     <div class="form-group row col-7">
                                                                       <b>CARNET DE IDENTIDAD</b>
                                                                    </div>
                                                                    
                                                                    <div class="form-group  row col-7">
                                                                        <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE:</label>
                                                                        <div class="col-9">
                                                                            <input class="form-control" type="text" id="vendedor" name="vendedor" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group  row col-4">
                                                                        <label for="example-text-input" class="col-2 col-form-label">CI</label>
                                                                        <div class="col-10">
                                                                            <input class="form-control" type="text" id="ci2" name="ci2[]" >
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="persona_id2" id="persona_id2">
                                                                </div>
                                                                <div id="listas2">
                                                                </div>
                                                         
                                                        </div>
                                                    <b>Folio</b>


                                                          <div class="row">
                                                        <div class="form-group row col-4">
                                                            <label for="example-text-input" class="col-6 col-form-label">N°</label>
                                                            <div class="col-6">
                                                                <input class="form-control" type="text" id="superficie_testimonio" name="superficie_testimonio" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row col-5">
                                                            <label for="example-text-input" class="col-6 col-form-label">SUPERFICIE</label>
                                                            <div class="col-6">
                                                                <input class="form-control" type="text" id="superficie_medicion" name="superficie_medicion" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="transferencia">
                                                        <div style="padding-bottom: 10px;">
                                                            <button class="btn-info" id="">Adicionar personas</button>
                                                        </div>
                                                        <div class="row">
                                                            
                                                
                                                            <div class="form-group  row col-7">
                                                                <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE:</label>
                                                                <div class="col-9">
                                                                    <input class="form-control" type="text" id="vendedor" name="vendedor" >
                                                                </div>
                                                            </div>
                                                           
                                                            <input type="hidden" name="persona_id2" id="persona_id2">
                                                        </div>
                                                        <div id="listas3">
                                                        </div>
                                                         
                                                    </div>

                                                        <div class="col-md-12 mb-form-group" style="padding-top: 30px; padding-bottom: 20px;">
                                                            <b>Testimonio de propiedad</b>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group row col-4">
                                                                <label for="example-text-input" class="col-4 col-form-label">N°</label>
                                                                <div class="col-8">
                                                                    <input class="form-control" type="text" id="nro_testimonio" name="nro_testimonio" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row col-4">
                                                                <label for="example-text-input" class="col-4 col-form-label">Notaria</label>
                                                                <div class="col-8">
                                                                    <input class="form-control" type="text" id="notaria" name="notaria" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row col-4">
                                                                <label for="example-text-input" class="col-4 col-form-label">Fecha</label>
                                                                <div class="col-8">
                                                                    <input class="form-control" type="date" id="fecha_testimonio" name="fecha_testimonio" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-2 col-form-label">Notario Dr(a)</label>
                                                            <div class="col-10">
                                                                <input class="form-control" type="text" id="notario" name="notario" required>
                                                            </div>
                                                        </div>

                                                        <div class="transferencia">
                                                        <div style="padding-bottom: 10px;">
                                                            <button class="btn-info" id="">Adicionar personas</button>
                                                        </div>
                                                        <div class="row">
                                                            
                                                
                                                            <div class="form-group  row col-7">
                                                                <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE:</label>
                                                                <div class="col-9">
                                                                    <input class="form-control" type="text" id="vendedor" name="vendedor" >
                                                                </div>
                                                            </div>
                                                          
                                                            <input type="hidden" name="persona_id2" id="persona_id2">
                                                        </div>
                                                        <div id="listas3">
                                                        </div>
                                                         
                                                    </div>
                                                        <div class="col-md-12 mb-form-group ">
                                                            <b>Impuestos</b>
                                                        </div>
                                                
                                                    
                                                   

                                                   
                                                    
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-2 col-form-label"></label>
                                                        <div class="col-10">
                                                            <input class="form-control" type="text"id="impuestos" name="impuestos" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-form-group ">
                                                        <u><b>3. CARACTERISTICAS DE LA PROPIEDAD</b></u>
                                                    </div>
                                                     <div class="row">
                                                        <div class="form-group row col-6">
                                                            <label for="example-text-input" class="col-6 col-form-label">Superficie segun testimonio</label>
                                                            <div class="col-6">
                                                                <input class="form-control" type="text" id="superficie_testimonio" name="superficie_testimonio" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row col-6">
                                                            <label for="example-text-input" class="col-6 col-form-label">Superficie segun medicion</label>
                                                            <div class="col-6">
                                                                <input class="form-control" type="text" id="superficie_medicion" name="superficie_medicion" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-form-group ">
                                                        <u><b>4. OBSERVACIONES</b></u>
                                                    </div>
                                                    <div class="form-group  row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Observaciones</label>
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" id="observaciones" name="observaciones" >
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 mb-form-group ">
                                                        <u><b>5. CONCLUSIONES Y RECOMENDACIONES</b></u>
                                                    </div>
                                                    <div class="form-group  row">
                                                        
                                                        <div class="col-12">
                                                            De acuerdo a la revisión de la carpeta presentada, la solicitud <b> PROCEDE </b>a favor de la parte interesada. Se recomienda la aprobación del trámite, salvo mejor criterio de su autoridad.
                                                            <br>
                                                            Es cuanto informo a su persona, sin otro particular saludo a usted con las consideraciones más distinguidas.
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 mb-form-group ">
                                                       <u><b> Glosa del certificado de superficie (Datos del predio anterior)</b></u>
                                                    </div>
                                                    <div class="form-group  row">
                                                        
                                                        <div class="col-12">
                                                            <textarea style="text-transform:uppercase;" rows="3" class="form-control" type="text" id="glosa" name="glosa" placeholder="LA SUPERFICE EN CUESTION SE ENCUENTRA UBICADA EN EX HACIENDA HUAJCHILLA, URBANIZACION LAS PALMERAS II, LOTE 3-B, MANZANO B, CON UNA SUPERFICIE DE 715,16 M2 SEGUN MEDICION REGISTRADO EN LA UNIDAD DE CATASTRO, DEL GOBIERNO AUTONOMO MUNICIPAL DE MECAPACA"></textarea>
                                                        </div>
                                                    </div>

                                                
                                        </div> 

                                        <!-- APROBACION DE PLANO DE LOTE Y CERT. DE JURISDICCION -->

                                        <div class="item" id="bloque_4" style="display: none;">
                                                        <div class="quitar">
                                                    <div class="col-md-12 mb-form-group " style="padding-top: 30px; padding-bottom: 20px;">
                                                        <u><b>2. DOCUMENTACION PRESENTADA</b></u> <br>
                                                        
                                                    </div>
                                                    <div class="transferencia">
                                                    <div style="padding-bottom: 10px;">
                                                        <button class="btn-info" id="adicionar_vendedor">Adicionar personas</button>
                                                    </div>
                                                    <div class="row">
                                                        
                                            
                                                        <div class="form-group  row col-7">
                                                            <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE:</label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="text" id="vendedor" name="vendedor" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group  row col-4">
                                                            <label for="example-text-input" class="col-2 col-form-label">CI</label>
                                                            <div class="col-10">
                                                                <input class="form-control" type="text" id="ci2" name="ci2[]" >
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="persona_id2" id="persona_id2">
                                                    </div>
                                                    <div id="listas2">
                                                    </div>
                                                     
                                                </div>
                                                <b>Folio</b>


                                                      <div class="row">
                                                    <div class="form-group row col-4">
                                                        <label for="example-text-input" class="col-6 col-form-label">N°</label>
                                                        <div class="col-6">
                                                            <input class="form-control" type="text" id="superficie_testimonio" name="superficie_testimonio" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row col-5">
                                                        <label for="example-text-input" class="col-6 col-form-label">SUPERFICIE</label>
                                                        <div class="col-6">
                                                            <input class="form-control" type="text" id="superficie_medicion" name="superficie_medicion" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="transferencia">
                                                    <div style="padding-bottom: 10px;">
                                                        <button class="btn-info" id="">Adicionar personas</button>
                                                    </div>
                                                    <div class="row">
                                                        
                                            
                                                        <div class="form-group  row col-7">
                                                            <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE:</label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="text" id="vendedor" name="vendedor" >
                                                            </div>
                                                        </div>
                                                       
                                                        <input type="hidden" name="persona_id2" id="persona_id2">
                                                    </div>
                                                    <div id="listas3">
                                                    </div>
                                                     
                                                </div>

                                                    <div class="col-md-12 mb-form-group" style="padding-top: 30px; padding-bottom: 20px;">
                                                        <b>Testimonio de propiedad</b>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group row col-4">
                                                            <label for="example-text-input" class="col-4 col-form-label">N°</label>
                                                            <div class="col-8">
                                                                <input class="form-control" type="text" id="nro_testimonio" name="nro_testimonio" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row col-4">
                                                            <label for="example-text-input" class="col-4 col-form-label">Notaria</label>
                                                            <div class="col-8">
                                                                <input class="form-control" type="text" id="notaria" name="notaria" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row col-4">
                                                            <label for="example-text-input" class="col-4 col-form-label">Fecha</label>
                                                            <div class="col-8">
                                                                <input class="form-control" type="date" id="fecha_testimonio" name="fecha_testimonio" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Notario Dr(a)</label>
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" id="notario" name="notario" required>
                                                        </div>
                                                    </div>

                                                    <div class="transferencia">
                                                    <div style="padding-bottom: 10px;">
                                                        <button class="btn-info" id="">Adicionar personas</button>
                                                    </div>
                                                    <div class="row">
                                                        
                                            
                                                        <div class="form-group  row col-7">
                                                            <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE:</label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="text" id="vendedor" name="vendedor" >
                                                            </div>
                                                        </div>
                                                      
                                                        <input type="hidden" name="persona_id2" id="persona_id2">
                                                    </div>
                                                    <div id="listas3">
                                                    </div>
                                                     
                                                </div>
                                                    <div class="col-md-12 mb-form-group ">
                                                        <b>Impuestos</b>
                                                    </div>
                                                </div>
                                                
                                               

                                               
                                                
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-2 col-form-label"></label>
                                                    <div class="col-10">
                                                        <input class="form-control" type="text"id="impuestos" name="impuestos" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-form-group ">
                                                    <u><b>3. CARACTERISTICAS DE LA PROPIEDAD</b></u>
                                                </div>
                                                 <div class="row">
                                                    <div class="form-group row col-6">
                                                        <label for="example-text-input" class="col-6 col-form-label">Superficie segun testimonio</label>
                                                        <div class="col-6">
                                                            <input class="form-control" type="text" id="superficie_testimonio" name="superficie_testimonio" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row col-6">
                                                        <label for="example-text-input" class="col-6 col-form-label">Superficie segun medicion</label>
                                                        <div class="col-6">
                                                            <input class="form-control" type="text" id="superficie_medicion" name="superficie_medicion" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-form-group ">
                                                    <u><b>4. OBSERVACIONES</b></u>
                                                </div>
                                                <div class="form-group  row">
                                                    <label for="example-text-input" class="col-2 col-form-label">Observaciones</label>
                                                    <div class="col-10">
                                                        <input class="form-control" type="text" id="observaciones" name="observaciones" >
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-form-group ">
                                                    <u><b>5. CONCLUSIONES Y RECOMENDACIONES</b></u>
                                                </div>
                                                <div class="form-group  row">
                                                    
                                                    <div class="col-12">
                                                        De acuerdo a la revisión de la carpeta presentada, la solicitud <b> PROCEDE </b>a favor de la parte interesada. Se recomienda la aprobación del trámite, salvo mejor criterio de su autoridad.
                                                        <br>
                                                        Es cuanto informo a su persona, sin otro particular saludo a usted con las consideraciones más distinguidas.
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-form-group ">
                                                   <u><b> Glosa del certificado de superficie (Datos del predio anterior)</b></u>
                                                </div>
                                                <div class="form-group  row">
                                                    
                                                    <div class="col-12">
                                                        <textarea style="text-transform:uppercase;" rows="3" class="form-control" type="text" id="glosa" name="glosa" placeholder="LA SUPERFICE EN CUESTION SE ENCUENTRA UBICADA EN EX HACIENDA HUAJCHILLA, URBANIZACION LAS PALMERAS II, LOTE 3-B, MANZANO B, CON UNA SUPERFICIE DE 715,16 M2 SEGUN MEDICION REGISTRADO EN LA UNIDAD DE CATASTRO, DEL GOBIERNO AUTONOMO MUNICIPAL DE MECAPACA"></textarea>
                                                    </div>
                                                </div>

                                                
                                        </div> 

                                        <!-- TRANSFERENCIA -->

                                        <div class="item" id="bloque_6" style="display: none;">
                                                

                                                
                                        </div> 

                                        <!-- APROBACION DE PLANO DE DIVISIÓN Y PARTICION -->

                                        <div class="item" id="bloque_8" style="display: none;">
                                                

                                                
                                        </div> 

                                        <!-- APROBACION DE FRACCIONAMIENTO EN PROPIEDAD HORIZONTAL -->

                                        <div class="item" id="bloque_16" style="display: none;">
                                                <div class="quitar">
                                                    <div class="col-md-12 mb-form-group " style="padding-top: 30px; padding-bottom: 20px;">
                                                        <u><b>2. DOCUMENTACION PRESENTADA</b></u> <br>
                                                        
                                                    </div>
                                                    <div class="transferencia">
                                                    <div style="padding-bottom: 10px;">
                                                        <button class="btn-info" id="adicionar_vendedor">Adicionar personas</button>
                                                    </div>
                                                    <div class="row">
                                                        
                                            
                                                        <div class="form-group  row col-7">
                                                            <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE:</label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="text" id="vendedor" name="vendedor" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group  row col-4">
                                                            <label for="example-text-input" class="col-2 col-form-label">CI</label>
                                                            <div class="col-10">
                                                                <input class="form-control" type="text" id="ci2" name="ci2[]" >
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="persona_id2" id="persona_id2">
                                                    </div>
                                                    <div id="listas2">
                                                    </div>
                                                     
                                                </div>
                                                <b>Folio</b>


                                                      <div class="row">
                                                    <div class="form-group row col-4">
                                                        <label for="example-text-input" class="col-6 col-form-label">N°</label>
                                                        <div class="col-6">
                                                            <input class="form-control" type="text" id="superficie_testimonio" name="superficie_testimonio" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row col-5">
                                                        <label for="example-text-input" class="col-6 col-form-label">SUPERFICIE</label>
                                                        <div class="col-6">
                                                            <input class="form-control" type="text" id="superficie_medicion" name="superficie_medicion" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="transferencia">
                                                    <div style="padding-bottom: 10px;">
                                                        <button class="btn-info" id="">Adicionar personas</button>
                                                    </div>
                                                    <div class="row">
                                                        
                                            
                                                        <div class="form-group  row col-7">
                                                            <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE:</label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="text" id="vendedor" name="vendedor" >
                                                            </div>
                                                        </div>
                                                       
                                                        <input type="hidden" name="persona_id2" id="persona_id2">
                                                    </div>
                                                    <div id="listas3">
                                                    </div>
                                                     
                                                </div>

                                                    <div class="col-md-12 mb-form-group" style="padding-top: 30px; padding-bottom: 20px;">
                                                        <b>Testimonio de propiedad</b>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group row col-4">
                                                            <label for="example-text-input" class="col-4 col-form-label">N°</label>
                                                            <div class="col-8">
                                                                <input class="form-control" type="text" id="nro_testimonio" name="nro_testimonio" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row col-4">
                                                            <label for="example-text-input" class="col-4 col-form-label">Notaria</label>
                                                            <div class="col-8">
                                                                <input class="form-control" type="text" id="notaria" name="notaria" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row col-4">
                                                            <label for="example-text-input" class="col-4 col-form-label">Fecha</label>
                                                            <div class="col-8">
                                                                <input class="form-control" type="date" id="fecha_testimonio" name="fecha_testimonio" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Notario Dr(a)</label>
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" id="notario" name="notario" required>
                                                        </div>
                                                    </div>

                                                    <div class="transferencia">
                                                    <div style="padding-bottom: 10px;">
                                                        <button class="btn-info" id="">Adicionar personas</button>
                                                    </div>
                                                    <div class="row">
                                                        
                                            
                                                        <div class="form-group  row col-7">
                                                            <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE:</label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="text" id="vendedor" name="vendedor" >
                                                            </div>
                                                        </div>
                                                      
                                                        <input type="hidden" name="persona_id2" id="persona_id2">
                                                    </div>
                                                    <div id="listas3">
                                                    </div>
                                                     
                                                </div>
                                                    <div class="col-md-12 mb-form-group ">
                                                        <b>Impuestos</b>
                                                    </div>
                                                </div>
                                                
                                               

                                               
                                                
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-2 col-form-label"></label>
                                                    <div class="col-10">
                                                        <input class="form-control" type="text"id="impuestos" name="impuestos" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-form-group ">
                                                    <u><b>3. CARACTERISTICAS DE LA PROPIEDAD</b></u>
                                                </div>
                                                 <div class="row">
                                                    <div class="form-group row col-6">
                                                        <label for="example-text-input" class="col-6 col-form-label">Superficie segun testimonio</label>
                                                        <div class="col-6">
                                                            <input class="form-control" type="text" id="superficie_testimonio" name="superficie_testimonio" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row col-6">
                                                        <label for="example-text-input" class="col-6 col-form-label">Superficie segun medicion</label>
                                                        <div class="col-6">
                                                            <input class="form-control" type="text" id="superficie_medicion" name="superficie_medicion" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-form-group ">
                                                    <u><b>4. OBSERVACIONES</b></u>
                                                </div>
                                                <div class="form-group  row">
                                                    <label for="example-text-input" class="col-2 col-form-label">Observaciones</label>
                                                    <div class="col-10">
                                                        <input class="form-control" type="text" id="observaciones" name="observaciones" >
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-form-group ">
                                                    <u><b>5. CONCLUSIONES Y RECOMENDACIONES</b></u>
                                                </div>
                                                <div class="form-group  row">
                                                    
                                                    <div class="col-12">
                                                        De acuerdo a la revisión de la carpeta presentada, la solicitud <b> PROCEDE </b>a favor de la parte interesada. Se recomienda la aprobación del trámite, salvo mejor criterio de su autoridad.
                                                        <br>
                                                        Es cuanto informo a su persona, sin otro particular saludo a usted con las consideraciones más distinguidas.
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-form-group ">
                                                   <u><b> Glosa del certificado de superficie (Datos del predio anterior)</b></u>
                                                </div>
                                                <div class="form-group  row">
                                                    
                                                    <div class="col-12">
                                                        <textarea style="text-transform:uppercase;" rows="3" class="form-control" type="text" id="glosa" name="glosa" placeholder="LA SUPERFICE EN CUESTION SE ENCUENTRA UBICADA EN EX HACIENDA HUAJCHILLA, URBANIZACION LAS PALMERAS II, LOTE 3-B, MANZANO B, CON UNA SUPERFICIE DE 715,16 M2 SEGUN MEDICION REGISTRADO EN LA UNIDAD DE CATASTRO, DEL GOBIERNO AUTONOMO MUNICIPAL DE MECAPACA"></textarea>
                                                    </div>
                                                </div>

                                                
                                        </div> 

                                        <!-- APROBACION DE PLANO DE LOTE Y CERTIFICADO DE NO CATASTRO -->

                                        <div class="item" id="bloque_17" style="display: none;">
                                                <div class="quitar">
                                                    <div class="col-md-12 mb-form-group " style="padding-top: 30px; padding-bottom: 20px;">
                                                        <u><b>2. DOCUMENTACION PRESENTADA</b></u> <br>
                                                        
                                                    </div>
                                                    <div class="transferencia">
                                                    <div style="padding-bottom: 10px;">
                                                        <button class="btn-info" id="adicionar_vendedor">Adicionar personas</button>
                                                    </div>
                                                    <div class="row">
                                                        
                                            
                                                        <div class="form-group  row col-7">
                                                            <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE:</label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="text" id="vendedor" name="vendedor" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group  row col-4">
                                                            <label for="example-text-input" class="col-2 col-form-label">CI</label>
                                                            <div class="col-10">
                                                                <input class="form-control" type="text" id="ci2" name="ci2[]" >
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="persona_id2" id="persona_id2">
                                                    </div>
                                                    <div id="listas2">
                                                    </div>
                                                     
                                                </div>
                                                <b>Folio</b>


                                                      <div class="row">
                                                    <div class="form-group row col-4">
                                                        <label for="example-text-input" class="col-6 col-form-label">N°</label>
                                                        <div class="col-6">
                                                            <input class="form-control" type="text" id="superficie_testimonio" name="superficie_testimonio" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row col-5">
                                                        <label for="example-text-input" class="col-6 col-form-label">SUPERFICIE</label>
                                                        <div class="col-6">
                                                            <input class="form-control" type="text" id="superficie_medicion" name="superficie_medicion" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="transferencia">
                                                    <div style="padding-bottom: 10px;">
                                                        <button class="btn-info" id="">Adicionar personas</button>
                                                    </div>
                                                    <div class="row">
                                                        
                                            
                                                        <div class="form-group  row col-7">
                                                            <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE:</label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="text" id="vendedor" name="vendedor" >
                                                            </div>
                                                        </div>
                                                       
                                                        <input type="hidden" name="persona_id2" id="persona_id2">
                                                    </div>
                                                    <div id="listas3">
                                                    </div>
                                                     
                                                </div>

                                                    <div class="col-md-12 mb-form-group" style="padding-top: 30px; padding-bottom: 20px;">
                                                        <b>Testimonio de propiedad</b>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group row col-4">
                                                            <label for="example-text-input" class="col-4 col-form-label">N°</label>
                                                            <div class="col-8">
                                                                <input class="form-control" type="text" id="nro_testimonio" name="nro_testimonio" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row col-4">
                                                            <label for="example-text-input" class="col-4 col-form-label">Notaria</label>
                                                            <div class="col-8">
                                                                <input class="form-control" type="text" id="notaria" name="notaria" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row col-4">
                                                            <label for="example-text-input" class="col-4 col-form-label">Fecha</label>
                                                            <div class="col-8">
                                                                <input class="form-control" type="date" id="fecha_testimonio" name="fecha_testimonio" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Notario Dr(a)</label>
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" id="notario" name="notario" required>
                                                        </div>
                                                    </div>

                                                    <div class="transferencia">
                                                    <div style="padding-bottom: 10px;">
                                                        <button class="btn-info" id="">Adicionar personas</button>
                                                    </div>
                                                    <div class="row">
                                                        
                                            
                                                        <div class="form-group  row col-7">
                                                            <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE:</label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="text" id="vendedor" name="vendedor" >
                                                            </div>
                                                        </div>
                                                      
                                                        <input type="hidden" name="persona_id2" id="persona_id2">
                                                    </div>
                                                    <div id="listas3">
                                                    </div>
                                                     
                                                </div>
                                                    <div class="col-md-12 mb-form-group ">
                                                        <b>Impuestos</b>
                                                    </div>
                                                </div>
                                                
                                               

                                               
                                                
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-2 col-form-label"></label>
                                                    <div class="col-10">
                                                        <input class="form-control" type="text"id="impuestos" name="impuestos" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-form-group ">
                                                    <u><b>3. CARACTERISTICAS DE LA PROPIEDAD</b></u>
                                                </div>
                                                 <div class="row">
                                                    <div class="form-group row col-6">
                                                        <label for="example-text-input" class="col-6 col-form-label">Superficie segun testimonio</label>
                                                        <div class="col-6">
                                                            <input class="form-control" type="text" id="superficie_testimonio" name="superficie_testimonio" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row col-6">
                                                        <label for="example-text-input" class="col-6 col-form-label">Superficie segun medicion</label>
                                                        <div class="col-6">
                                                            <input class="form-control" type="text" id="superficie_medicion" name="superficie_medicion" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-form-group ">
                                                    <u><b>4. OBSERVACIONES</b></u>
                                                </div>
                                                <div class="form-group  row">
                                                    <label for="example-text-input" class="col-2 col-form-label">Observaciones</label>
                                                    <div class="col-10">
                                                        <input class="form-control" type="text" id="observaciones" name="observaciones" >
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-form-group ">
                                                    <u><b>5. CONCLUSIONES Y RECOMENDACIONES</b></u>
                                                </div>
                                                <div class="form-group  row">
                                                    
                                                    <div class="col-12">
                                                        De acuerdo a la revisión de la carpeta presentada, la solicitud <b> PROCEDE </b>a favor de la parte interesada. Se recomienda la aprobación del trámite, salvo mejor criterio de su autoridad.
                                                        <br>
                                                        Es cuanto informo a su persona, sin otro particular saludo a usted con las consideraciones más distinguidas.
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-form-group ">
                                                   <u><b> Glosa del certificado de superficie (Datos del predio anterior)</b></u>
                                                </div>
                                                <div class="form-group  row">
                                                    
                                                    <div class="col-12">
                                                        <textarea style="text-transform:uppercase;" rows="3" class="form-control" type="text" id="glosa" name="glosa" placeholder="LA SUPERFICE EN CUESTION SE ENCUENTRA UBICADA EN EX HACIENDA HUAJCHILLA, URBANIZACION LAS PALMERAS II, LOTE 3-B, MANZANO B, CON UNA SUPERFICIE DE 715,16 M2 SEGUN MEDICION REGISTRADO EN LA UNIDAD DE CATASTRO, DEL GOBIERNO AUTONOMO MUNICIPAL DE MECAPACA"></textarea>
                                                    </div>
                                                </div>

                                                
                                        </div> 

                                        <!-- OTROS -->

                                        <div class="item" id="bloque_17" style="display: none;">
                                                <!-- OTROS ACTIVOS FIJOS -->

                                                
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
                            <!-- <div class=""><img src="<?php echo base_url(); ?>public/assets/images/users/1.jpg" alt="user" class="img-circle" width="100"></div> -->
                            <div class="pl-3">
                                <h3 style="color: white;" class="font-medium">Forma de llenar el formulario</h3>
                                <!-- <h6 style="color: white;">UIUX Designer</h6> -->
                            </div>
                        </div>
                        <div class="row mt-5">
                            <!-- <div class="col border-right">
                                <h2 style="color: white;" class="font-light">14</h2>
                                <h6 style="color: white;" >Photos</h6></div>
                            <div class="col border-right">
                                <h2 style="color: white;" class="font-light">54</h2>
                                <h6 style="color: white;">Videos</h6></div>
                            <div class="col">
                                <h2 style="color: white;" class="font-light">145</h2>
                                <h6 style="color: white;" >Tasks</h6></div> -->
                            

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

<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap&libraries=drawing" async defer></script>
<script type="text/javascript">
    // $("#ci1").focusout(function(){
    //     var ci = $("#ci1").val();
    //     var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    //     var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    //     $.ajax({
    //         url: '<?php echo base_url(); ?>tipo_tramite/verificarCedula/',
    //         type: 'GET',
    //         dataType: 'json',
    //         data: {csrfName: csrfHash, param1: ci},
    //         // data: {param1: cod_catastral},
    //         success:function(data, textStatus, jqXHR) {
    //             //alert("Se envio bien");
    //             // csrfName = data.csrfName;
    //             // csrfHash = data.csrfHash;
    //             // alert(data.message);
    //             if (data.estado == 'si' ) {
    //                 // console.log('Si se esta');
    //                 $("#ci1").val(data.ci);
    //                 $('#solicitante').val(data.nombres);
    //                 $("#persona_id1").val(data.persona_id);
    //             } else {
    //                 $('#solicitante').val('');
    //                 $("#persona_id1").val('');
    //                 alert('no encontrado');
    //             }
    //         },
    //         error:function(jqXHR, textStatus, errorThrown) {
    //             // alert("error");
    //         }
    //     });
    // });
    $("#ci2").focusout(function(){
        var ci = $("#ci2").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            url: '<?php echo base_url(); ?>tipo_tramite/verificarCedula/',
            type: 'GET',
            dataType: 'json',
            data: {csrfName: csrfHash, param1: ci},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {
                //alert("Se envio bien");
                // csrfName = data.csrfName;
                // csrfHash = data.csrfHash;
                // alert(data.message);

                if (data.estado == 'si' ) {
                    // console.log('Si se esta');
                    $("#ci2").val(data.ci);
                    $('#vendedor').val(data.nombres);
                    $("#persona_id2").val(data.persona_id);
                } else {
                    $('#vendedor').val(' ');
                    $("#persona_id2").val('');
                    alert('no encontrado');
                }
            },
            error:function(jqXHR, textStatus, errorThrown) {
                // alert("error");
            }
        });
    });
</script>
<script type="text/javascript">
    function CargarProductos(val){  
        if(val == 1){
            //alert(' es empadronamiento');
            $('.quitar').hide();
            $('.transferencia').hide();
            $('.empadronamiento').show();
        }else if(val== 6){
            //alert('Transferencia');
             $('.transferencia').show();
             $('.empadronamiento').hide();
              $('.quitar').show();
        }else{
            $('.empadronamiento').hide();
            $('.transferencia').hide();
            $('.quitar').show();
        }
    }
</script>
<script type="text/javascript">
    var campos_max = 10;   //max de 10 campos
        var x = 0;
        $('#adicionar_propietario').click (function(e) {
            e.preventDefault();     //prevenir novos clicks
            if (x < campos_max) {
                $('#listas').append('<div class="row">\
                    <div class="form-group  row col-7">\
                                            <label for="example-text-input" class="col-3 col-form-label">Solicitante</label>\
                                            <div class="col-9">\
                                                <input class="form-control" type="text" id="solicitante'+x+'" name="solicitante[]">\
                                            </div>\
                                        </div>\
                                        <div class="form-group  row col-4">\
                                            <label for="example-text-input" class="col-2 col-form-label">CI</label>\
                                            <div class="col-10">\
                                                <input class="form-control" type="text" id="ci'+x+'" name="ci[]">\
                                            </div>\
                                        </div>\<input type="hidden" name="persona_id1" id="persona_id1">\
                                        <a href="#" class="remover_campo">Remover</a>\
                                    </div>');
                
                x++;
            }
        });
        // Remover o div anterior
        $('#listas').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
        });
</script>
<script type="text/javascript">
    var campos_max = 10;   //max de 10 campos
        var x = 0;
        $('#adicionar_propietario').click (function(e) {
            e.preventDefault();     //prevenir novos clicks
            if (x < campos_max) {
                $('#listas').append('<div class="row">\
                    <div class="form-group  row col-7">\
                                            <label for="example-text-input" class="col-3 col-form-label">Solicitante</label>\
                                            <div class="col-9">\
                                                <input class="form-control" type="text" id="solicitante'+x+'" name="solicitante[]">\
                                            </div>\
                                        </div>\
                                        <div class="form-group  row col-4">\
                                            <label for="example-text-input" class="col-2 col-form-label">CI</label>\
                                            <div class="col-10">\
                                                <input class="form-control" type="text" id="ci'+x+'" name="ci[]">\
                                            </div>\
                                        </div>\<input type="hidden" name="persona_id1" id="persona_id1">\
                                    </div>');
                
                x++;
            }
        });
       
</script>
<script type="text/javascript">
    var campos_max = 10;   //max de 10 campos
        var x = 0;
        $('#adicionar_vendedor').click (function(e) {
            e.preventDefault();     //prevenir novos clicks
            if (x < campos_max) {
                $('#listas2').append('<div class="row">\
                                        <div class="form-group  row col-7">\
                                            <label for="example-text-input" class="col-3 col-form-label">A FAVOR DE: </label>\
                                            <div class="col-9">\
                                                <input class="form-control" type="text" id="vendedor'+x+'" name="vendedor" required>\
                                            </div>\
                                        </div>\
                                        <div class="form-group  row col-4">\
                                            <label for="example-text-input" class="col-2 col-form-label">CI</label>\
                                            <div class="col-10">\
                                                <input class="form-control" type="text" id="ci2'+x+'" name="ci2" required>\
                                            </div>\
                                        </div>\
                                        <input type="hidden" name="persona_id2" id="persona_id2">\
                                        <a href="#" class="remover_campo2">Remover</a>\
                                    </div>');
                x++;
            }
        });
        // Remover o div anterior
        $('#listas2').on("click",".remover_campo2",function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
</script>
<script type="text/javascript">
    $('#nro_tramite').on('change', function(e){
            var nro = e.target.value;
            $('#gamm').val(nro);
    
        });
    $('#tipo_tramite_id').on('change', function(e){
        var id = e.target.value;
        
        $('.item').hide('slow');
        $("#bloque_"+id).show('slow');
    
        });


                

</script>