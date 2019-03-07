<script type="text/javascript">
/*RewriteEngine on
RewriteCond $1 !^(index\.php|robots\.txt|sitemap\.xml)
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
RewriteRule ^([a-zA-Z0-9-/]+)$ detalle.php?id=$1*/

    function manda(){


        var ci = $('#ci').val();
        //var csrf_test_name = $('#csrf_test_name').val();
        /*var csrfName = '<?php //echo $this->security->get_csrf_token_name(); ?>',
            csrf_test_name = $("input[name=csrf_test_name]").val();
            alert(csrfName);
            alert(csrf_test_name);*/
        $.ajax({
            type:'POST',
            url:"<?php echo base_url();?>persona/verificar/",
            data:{ci:ci,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
            dataType:'json',
            success: function (resultado){
              if(resultado.nombre != ''){
                $('#nombres').val(resultado.nombres);
                $('#paterno').val(resultado.paterno);
                $('#materno').val(resultado.materno);
                $('#fec_nacimiento').val(resultado.fec_nacimiento);
                $('#persona_id').val(resultado.persona_id);
              } else {

              }

            }
        });
    }
    function confirma(){
        
        var ci = $('#ci').val();
        var nombres = $('#nombres').val();
        var paterno = $('#paterno').val();
        var materno = $('#materno').val();
        var fec_nacimiento = $('#fec_nacimiento').val();
        var porcen_parti = $('#porcen_parti').val();
        var csrf_test_name = $('#csrf_test_name').val();
        var lqs=document.cookie.split('=');
        var tok = lqs[1];

        $.ajax({
            type:'POST',
            url:"<?php echo base_url();?>persona/insertar/",
            data:{ci:ci,nombres:nombres,paterno:paterno,materno:materno,fec_nacimiento:fec_nacimiento,porcen_parti:porcen_parti,'<?php echo $this->security->get_csrf_token_name(); ?>' : tok},
            success: function (resultado){
                if (resultado == ''){
                  
                    //toastr.success("El ingreso se creo correctamente.");
                    window.location.href = "<?=site_url('predios/nuevo')?>";
            } else {
                //toastr.error(resultado);
                alert(resultado);
            }
        }
        });
    }
    </script>
    <script type="text/javascript">
        $('.btn-danger').on("click", function(e) {
      e.preventDefault();
      var url = $(this).attr('href');
      swal({
          title: "Está seguro?",
          text: "No podrá recuperar el cliente una vez sea eliminado!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: '#DD6B55',
          confirmButtonText: 'Si, Eliminarlo!',
          cancelButtonText: "No, Cancelar!",
          confirmButtonClass: "btn-danger",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm) {
          if (isConfirm) {
            swal("Eliminado!", "Su cliente ha sido eliminado!", "success");
            window.location.replace(url);
          } else {
            swal("Cancelado", "Su cliente está a salvo! :)", "error");
          }
        });
    });
</script>
    <link href="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>


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
                        <!-- <form action="#" class="validation-wizard wizard-circle">-->

                            <!-- Step 1
                            <h6>Datos del terreno</h6>
                            <section>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tipo_predio_id"> Tpo Predio: <span class="danger">*</span> </label>
                                            <?php // echo vdebug($dc); ?>
                                            <select class="custom-select form-control required" id="tipo_predio" name="data[tipo_predio]">
                                                <option value="">Selccione tipo</option>
                                                <?php foreach ($dc as $d): ?>
                                                    <option value="<?php echo $d->tipo_predio_id; ?>"><?php echo $d->descripcion; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wlastName2"> Numero inmueble : <span class="danger">*</span> </label>
                                            <input type="text" class="form-control required" id="wlastName2" name="data[n_inmueble]">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wemailAddress2"> Numero puerta : <span class="danger">*</span> </label>
                                            <input type="text" class="form-control required" id="data[n_puerta]" name="emailAddress">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="wemailAddress2"> Latitud : <span class="danger">*</span> </label>
                                            <input type="text" class="form-control required" id="data[latitud]" name="emailAddress">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="wemailAddress2"> Longitud : <span class="danger">*</span> </label>
                                            <input type="email" class="form-control required" id="data[longitud]" name="emailAddress">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Calle Principal :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Zona :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Superficie CAD:</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Superficie Levantada :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Superficie Legal :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Frente :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Fondo :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Ubicacion :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Pendiente :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Nivel :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Forma :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Servicios Basicos:</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Observaciones :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Superficie Legal :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2">
                                        </div>
                                    </div>

                                    <div class="col">
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
                                    </div>

                                    <div class="col">
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
                                    </div>

                                </div>
                            </section>
                            <input type="submit" value="Guardar">

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

                           
                           Step 4 -->
                           <!--inicio codigo jacqueline-->
                            <h6>Ingrese los datos del propietario</h6>
                            <section>
                                <!-- <form action="<?php //echo base_url();?>persona/guardar" method="POST"> -->
                                <?php echo form_open('ddrr/guardar', array('method' => 'POST')); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div  id="registro" style="padding-top: 30px;">
                                                <div class="button-box">
                                                    <button type="button"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar Propietario</button><span class="text-danger">*</span> 
                                                </div>
                                            </div>
                                            <!-- <?php //echo form_open('path/to/controller/update/method'); ?> -->
                                        <div class="portlet-body" style="padding-top: 30px;">
                                          <!-- <form action="SendMatCivController/actualizar_carrito" method="post"> -->
                                            <!-- <?php //echo form_open('persona/insertar', array('method' => 'POST')); ?> -->

                                        <table cellpadding="6" cellspacing="1" class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2" border="1">

                                            <tr>
                                                    <th style="display:none;">RowId</th>
                                                    <th>N°</th>
                                                    <th>Nombre</th>
                                                    <th >Carnet de identidad</th>
                                                    <th >Porcentaje de participacion</th>
                                                    <th>Eliminar</th>

                                            </tr>
                                            <?php
                                                $i = 1;
                                                $count = 1;
                                            ?>

                                            <?php foreach ($this->cart->contents() as $items): ?>
                                                <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                                <tr>
                                                    <td><?php echo $count;?></td>
                                                    <td style="display: none"><?php echo $items['id']; ?></td>
                                                    <td><?php echo $items['name']; ?></td>
                                                    <td><?php echo $items['price']; ?></td>
                                                    <td><?php echo $items['qty']; ?></td>
                                                    <td><a href="<?php echo site_url('persona/remove/' . $items['rowid']); ?>" class="btn btn-danger btn-xs" title="Borrar"><i class="fa fa-trash"></i></a></td>
                                                    
                                                </tr>
                                                <?php
                                                    $i++;
                                                    $count++;
                                                ?>
                                            <?php endforeach; ?>
                                            <?php if ($count == 1): ?> 
                                                <tr><td colspan="5" style="text-align: center;">No existe propietarios</td></tr>
                                            <?php endif; ?>
                                            <tr>
                                                <td colspan="2"> </td>
                                                <td class="right"><strong>Total</strong></td>
                                                <td class="right"><?php echo $this->cart->total_items(); ?> %</td>
                                                <td></td>
                                            </tr>


                                                   <!--  <?php //echo form_hidden($i.'[rowid]', $items['rowid']); ?>

                                                    <tr>
                                                            <td style="display: none"><?php //echo $items['rowid']; ?></td>
                                                            <td><?php //echo $count;?></td>
                                                            <td style="display: none"><?php //echo $items['id']; ?></td>
                                                            <td><?php //echo $items['name']; ?></td>
                                                            <td><?php //echo $items['qty']; ?></td>
                                                            <td><?php //echo /*form_input(array('name' => $i.'[price]', 'value' => */$items['price']/*, 'maxlength' => '3', 'size' => '7'))*/; ?></td>
                                                            <td>
                                                              <a href= "<?php //echo site_url('persona/eliminarC/'.$items['id']); ?>" class="btn btn-icon-only red" data-toggle="modal"><i class="icon-trash"></i></a>
                                                            </td>
                                                    </tr> -->

                                            <!-- <tr>
                                                    <td colspan="1">
                                                      <button type="button" class="btn default" onclick="location.href='<?//=site_url('SendMatCivController/vaciar_carrito')?>'">Vaciar Carrito</button>
                                                    </td>
                                                    <td class="right"><strong>Total</strong></td>
                                                    <td><?php //echo $items['subtotal']; ?></td>
                                                    <td class="right"><?php //echo $this->cart->format_number($this->cart->total()); ?></td>

                                            </tr> -->

                                        </table>
                                        

                                  
                                        </div>
                                        <!-- <p><?php //echo form_submit('', 'Listo',array('data-toggle'=>"modal",'href'=>"#long")); ?>
                                            <a class="btn btn-outline-brand m-btn m-btn--icon m-btn--pill m-btn--air" data-toggle="modal" href="#longG"> Realizar envio </a>
                                        </p>
 -->
                                        <!-- <?php //echo form_close(); ?> -->
                                        </div>
                                        <!--/span-->

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Numero de matricula folio<span class="text-danger">*</span> </label>
                                                        <input type="text" class="form-control" name="nro_matricula_folio" required />
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Numero de folio<span class="text-danger">*</span> </label>
                                                        <input type="text" class="form-control" name="nro_folio" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Fecha de folio<span class="text-danger">*</span> </label>
                                                        <input type="date" class="form-control" name="fecha_folio" required />
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="form-group">
                                                <label for="participants1">Superficie legal<span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control required" name="superficie_legal" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="participants1">Nombre del notario<span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control required" name="nom_notario" required />
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Numero de testimonio<span class="text-danger">*</span> </label>
                                                        <input type="text" class="form-control" name="nro_testimonio" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Fecha de testimonio<span class="text-danger">*</span> </label>
                                                        <input type="date" class="form-control" name="fecha_testimonio" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Partida<span class="text-danger">*</span> </label>
                                                        <input type="text" class="form-control" name="partida" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Partida computarizada<span class="text-danger">*</span> </label>
                                                        <input type="text" class="form-control" name="partida_computarizada" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="participants1">Foja<span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control required" name="foja" required />
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Libro<span class="text-danger">*</span> </label>
                                                        <input type="text" class="form-control" name="libro" required />
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Fecha de registro de libro<span class="text-danger">*</span> </label>
                                                        <input type="date" class="form-control" name="fecha_reg_libro" required />

                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                        </div>
                                        <div class="form-actions">

                                        <button type="submit" > enviar</button>
                                        <button type="button" >Cancelar</button>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>

                            </section>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Registrar datos del propietario</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>

                                            <div class="modal-body">
                                                <!--<form action="<?php //echo base_url();?>persona/insertar" method="POST">-->
                                                <?php echo form_open('persona/insertar', array('method' => 'POST')); ?>
                                                <!--<input type="hidden" id="<?php// echo $this->security->get_csrf_token_name(); ?>" name="<?php// echo $this->security->get_csrf_token_name(); ?>" value="<?php //echo $this->security->get_csrf_hash(); ?>" />-->
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-12 ">
                                                                <div class="form-group">
                                                                    <label>Carnet <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" id="ci" name="ci" onblur="manda()" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 ">
                                                                <div class="form-group">
                                                                    <label>Nombres <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" id="nombres" name="nombres" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Paterno <span class="text-danger">*</span></label>
                                                                    <input type="text" name="paterno" id="paterno" class="form-control" required />
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Materno <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" name="materno" id="materno" required />
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label>Fecha de nacimiento <span class="text-danger">*</span></label>
                                                                        <input type="date" class="form-control" name="fec_nacimiento" id="fec_nacimiento" required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control" name="persona_id" id="persona_id" required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 ">
                                                                <div class="form-group">
                                                                    <label>Porcentaje <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" id="porcen_parti" name="porcen_parti" required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-actions">
                                                        <button type="button" onclick="confirma()"> <i class="fa fa-check"></i>Guardar</button>
                                                        <button type="button"  data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                <?php echo form_close(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!--fin codigo jacqueline-->
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
