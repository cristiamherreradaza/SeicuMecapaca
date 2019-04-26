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
                        <!-- <h4 class="card-title">ASIGNADOS</h4></h4> -->
                        <div class="row">
                            <div class="col-6">
                            <?php //vdebug($tramite, false, false, true); ?>
                                <h2 class="mb-0">CITE: <?php echo $tramite->cite; ?></h2>
                                <h4 class="font-light mt-0">Referencia <?php echo $tramite->referencia; ?></h4>
                            </div>
                            <div class="col-6 align-self-center display-8 text-info text-right">Fecha: <?php echo date("Y-m-d",strtotime($tramite->fecha)); ?></div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                REMITENTE: <?php echo $tramite->remitente; ?><br />
                                ARCHIVO: <a href="<?php echo base_url(); ?>public/assets/images/tramites/<?php echo $tramite->adjunto; ?>.pdf" target='_blank'><?php echo $tramite->adjunto; ?></a>
                            </div>
                            <div class="col-6">
                                PROCEDENCIA: <?php echo $tramite->procedencia; ?>
                            </div>
                        </div>
                        <?php //vdebug($flujo, false, false, true); ?>
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>FECHA</th>
                                    <th>CITE</th>
                                    <th>ORIGEN</th>
                                    <th>DESTINO</th>
                                    <th>DESCRIPCION</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>FECHA</th>
                                    <th>CITE</th>
                                    <th>ORIGEN</th>
                                    <th>DESTINO</th>
                                    <th>DESCRIPCION</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($flujo as $f): ?>
                                    <tr>
                                        <td>
                                            <?php 
                                                $fecha_mod = explode(".", $f['fecha']); 
                                                echo $fecha_mod[0]; 
                                            ?>
                                        </td>
                                        <td><?php echo $f['cite']; ?></td>
                                        <td>
                                            <?php 
                                                // echo $f->fuente; 
                                                $organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$f['fuente']))->result_array();
                                                $persona = $this->db->get_where('persona', array('persona_id'=>$organigrama_persona[0]['persona_id']))->result_array();
                                                // vdebug($organigrama_persona, false, false, true);
                                                // vdebug($organigrama_persona[0]['persona_id'], false, false, true);
                                                // vdebug($persona, false, false, true);
                                                echo $persona[0]['nombres'].'&nbsp;';
                                                echo $persona[0]['paterno'].'&nbsp;';
                                                echo $persona[0]['materno'].'&nbsp;';
                                            ?>
                                        </td>
                                        <!-- <td><?php //echo $f->codcatas_anterior; ?></td> -->
                                        <td>
                                            <?php 
                                                // echo $f->fuente; 
                                                $organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$f['destino']))->result_array();
                                                $persona = $this->db->get_where('persona', array('persona_id'=>$organigrama_persona[0]['persona_id']))->result_array();
                                                // vdebug($organigrama_persona, false, false, true);
                                                // vdebug($organigrama_persona[0]['persona_id'], false, false, true);
                                                // vdebug($persona, false, false, true);
                                                echo $persona[0]['nombres'].'&nbsp;';
                                                echo $persona[0]['paterno'].'&nbsp;';
                                                echo $persona[0]['materno'].'&nbsp;';
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $f['descripcion']; ?>
                                        </td>
                                    </tr>    
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ==============================================================