<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="<?php echo base_url(); ?>public/assets/images/users/perfil1.jpg" alt="user" /> </div>
            <!-- User profile text-->

             <?php
                    $id = $this->session->userdata("persona_perfil_id");
                    $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
                    $dato = $resi->persona_id;
                    $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
             ?>
            
            <div class="profile-text"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?php echo strtoupper($res->nombres);?> <span class="caret"></span></a>
                <div class="dropdown-menu animated flipInY">
                   
                    <div class="dropdown-divider"></div> <a href="<?php echo base_url(); ?>login/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Cerrar Sesi&oacute;n</a>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-home fa-lg"></i><span class="hide-menu"> Inicio </span></a>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-folder-open"></i><span class="hide-menu"> Gesti&oacute;n de Catastro </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>predios/registra_predio"><i class=" fas fa-book"></i> Registro</a></li>
                        <li><a href="<?php echo base_url(); ?>predios/index"><i class="fas fa-clipboard-list"></i>  Listado</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-folder-open"></i><span class="hide-menu"> Gesti&oacute;n de Tramites</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-calendar.html"><i class=" fas fa-book"></i> Registro</a></li>
                        <li><a href="app-chat.html"><i class="fas fa-clipboard-list"></i> Listado</a></li>
                    </ul>
                </li>
                
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->