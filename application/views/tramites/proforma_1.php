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
                                <button type="submit" class="btn btn-info">Buscar</button>
                                <button class="btn btn-success" type="button" data-toggle="modal" data-target=".bd-example-modal-lg" id="citebutton" type="submit">Adicionar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <?php if ($proforma == NULL) {?>
                                <table id="bandeja_entrada" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>FECHA REGISTRO</th>
                                            <th>CITE</th>
                                            <th>REMITENTE</th>
                                            <th>REFERENCIA</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       <tr>
                                           <td colspan="6"><center>No existen datos</center></td>
                                       </tr>
                                       
                                    </tbody>
                                </table>
                            <?php }else{?>
                                <table id="bandeja_entrada" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>NRO</th>
                                            <th>CITE</th>
                                            <th>FECHA</th>
                                            <th>PROPIETARIO</th>
                                            <th>UBICACION</th>
                                            <th>SECCION MUNICIPAL</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        <?php $cont =1;?>
                                        
                                            <tr>                                                <td>
                                                <?php 
                                                    echo $cont;
                                                    $cont++;
                                                ?>
                                                </td>
                                                <td><?php echo $proforma->cite; ?></td>
                                                <td><?php echo $proforma->fecha_proforma; ?></td>
                                                <!-- <td><?php //echo $mt->codcatas_anterior; ?></td> -->
                                                <td><?php echo $proforma->propietario1; ?></td>
                                                <td><?php echo $proforma->ubicacion; ?></td>
                                                <td><?php echo $proforma->seccion_municipal; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>reportes_m/proforma/<?php echo $proforma->proforma_id; ?>" class="btn btn-primary footable-edit" target="_blank">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                </tr>   

                                        
                                    </tbody>
                                </table>
                            <?php } ?> 
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

