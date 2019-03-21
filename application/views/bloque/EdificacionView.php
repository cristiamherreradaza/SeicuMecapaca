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


                        <div class="row page-titles">
                            <div class="col-md-6 col-8 align-self-center">
                                <h4 class="card-title">Datos Edificaciones</h4>
                                <h6 class="card-subtitle">Material de Construccion</h6>
                            </div>
                            <div class="col-md-6 col-4 align-self-center">
                                <button class="btn float-right hidden-sm-down btn-success">Cod. Catastral: <?php echo $cod_catastral; ?>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-block btn-info" type="button"><span class="btn-label">1</span> REGISTRO DEL PREDIO</button>
                            </div>

                            <div class="col-md-4">
                                <button class="btn btn-block btn-info " type="button"><span class="btn-label">2</span> REGISTRO DE BLOQUES</button>
                            </div>

                            <div class="col-md-4">
                                <button class="btn btn-block btn-outline-info waves-effect waves-light" type="button"><span class="btn-label">3</span> REGISTRO DE PROPIETARIO</button>
                            </div>
                        </div>
                        <p></p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%;height:15px;" role="progressbar""> 60% 
                                </div>
                            </div>
                            <p></p>
                         <!-- Step 1 -->
                         <h2></h2>
                         <a class=" btn btn-success" href="<?php echo site_url('edificacion/adicionar'); ?>/<?php echo $cod_catastral; ?>" align="right"><i class="mdi mdi-plus"></i> Agregar Bloque</a>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Bloques Registrados</h4>
                                        <h6 class="card-subtitle">...</h6>
                                        <div class="table-responsive m-t-40">
                                            <table id="myTable" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Codcatastro</th>
                                                        <th>Nro de bloque</th>
                                                        <th>Nombre</th>
                                                        <th>Estado fisico</th>
                                                        <th>Año construccion</th>
                                                        <th>Altura</th>
                                                        <th>Superficie</th>
                                                        <th>Destino</th>
                                                        <th>Uso</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php foreach ($bloques as $row) { ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $row->codcatas; ?></th>                                                    
                                                        <td><?php echo $row->nro_bloque; ?></td>
                                                        <td><?php echo $row->nom_bloque; ?></td>
                                                        <td><?php echo $row->estado_fisico; ?></td>
                                                        <td><?php echo $row->altura; ?></td>
                                                        <td><?php echo $row->superficie; ?></td>
                                                        <td><?php echo $row->anio_cons; ?></td>
                                                        <td><?php echo $row->desc_bloque_dest; ?></td>
                                                        <td><?php echo $row->desc_bloque_uso; ?> </td>
                                                        <td>
                                                        </td>


                                                    </tr>
                                                    <?php 
                                                } ?>

                                                </tbody>
                                            </table>

                                        </div>
                                        <div align="right">
                                            <a class="btn btn-success" href="<?php echo site_url('predios/nuevo');?>/<?php echo $cod_catastral?>" align="right">Siguiente</a>
                                        </div>

                                    </div>
                                </div>






                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- ============================================================== --> 