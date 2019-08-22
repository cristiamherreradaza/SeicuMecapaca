<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ASIGNADOS</h4></h4>
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>FECHA</th>
                                    <th>CITE</th>
                                    <th>REFERENCIA</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>FECHA</th>
                                    <th>CITE</th>
                                    <th>REFERENCIA</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($mis_tramites as $mt): ?>
                                    <tr>
                                        <td>
                                            <!-- <?php 
                                                $fecha_mod //= explode(".", $mt->fec_creacion); 
                                                //echo $fecha_mod[0]; 
                                            ?> -->
                                            <?php echo $mt->fecha_informe	; ?>
                                        </td>
                                        <td><?php echo $mt->cite; ?></td>
                                        <td><?php echo $mt->referencia; ?></td>	
                                        <td>
                                            <div class="btn-group btn-group-xs" role="group">                                                
                                                <a href="<?php echo base_url();?>reportes_m/pdf_nc/<?php echo $mt->informe_tecnico_id;?>" class="btn btn-success footable-edit" title="Certificado de no catastro" target="_blank">
                                                    <span class="fas fa-print" aria-hidden="true"></span>
                                                </a>
                                                <a href="<?php echo base_url();?>reportes_m/pdf_j/<?php echo $mt->informe_tecnico_id;?>" class="btn btn-warning footable-edit" title="certificado de jurisdiccion" target="_blank">
                                                    <span class="fas fa-print" aria-hidden="true"></span>
                                                </a>
                                                <a href="<?php echo base_url();?>reportes_m/pdf_sup/<?php echo $mt->informe_tecnico_id;?>" class="btn btn-info footable-edit" title="certificado de superficie" target="_blank">
                                                    <span class="fas fa-print" aria-hidden="true"></span>
                                                </a>
                                                <a href="<?php echo base_url();?>reportes_m/pdf_urb/<?php echo $mt->informe_tecnico_id;?>" class="btn btn-primary footable-edit" title="certificado de area urbana" target="_blank">
                                                    <span class="fas fa-print" aria-hidden="true"></span>
                                                </a>
                                                <a href="#" type="button" class="btn btn-danger footable-delete" title="Eliminar" >
                                                    <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                                </a>
                                                <a href="<?php echo base_url(); ?>tipo_tramite/pdf_informe/<?php echo $mt->informe_tecnico_id; ?>" class="btn btn-success footable-edit" title="Hoja de ruta" target="_blank">
                                                    <span class="fas fa-print" aria-hidden="true"></span>
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