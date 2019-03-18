<link href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css" rel="stylesheet">
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
                <div class="card wizard-content">

                    <div class="card-body">
                        <h4 class="card-title">Datos Edificaciones</h4>
                        <h6 class="card-subtitle">Material de Construccion</h6>
                     

                         
                         <!-- Step 1 -->
                         <h2></h2>
                         <a class="btn btn-success" href="<?php echo site_url('edificacion/adicionar');?>/"  align="right"><i class="mdi mdi-plus"></i> Nuevo Bloque</a>




        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Bloques Registrados</h4>
                <h6 class="card-subtitle">...</h6>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nro de bloque</th>
                                <th>Nombre</th>
                                <th>Estado fisico</th>
                                <th>Año construccion</th>
                                <th>Destino</th>
                                <th>Uso</th>
                            </tr>
                        </thead>
                        <tbody>


                         <?php foreach($bloques as $row) {?>
                            <tr>
                              <th scope="row"><?php echo $row->nro_bloque; ?></th>
                              <td><?php echo $row->nom_bloque; ?></td>
                              <td><?php echo $row->estado_fisico; ?></td>
                              <td><?php echo $row->anio_cons; ?></td>
                              <td><?php echo $row->destino_bloque_id; ?></td>
                              <td><?php echo $row->uso_bloque_id; ?> </td>
                              <td>
                               
                               

                           </td>


                       </tr>
                   <?php } ?> 

               </tbody>
           </table>
           
			</div>
		   <div align="right">
		   <a class="btn btn-success" href="<?php echo site_url('edificacion/propietario');?>/" align="right">Siguiente</a>
		   </div>
   
			</div>
		</div>






</div>
</div>
</div>
</div>
</div>

</div>
                                <!-- ============================================================== -->