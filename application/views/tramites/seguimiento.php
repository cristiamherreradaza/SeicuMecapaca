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
                            <div class="col-6 align-self-center display-8 text-info text-right">Fecha: <?php echo date("d-m-Y",strtotime($tramite->fecha)); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                REFERENCIA : &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $tramite->referencia; ?><br/>
                                REMITENTE : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $tramite->remitente; ?><br />
                                PROCEDENCIA : &nbsp; &nbsp; <?php echo $tramite->procedencia; ?>
                            </div>
                            <div class="col-6">
                                FOJAS : &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $tramite->fojas; ?><br>
                                ANEXOS : &nbsp; &nbsp; &nbsp; <?php echo $tramite->anexos; ?><br>
                                ARCHIVO : &nbsp; &nbsp; <a href="<?php echo base_url(); ?>public/assets/images/tramites/<?php echo $tramite->adjunto.'.pdf';?>" target='_blank'><?php echo $tramite->adjunto.'.pdf'; ?></a>
                                 
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
	                                        <?php } 
	                                        if ($f['estado'] == 1) {?>
	                                         	<a href=""  class="btn btn-primary footable-edit">Recibido/Pendiente</a>
	                                        <?php } 
	                                         if ($f['estado'] == 2) {?>
	                                         	<a href=""  class="btn btn-primary footable-edit">Recibido/Archivado</a>
	                                        <?php } ?>
		                            </div>
	                            </div>
	                        </blockquote>   
                        <?php endforeach; ?>
                         

                        <center><a href="<?php echo base_url();?>tipo_tramite/busqueda" class="btn btn-info footable-edit" style="width: 50%;">Atras</a></center>  
                       
                    </div>
                </div>

            </div>
            
            	
            
        </div>
    </div>
</div>