<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">
<style type="text/css">
    .collapse-lg{
        right: 0;
    }
</style>



<div class="page-wrapper">
    <div class="container-fluid">
       <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <?php echo form_open('tipo_tramite/consulta_proforma', array('method'=>'POST')); ?>
                                <h4 class="card-title">Busqueda</h4>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom03">Nro de cite<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="cite" name="cite" placeholder="Numero de cite" value="<?php echo $cite ?>">
                                        <div class="invalid-feedback">
                                            Por Favor Ingrese .
                                        </div>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                                <!-- <button class="btn btn-primary" type="button" data-toggle="modal" data-target=".bd-example-modal-lg1" id="citebutton" type="submit">Buscar</button> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <div class="modal-body">
                            <!-- <form action="#"> -->
                                    <?php echo form_open('tipo_tramite/insertar', array('method'=>'POST', 'id'=>'insertar')); ?>
                                    <div class="form-body">
                                        <h3 class="card-title" align="center" style="font-size: 15px;"><b>GOBIERNO AUTONOMO MUNICIPAL DE MECAPACA</b></h3>
                                        <h3 class="card-title" align="center" style="font-size: 15px;">SECRETARIA MUNICIPAL DEL DEPARTAMENTO T&Eacute;CNICO</h3>
                                        <h3 class="card-title" align="center" style="font-size: 15px;">UNIDAD DE CATASTRO Y CARTOGRAF&Iacute;A</h3>
                                        <h3 class="card-title" align="center" style="font-size: 18px; "><b>PROFORMA DE PAGO</b></h3>

                                        <div class="row">

                                            <div class="col-md-3 offset-md-2">
                                                <div class="form-group">
                                                    <!-- <label>City</label> -->
                                                    <input type="text" class="form-control" id="cite1" name="cite" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"> de fecha</label>
                                                    <div class="col-md-9">
                                                        <input type="date" class="form-control" id="fecha_proforma" name="fecha_proforma" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!--/span-->
                                        </div>

                                        <h3 class="box-title" style="font-size: 15px;"><b>RUBRO 1 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; IDENTIFICACI&Oacute;N DEL PROPIETARIO</b></h3>
                                        
                                        <div class="row">
                                            <div class="col-lg-9 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">DATOS PERSONALES</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="propietario1" name="propietario1" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="propietario2" name="propietario2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="box-title" style="font-size: 15px;"><b>RUBRO 2 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; IDENTIFICACI&Oacute;N DEL TERRENO</b></h3>

                                        <div class="row">
                                            <div class="col-lg-11 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">UBICACI&Oacute;N</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-5 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5">LOTE</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control" id="lote" name="lote">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-4">SUPERFICIE TOTAL</label>
                                                    <div class="col-md-6" >
                                                        <input type="text" class="form-control" id="superficie_total" name="superficie_total" required>
                                                    </div>
                                                    <div style="float: left;">
                                                        m&sup2;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-5 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5">MANZANO</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control" id="manzano" name="manzano">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-4">URBANIZACI&Oacute;N</label>
                                                    <div class="col-md-6" >
                                                        <input type="text" class="form-control" id="urbanizacion" name="urbanizacion">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-11 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">JURISDICCI&Oacute;N</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="jurisdicion" name="jurisdicion" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-5 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5">SECCI&Oacute;N MUNICIPAL</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control" id="seccion_municipal" name="seccion_municipal" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-4">PROVINCIA</label>
                                                    <div class="col-md-6" >
                                                        <input type="text" class="form-control" id="provincia" name="provincia" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-5 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5">DEPARTAMENTO</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control" id="departamento" name="departamento" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-4">CODIGO CATASTRAL</label>
                                                    <div class="col-md-6" >
                                                        <input type="text" class="form-control" id="codigo_catastral" name="codigo_catastral">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-5 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5">FECHA</label>
                                                    <div class="col-md-7">
                                                        <input type="date" class="form-control" id="fecha" name="fecha">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-4">MATRICULA FOLIO REAL</label>
                                                    <div class="col-md-6" >
                                                        <input type="text" class="form-control" id="matricula_folio_real" name="matricula_folio_real" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-5 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5">V&Aacute;LIDO POR</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control" id="valido_por" name="valido_por">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-4">USO DEL PREDIO</label>
                                                    <div class="col-md-6" >
                                                        <input type="text" class="form-control" id="uso_predio" name="uso_predio">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                         <h3 class="box-title" style="font-size: 15px;"><b>RUBRO 3 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; INFORMACI&Oacute;N</b></h3>

                                        <div class="row">
                                            <div class="col-lg-11 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">TIPO DE TRAMITE</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="tipo_tramite" name="tipo_tramite" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-7 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-4">A</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" id="a" name="a" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-4">CI.</label>
                                                    <div class="col-md-6" >
                                                        <input type="text" class="form-control" id="ci" name="ci" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-7 col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-4">METROS CONSTRUIDOS</label>
                                                    <div class="col-md-6" >
                                                        <input type="text" class="form-control" id="metros_construidos" name="metros_construidos">
                                                    </div>
                                                    <div style="float: left;">
                                                        m&sup2;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="box-title" style="font-size: 15px;"><b>RUBRO 4</b></h3>

                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-6">LINEA Y NIVEL </label>
                                            <div class="col-md-3 offset-md-1">
                                                <input type="text" class="form-control monto" id="txt_campo_1" name="linea_nivel" onkeyup="sumar();">
                                            </div>
                                        </div>

                                        <h3 class="box-title" style="font-size: 15px;"><b>RUBRO 5</b></h3>
                                       <div class="form-group row">
                                            <label class="control-label text-right col-md-6">AUTORIZACION DE MURO DE CERCO </label>
                                            <div class="col-md-3 offset-md-1">
                                                <input type="text" class="form-control monto" id="autorizacion_cerco" name="autorizacion_cerco" onkeyup="sumar();">
                                            </div>
                                        </div>

                                        <h3 class="box-title" style="font-size: 15px;"><b>RUBRO 6</b></h3>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-6">APROBACION DE PLANO DE DIVISION Y PARTICION </label>
                                            <div class="col-md-3 offset-md-1">
                                                <input type="text" class="form-control monto" id="aprobacion_plano" name="aprobacion_plano" onkeyup="sumar();">
                                            </div>
                                        </div>

                                        <h3 class="box-title" style="font-size: 15px;"><b>RUBRO 7</b></h3>
                                       <div class="form-group row">
                                            <label class="control-label text-right col-md-6">VISADO Y APROBACION DE PLANO DE LOTE </label>
                                            <div class="col-md-3 offset-md-1">
                                                <input type="text" class="form-control monto" id="visado_plano" name="visado_plano" onkeyup="sumar();">
                                            </div>
                                        </div>

                                        <h3 class="box-title" style="font-size: 15px;"><b>RUBRO 8</b></h3>
                                       <div class="form-group row">
                                            <label class="control-label text-right col-md-6">FOTOCOPIA LEGALIZADA DE PLANO </label>
                                            <div class="col-md-3 offset-md-1">
                                                <input type="text" class="form-control monto" id="fotocopia_plano" name="fotocopia_plano" onkeyup="sumar();">
                                            </div>
                                        </div>

                                        <h3 class="box-title" style="font-size: 15px;"><b>RUBRO 9</b></h3>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-6">RESOLUCION </label>
                                            <div class="col-md-3 offset-md-1">
                                                <input type="text" class="form-control monto" id="resolucion" name="resolucion" onkeyup="sumar();">
                                            </div>
                                        </div>

                                        <h3 class="box-title" style="font-size: 15px;"><b>RUBRO 10</b></h3>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-6">CERTIFICACION </label>
                                            <div class="col-md-3 offset-md-1">
                                                <input type="text" class="form-control monto" id="certificacion" name="certificacion" onkeyup="sumar();">
                                            </div>
                                        </div>

                                        <h3 class="box-title" style="font-size: 15px;"><b>RUBRO 11</b></h3>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-6">APROBACIÓN DE PLANOS DE CONSTRUCCIÓN </label>
                                            <div class="col-md-3 offset-md-1">
                                                <input type="text" id="aprobacion_contruccion" class="form-control monto" name="aprobacion_contruccion" onkeyup="sumar();" />
                                                <!-- <input type="text" id="aprobacion_contruccion" name="aprobacion_contruccion" onkeyup="sumar();"> -->
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-6"><b>TOTAL A PAGAR POR SERVICIOS TECNICOS PRESTADOS BS.</b></label>
                                            <div class="col-md-3 offset-md-1">
                                                <textarea type="text" id="spTotal" class="form-control" readonly name="total" style="width:170px;height:40px;"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                    
                                    <!-- <span>Valor #1</span>
                                    <input type="text" id="txt_campo_1" class="monto" onkeyup="sumar();" />
                                    <br/>

                                    <span>Valor #2</span>
                                    <input type="text" id="txt_campo_2" class="monto" onkeyup="sumar();" />
                                    <br/>

                                    <span>Valor #3</span>
                                    <input type="text" id="txt_campo_3" class="monto" onkeyup="sumar();" />
                                    <br/> -->

                                    <!-- <span>El resultado es: </span> <span id="spTotal"></span> -->


                                </form>
                        </div>
                       
                </div>
              </div>
            </div>
                    
        </div>
    </div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap&libraries=drawing" async defer></script>
