
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
                <div class="card">
                    <div class="card-body">
                        ASIGNACI&Oacute;N DE OFICINAS <?php $i=1; //echo $data['title']; ?>
                        <div class="card-body wizard-content">
                            <div class="col-lg-2 col-md-4">
                                <button type="button" class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#Modal_insert">Nueva asignaci&oacute;n</button>
                            </div><div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table table-bordered table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nro</th>
                                                <th>Fecha de alta</th>
                                                <th>Fecha de baja</th>
                                                <th>Persona</th>
                                                <th>Unidad</th>
                                                <th>Vigencia</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($datos as $lista){ ?>
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td><?php echo $lista->fec_alta ?></td>
                                                    <td><?php echo $lista->fec_baja ?></td>
                                                    <td><?php echo $lista->nombres; echo ' '; echo $lista->paterno; echo " "; echo $lista->materno; ?></td>
                                                    <td><?php echo $lista->unidad; ?></td>
                                                    <td><?php echo $lista->vigencia; ?> mes(es)</td>
                                                    <td>

                                                        <!-- <button type="button" class="btn btn-warning footable-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('')">
                                                                <span class="fas fa-pencil-alt" aria-hidden="true">
                                                                </span>
                                                        </button>  -->
                                                        <a href= "<?php echo site_url('organigrama_persona/eliminar/'.$lista->organigrama_persona_id); ?>" type="button" title="Eliminar" class="btn btn-danger footable-delete">
                                                            <span class="fas fa-trash-alt" aria-hidden="true">
                                                            </span>
                                                        </a>
                                                        </button> 
                                                        <a  href="<?php echo site_url('organigrama_persona/baja/'.$lista->organigrama_persona_id); ?>" type="button" title="Dar de baja" class="btn btn-success footable-action"><span class="fas fa-arrow-down" aria-hidden="true">
                                                            </span></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div>
                            
                        </div>  
                        

                    </div>
                </div>
            </div>
        </div>

              
        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Editar asignaci&oacute;n</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php //echo base_url();?>edificio/update" method="POST">-->
                        <?php echo form_open('edificio/update', array('method'=>'POST')); ?>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Personal</label>
                                <select class="select2" style="width: 100%">
                               <!--  <select class="select2" style="width: 100%" name="persona_id" id="persona_id"> -->
                                    <option>Select</option>
                                    <?php foreach($personas as $plista){ ?>
                                        <option value="<?php echo $plista->persona_id; ?>"><?php echo $plista->nombres; ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Oficina</label>
                                <select class="select2" style="width: 100%" name="organigrama_id" id="organigrama_id">
                                    <option>Select</option>
                                    <?php foreach($organigramas as $olista){ ?>
                                        <option value="<?php echo $olista->organigrama_id; ?>"><?php echo $olista->unidad; ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Fecha de alta</label>
                                <input type="date" class="form-control" id="fec_alta" name="fec_alta">
                            </div>

                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="modal fade" id="Modal_insert"  role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Insertar Nueva Asignacion de oficina</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>edificio/insertar" method="POST">-->
                        <?php echo form_open('organigrama_persona/insertar', array('method'=>'POST')); ?>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Personal</label>
                                <select class="select2 " style="width: 100%" name="persona_id" id="persona_id">
                                    <option>Select</option>
                                    <?php foreach($personas as $plista){ ?>
                                        <option value="<?php echo $plista->persona_id; ?>"><?php echo $plista->nombres; ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Oficina</label>
                                <select class="select2" style="width: 100%" name="organigrama_id" id="organigrama_id">
                                    <option>Select</option>
                                    <?php foreach($organigramas as $olista){ ?>
                                        <option value="<?php echo $olista->organigrama_id; ?>"><?php echo $olista->unidad; ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Fecha de alta</label>
                                <input type="date" class="form-control" id="fec_alta" name="fec_alta">
                            </div>

                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>



<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>

    <script>
    jQuery(document).ready(function() {
        $('.select2').select2({
            dropdownParent: $('#Modal_insert'),
        });
        
        
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            //templateResult: formatRepo, // omitted for brevity, see the source of this page
            //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
    </script>
