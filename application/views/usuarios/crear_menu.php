<!-- Bootstrap Core CSS -->

 
    <!--nestable CSS -->
    <link href="<?php echo base_url(); ?>public/assets/plugins/nestable/nestable.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <style type="text/css">
                label {
            display: block;
            padding-left: 15px;
            text-indent: -15px;
            float: right;
        }
         
        input {
            width: 13px;
            height: 13px;
            padding: 0;
            margin:0;
            vertical-align: bottom;
            position: relative;
            top: -1px;
            *overflow: hidden;
        }

        #izquierda {
           
            float: right;
        }
    </style>
   


<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
<!-- vertical wizard -->
                <div class="row">
                    <?php
                 
                    $nivel1 = $this->db->query("SELECT *
                                                FROM menu
                                                WHERE padre = '0'
                                                AND nivel = '1'
                                                ORDER BY orden")->result();
                    
                 ?>
                    
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                                <?php echo form_open('usuario/update', array('method'=>'POST')); ?>
                                    <h4 class="card-title">Men&uacute; Administrador</h4>
                                        <div class="form-group">
                                            <input type="text" hidden="" value="<?php echo $credencial_id; ?>" name="credencial">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                     
                                    <div class="myadmin-dd dd" id="nestable">
                                        <?php foreach ($nivel1 as $menu1) { 

                                            $compara =  $this->db->query("SELECT *
                                                                            FROM credencial_menu
                                                                            WHERE menu_id = '$menu1->menu_id'
                                                                            AND credencial_id = '18'
                                                                            ORDER BY credencial_menu_id")->row();

                                            if ($compara) {
                                                       $var = 'checked';
                                                    } 
                                                    else
                                                    {
                                                       $var = '';
                                                    }

                                            ?>
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="1">
                                                <div class="dd-handle"><i class="<?php echo $menu1->icono ?>"></i> <?php echo $menu1->descripcion; ?>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" <?php echo $var; ?> value="<?php echo $menu1->menu_id ?>" name="menus[<?php echo $menu1->menu_id; ?>]" class="custom-control-input">
                                                                <span class="custom-control-label"></span>
                                                        </label>
                                                    
                                                    
                                                </div>
                                                 <?php
                     
                                                    $nivel2 = $this->db->query("SELECT *
                                                                                FROM menu
                                                                                WHERE padre = '$menu1->menu_id'
                                                                                AND nivel = '2'
                                                                                ORDER BY orden")->result();
                                                 ?>
                                                    <?php foreach ($nivel2 as $menu2) {

                                                            $compara2 =  $this->db->query("SELECT *
                                                                            FROM credencial_menu
                                                                            WHERE menu_id = '$menu2->menu_id'
                                                                            AND credencial_id = '18'
                                                                            ORDER BY credencial_menu_id")->row();

                                                            if ($compara2) {
                                                                       $var2 = 'checked';
                                                                    } 
                                                                    else
                                                                    {
                                                                       $var2 = '';
                                                                    }


                                                     ?>
                                                        <ol class="dd-list">
                                                            <li class="dd-item" data-id="1">
                                                                <div class="dd-handle"><i class="<?php echo $menu2->icono ?>"></i> <?php echo $menu2->descripcion; ?>
                                                                        <label class="custom-control custom-checkbox">
                                                                            <input type="checkbox" <?php echo $var2; ?> value="<?php echo $menu2->menu_id; ?>" name="menus[<?php echo $menu2->menu_id; ?>]" class="custom-control-input">
                                                                                <span class="custom-control-label"></span>
                                                                         </label>
                                                                </div>
                                                                         <?php
                                                                            $nivel3 = $this->db->query("SELECT *
                                                                                                        FROM menu
                                                                                                        WHERE padre = '$menu2->menu_id'
                                                                                                        AND nivel = '3'
                                                                                                        ORDER BY orden")->result();
                                                                         ?>
                                                                            <?php foreach ($nivel3 as $menu3) { 

                                                                                $compara3 =  $this->db->query("SELECT *
                                                                                                                FROM credencial_menu
                                                                                                                WHERE menu_id = '$menu3->menu_id'
                                                                                                                AND credencial_id = '18'
                                                                                                                ORDER BY credencial_menu_id")->row();

                                                                                if ($compara3) {
                                                                                           $var3 = 'checked';
                                                                                        } 
                                                                                        else
                                                                                        {
                                                                                           $var3 = '';
                                                                                        }

                                                                                ?>
                                                                                <ol class="dd-list">
                                                                                    <li class="dd-item" data-id="1">
                                                                                        <div class="dd-handle"><i class="<?php echo $menu3->icono ?>"></i> <?php echo $menu3->descripcion; ?>
                                                                                                <label class="custom-control custom-checkbox">
                                                                                                    <input type="checkbox" <?php echo $var3; ?> value="<?php echo $menu2->menu_id; ?>" name="menus[<?php echo $menu3->menu_id; ?>]" class="custom-control-input">
                                                                                                        <span class="custom-control-label"></span>
                                                                                                </label>
                                                                                        </div>
                                                                                        
                                                                                    </li>
                                                                                </ol>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                            </li>
                                                        </ol>
                                                    <?php
                                                        }
                                                    ?>


                                            </li>
                                           
                                        </ol>
                                         <?php
                                              }
                                          ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                   
                    <!--<div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Men&uacute; Operador</h4>
                                <div class="myadmin-dd dd" id="nestable">
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle"> Item 1 </div>
                                        </li>
                                        <li class="dd-item" data-id="2">
                                            <div class="dd-handle"> Item 2 </div>
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="3">
                                                    
                                                    <div class="dd-handle"> Item 3 </div>
                                                </li>
                                                <li class="dd-item" data-id="4">
                                                    <div class="dd-handle"> Item 4 </div>
                                                </li>
                                                <li class="dd-item" data-id="5">
                                                    <div class="dd-handle"> Item 5 </div>
                                                    <ol class="dd-list">
                                                        <li class="dd-item" data-id="6">
                                                            <div class="dd-handle"> Item 6 </div>
                                                        </li>
                                                        <li class="dd-item" data-id="7">
                                                            <div class="dd-handle"> Item 7 </div>
                                                        </li>
                                                        <li class="dd-item" data-id="8">
                                                            <div class="dd-handle"> Item 8 </div>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="dd-item" data-id="9">
                                                    <div class="dd-handle"> Item 9 </div>
                                                </li>
                                                <li class="dd-item" data-id="10">
                                                    <div class="dd-handle"> Item 10 </div>
                                                </li>
                                            </ol>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Men&uacute; Usuario</h4>
                                <div class="myadmin-dd dd" id="nestable">
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle"> Item 1 </div>
                                        </li>
                                        <li class="dd-item" data-id="2">
                                            <div class="dd-handle"> Item 2 </div>
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="3">
                                                    <div class="dd-handle"> Item 3 </div>
                                                </li>
                                                <li class="dd-item" data-id="4">
                                                    <div class="dd-handle"> Item 4 </div>
                                                </li>
                                                <li class="dd-item" data-id="5">
                                                    <div class="dd-handle"> Item 5 </div>
                                                    <ol class="dd-list">
                                                        <li class="dd-item" data-id="6">
                                                            <div class="dd-handle"> Item 6 </div>
                                                        </li>
                                                        <li class="dd-item" data-id="7">
                                                            <div class="dd-handle"> Item 7 </div>
                                                        </li>
                                                        <li class="dd-item" data-id="8">
                                                            <div class="dd-handle"> Item 8 </div>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="dd-item" data-id="9">
                                                    <div class="dd-handle"> Item 9 </div>
                                                </li>
                                                <li class="dd-item" data-id="10">
                                                    <div class="dd-handle"> Item 10 </div>
                                                </li>
                                            </ol>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Men&uacute; Beneficiario</h4>
                                <div class="myadmin-dd dd" id="nestable">
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle"> Item 1 </div>
                                        </li>
                                        <li class="dd-item" data-id="2">
                                            <div class="dd-handle"> Item 2 </div>
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="3">
                                                    <div class="dd-handle"> Item 3 </div>
                                                </li>
                                                <li class="dd-item" data-id="4">
                                                    <div class="dd-handle"> Item 4 </div>
                                                </li>
                                                <li class="dd-item" data-id="5">
                                                    <div class="dd-handle"> Item 5 </div>
                                                    <ol class="dd-list">
                                                        <li class="dd-item" data-id="6">
                                                            <div class="dd-handle"> Item 6 </div>
                                                        </li>
                                                        <li class="dd-item" data-id="7">
                                                            <div class="dd-handle"> Item 7 </div>
                                                        </li>
                                                        <li class="dd-item" data-id="8">
                                                            <div class="dd-handle"> Item 8 </div>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="dd-item" data-id="9">
                                                    <div class="dd-handle"> Item 9 </div>
                                                </li>
                                                <li class="dd-item" data-id="10">
                                                    <div class="dd-handle"> Item 10 </div>
                                                </li>
                                            </ol>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>-->

            </div>
    </div>
</div>
                <!-- ============================================================== -->

<!-- ============================================================== -->
    
    <!-- Bootstrap tether Core JavaScript -->
    

    <!--Nestable js -->
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
  <!--Nestable js -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/nestable/jquery.nestable.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // Nestable
        var updateOutput = function(e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };

        $('#nestable').nestable({
            group: 1
        }).on('change', updateOutput);

        $('#nestable2').nestable({
            group: 1
        }).on('change', updateOutput);

        updateOutput($('#nestable').data('output', $('#nestable-output')));
        updateOutput($('#nestable2').data('output', $('#nestable2-output')));

        $('#nestable-menu').on('click', function(e) {
            var target = $(e.target),
                action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });

        $('#nestable-menu').nestable();
    });
    </script>