<script type="text/javascript">
    
   function sumar() {
      var total = 0;
      $(".monto").each(function() {
        if (isNaN(parseFloat($(this).val()))) {
          total += 0;
        } else {
          total += parseFloat($(this).val());
        }
      });
      //alert(total);
  document.getElementById('spTotal').innerHTML = total;
}
</script>
<script type="text/javascript">
       
       $('#citebutton').click(function(){


            var cite = $('#cite').val();
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
            var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

            $.ajax({
                url: '<?php echo base_url(); ?>tipo_tramite/ajx/',
                type:"GET",
                dataType: 'json',
                data: {csrfName: csrfHash, param1: cite},

                success:function(data, textStatus, jqXHR){
                    // alert(data);
                    

                    $("#cite1").val(data.cite);
                    $("#fecha_proforma").val(data.fecha_proforma);
                    $("#propietario1").val(data.propietario1);
                    $("#propietario2").val(data.propietario2);
                    $("#ubicacion").val(data.ubicacion);
                    $("#lote").val(data.lote);
                    $("#superficie_total").val(data.superficie_total);
                    $("#manzano").val(data.manzano);
                    $("#urbanizacion").val(data.urbanizacion);
                    $("#jurisdicion").val(data.jurisdicion);
                    $("#seccion_municipal").val(data.seccion_municipal);
                    $("#provincia").val(data.provincia);
                    $("#departamento").val(data.departamento);
                    $("#codigo_catastral").val(data.codigo_catastral);
                    $("#fecha").val(data.fecha);
                    $("#matricula_folio_real").val(data.matricula_folio_real);
                    $("#valido_por").val(data.valido_por);
                    $("#uso_predio").val(data.uso_predio);
                    $("#tipo_tramite").val(data.tipo_tramite);
                    $("#a").val(data.a);
                    $("#ci").val(data.ci);
                    $("#metros_construidos").val(data.metros_construidos);
                    // $("#txt_campo_1").val(data.linea_nivel);
                    // $("#autorizacion_cerco").val(data.autorizacion_cerco);
                    // $("#aprobacion_plano").val(data.aprobacion_plano);
                    // $("#visado_plano").val(data.visado_plano);
                    // $("#fotocopia_plano").val(data.fotocopia_plano);
                    // $("#resolucion").val(data.resolucion);
                    // $("#certificacion").val(data.certificacion);
                    // $("#aprobacion_contruccion").val(data.aprobacion_contruccion);
                    // $("#spTotal").val(data.total);

                }
            });
       });
</script>
