<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">ASIGNADOS</h4></h4> -->
                        <div class="row">
                            <div class="col-6">
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
                        
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    	<h4 class="card-title"><div class="col-sm-6 col-md-4 col-lg-3 f-icon"><i class="fas fa-angle-double-down"></i> SEGUIMIENTO</h4></h4>
                    	<?php foreach ($flujo as $f): ?>
	                        <blockquote style="background-color: #F2F2F2;">
	                            <div class="row">
	                                <div class="col-lg-6">
		                              
		                                <h6><?php 
                                                // echo $f->fuente; 
                                                $organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$f['fuente']))->result_array();
                                                $persona = $this->db->get_where('persona', array('persona_id'=>$organigrama_persona[0]['persona_id']))->result_array();
                                                
                                                // vdebug($organigrama_persona, false, false, true);
                                                // vdebug($organigrama_persona[0]['persona_id'], false, false, true);
                                                // vdebug($persona, false, false, true);
                                                echo $persona[0]['nombres'].'&nbsp;';
                                                echo $persona[0]['paterno'].'&nbsp;';
                                                echo $persona[0]['materno'].'&nbsp;';
                                         ?></h6>
                                         <h6><?php 
                                                $organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$f['fuente']))->result_array();
                                                $cargo = $this->db->get_where('tramite.cargo', array('cargo_id'=>$organigrama_persona[0]['cargo_id']))->result_array();
                                                echo $cargo[0]['descripcion'].'&nbsp;';
                                                
                                         ?></h6>
                                         <?php if ($f['cite'] != null) {?>
                                         	<h6><?php echo $f['cite']; ?></h6>
                                         <?php } ?>
                                         <h6><?php echo $f['descripcion']; ?></h6>
                                         <h6><?php echo $f['fecha']; ?></h6>
		                            </div>
	                            <div class="col-lg-6">
	                                
	                                <h6><?php 
                                        $organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$f['destino']))->result_array();
                                        $persona = $this->db->get_where('persona', array('persona_id'=>$organigrama_persona[0]['persona_id']))->result_array();
                                        // vdebug($organigrama_persona, false, false, true);
                                        // vdebug($organigrama_persona[0]['persona_id'], false, false, true);
                                        // vdebug($persona, false, false, true);
                                        echo $persona[0]['nombres'].'&nbsp;';
                                        echo $persona[0]['paterno'].'&nbsp;';
                                        echo $persona[0]['materno'].'&nbsp;';
                                    ?></h6>
                                    <h6><?php 
                                                $organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$f['destino']))->result_array();
                                                $cargo = $this->db->get_where('tramite.cargo', array('cargo_id'=>$organigrama_persona[0]['cargo_id']))->result_array();
                                                echo $cargo[0]['descripcion'].'&nbsp;';
                                                
                                         ?></h6>
                                         <?php if ($f['estado'] == 0) {?>
                                         	<a href=""  class="btn btn-primary footable-edit">Recibido/Derivado</a>
                                         <?php }else{ ?>
                                    		<a href=""  class="btn btn-primary footable-edit">Recibido/Pendiente</a>
                                        <?php } ?>

	                            </div>
	                            </div>
	                        </blockquote>   
                        <?php endforeach; ?>
                           
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
                                        <td>
                                            <?php 
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