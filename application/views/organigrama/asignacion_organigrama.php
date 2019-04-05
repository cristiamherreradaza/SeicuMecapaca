
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
                        <h4 class="card-title">ASIGNACI&Oacute;N DE OFICINAS</h4>
                        <div class="col-lg-2 col-md-4">
                            <button type="button" class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#Modal_insert">Nueva asignaci&oacute;n</button>
                        </div>
                        <?php $i=1; //echo $data['title']; ?>
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
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
                                        <option value="<?php echo $plista->persona_id; ?>"><?php echo $plista->nombres.' '.$plista->paterno.' '.$plista->materno; ?></option>
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
                                        <option value="<?php echo $plista->persona_id; ?>"><?php echo $plista->nombres.' '.$plista->paterno.' '.$plista->materno; ?></option>
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
    <script src="<?php echo base_url(); ?>public/assets/plugins/datatables/datatables.min.js"></script>
    <!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script>
    $(function() {
        $('#myTable').DataTable({
            "oLanguage": {
                "sUrl": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
        });
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [0, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

    $('#tabla_din').DataTable( {
        "order": [[ 0, "desc" ]],
        "oLanguage": {
            "sUrl": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
    });
    </script>