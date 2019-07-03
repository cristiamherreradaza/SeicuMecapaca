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
                            <?php echo form_open_multipart('tipo_tramite/encontrados', array('method'=>'POST')); ?>
                                <h4 class="card-title">Busqueda</h4>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom03">Nro de cite<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom03" name="cite" placeholder="Numero de cite" value="<?php echo $cite ?>">
                                        <div class="invalid-feedback">
                                            Por Favor Ingrese .
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom03">Fecha<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom03" name="fecha" placeholder="Fecha" value="<?php echo $fecha ?>">
                                        <div class="invalid-feedback">
                                            Por Favor Ingrese .
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom03">Remitente<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom03" name="remitente" placeholder="Remitente" value="<?php echo $remitente ?>">
                                        <div class="invalid-feedback">
                                            Por Favor Ingrese .
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </form>













                        <div class="col-md-12">
                            <ul class="timeline collapse-lg">
                                
                                <li class="timeline-inverted">
                                    <div class="timeline-badge warning"><img class="img-responsive" alt="user" src="../assets/images/users/2.jpg" alt="img"> </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Ritesh Deshmukh</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p><img class="img-responsive" alt="user" src="../assets/images/users/3.jpg" alt="img"></p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium maiores odit qui est tempora eos, nostrum provident explicabo dignissimos debitis vel! Adipisci eius voluptates, ad aut recusandae minus eaque facere.</p>
                                        </div>
                                    </div>
                                </li>
                                
                                <li class="timeline-inverted">
                                    <div class="timeline-badge success"><i class="fa fa-graduation-cap"></i> </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates est quaerat asperiores sapiente, eligendi, nihil. Itaque quos, alias sapiente rerum quas odit! Aperiam officiis quidem delectus libero, omnis ut debitis!</p>
                                        </div>
                                    </div>
                                </li>
                                
                                <li class="timeline-inverted">

                                    <div class="timeline-badge success"><i class="fa fa-graduation-cap"></i> </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt obcaecati, quaerat tempore officia voluptas debitis consectetur culpa amet, accusamus dolorum fugiat, animi dicta aperiam, enim incidunt quisquam maxime neque eaque.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                            





                            










                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <?php if ($encontrados == NULL) {?>
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
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>FECHA REGISTRO</th>
                                            <th>CITE</th>
                                            <th>REMITENTE</th>
                                            <th>REFERENCIA</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </tfoot>
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
                                            <th>REMITENTE</th>
                                            <th>PROCEDENCIA</th>
                                            <th>REFERENCIA</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NRO</th>
                                            <th>CITE</th>
                                            <th>FECHA</th>
                                            <th>REMITENTE</th>
                                            <th>PROCEDENCIA</th>
                                            <th>REFERENCIA</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $cont =1;
                                         foreach ($encontrados as $mt){ ?>
                                            <tr>                                                <td>
                                                <?php 
                                                    echo $cont;
                                                    $cont++;
                                                ?>
                                                </td>
                                                <td><?php echo $mt->cite; ?></td>
                                                <td><?php echo $mt->fecha; ?></td>
                                                <!-- <td><?php //echo $mt->codcatas_anterior; ?></td> -->
                                                <td><?php echo $mt->remitente; ?></td>
                                                <td><?php echo $mt->procedencia; ?></td>
                                                <td><?php echo $mt->referencia; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>tipo_tramite/seguimiento/<?php echo $mt->tramite_id; ?>" class="btn btn-primary footable-edit">
                                                        <span class="fas fa-bars" aria-hidden="true"></span>
                                                    </a>
                                                </tr>    
                                        <?php } ?>
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
<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap&libraries=drawing" async defer></script>


