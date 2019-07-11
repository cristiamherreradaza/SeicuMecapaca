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
                                <h4 class="font-light mt-0"></h4>
                            </div>
                            <div class="col-6 align-self-center display-8 text-info text-right">Fecha: <?php echo date("Y-m-d",strtotime($tramite->fecha)); ?></div>
                        </div>
                        <!-- <form class="floating-labels mt-5"> -->
                        <?php echo form_open('Derivaciones/editar', array('method'=>'POST')); ?>
                            <div class="row floating-labels mt-5">
                                <div class="col-6">
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" id="referencia" name="referencia" value="<?php echo $tramite->referencia;?>" required>
                                        <span class="bar"></span>
                                        <label > REFERENCIA</label>
                                    </div>
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="remitente" id="remitente" value="<?php echo $tramite->remitente; ?>" required>
                                        <span class="bar"></span>
                                        <label for="input1"> REMITENTE</label>
                                    </div>
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" id="precedencia" name="procedencia" value="<?php echo $tramite->procedencia; ?>" required>
                                        <span class="bar"></span>
                                        <label for="input1"> PROCEDENCIA</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" id="fojas" name="fojas" value="<?php echo $tramite->fojas; ?>" required>
                                        <span class="bar"></span>
                                        <label for="input1"> FOJAS</label>
                                    </div>
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" id="anexos" name="anexos" value="<?php echo $tramite->anexos; ?>" required>
                                        <span class="bar"></span>
                                        <label for="input1"> ANEXOS</label>
                                    </div>
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" id="input1" value="<?php echo $tramite->adjunto.'.pdf';?>
                                        " required> <!-- <a href="<?php //echo base_url(); ?>public/assets/images/tramites/<?php //echo $tramite->adjunto.'.pdf';?>" target='_blank'><?php //echo $tramite->adjunto.'.pdf'; ?></a> -->
                                        <span class="bar"></span>
                                        <label for="input1"> ARCHIVO</label>
                                    </div>
                                    <input type="hidden" name="id_tramite" value="<?php echo $tramite->tramite_id; ?>">
                                   <!--  <div class="form-group">
                                        <label>Archivo</label><?php //echo $tramite->adjunto.'.pdf'; ?>
                                        <input type="file" class="form-control" name="adjunto" value="<?php //echo $tramite->adjunto.'.pdf'; ?>">
                                    </div> -->
                                    
                                </div>
                                <div>
                                    <center><button type="submit" class="btn btn-primary">Guardar</button></center>
                                </div>
                            </div>
                        </form>
                        
                        
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
                        <center><a href="<?php echo base_url();?>tipo_tramite/listado" class="btn btn-info footable-edit" style="width: 50%;">Atras</a></center>  
                       
                    </div>
                </div>

            </div>
            
                
            
        </div>
    </div>
</div>