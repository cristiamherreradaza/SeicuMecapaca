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
                        <h4 class="card-title">ASIGNADOS</h4></h4>
                        <?php vdebug($flujo, false, false, true); ?>
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>FECHA</th>
                                    <th>ORIGEN</th>
                                    <th>DESTINO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>FECHA</th>
                                    <th>ORIGEN</th>
                                    <th>DESTINO</th>
                                    <th>ACCIONES</th>
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
                                        <td>
                                            <?php 
                                                // echo $f->fuente; 
                                                $organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$f->organigrama_persona_id))->result_array();
                                                $persona = $this->db->get_where('persona', array('persona_id'=>$f['persona_id']))->result_array();
                                                // vdebug($persona, false, false, true);
                                                echo $persona[0]['nombres'].'&nbsp;';
                                                echo $persona[0]['paterno'].'&nbsp;';
                                                echo $persona[0]['materno'].'&nbsp;';
                                            ?>
                                        </td>
                                        <!-- <td><?php //echo $f->codcatas_anterior; ?></td> -->
                                        <td><?php echo $f->descripcion; ?></td>
                                        <td>
                                            <div class="btn-group btn-group-xs" role="group">
                                                <a href="<?php echo base_url(); ?>derivaciones/nuevo/<?php echo $f->tramite_id; ?>" class="btn btn-success footable-edit">
                                                    <span class="fas fa-paper-plane" aria-hidden="true"></span>
                                                </a>

                                                <a href="<?php echo base_url(); ?>derivaciones/ver/<?php echo $f->tramite_id; ?>" class="btn btn-primary footable-edit">
                                                    <span class="fas fa-bars" aria-hidden="true"></span>
                                                </a>

                                                <a href="#" type="button" class="btn btn-danger footable-delete">
                                                    <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                                </a>
                                            </div>
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