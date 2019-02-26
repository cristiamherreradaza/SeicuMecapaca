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
                        <form action="#" class="validation-wizard wizard-circle">
                            <!-- Step 1 -->
                            <h6>Step 1</h6>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg">
                            Nuevo Bloque
                            </button>
                            <section>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            
                                            <!-- sample modal content -->
                                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel">Datos Bloque</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <!-- column -->
                                                                <div class="col-lg-6">
                                                                    <table class="table no-wrap">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Grupo</th>
                                                                                <th>Subgrupo</th>
                                                                                <th>Porcentaje</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td>Estructura</td>
                                                                                <td>Ladrillo</td>
                                                                                <td>
                                                                                    <div class="col-4">               
                                                                                        <input type="text" class="form-control sumcontrol" >
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2</td>
                                                                                <td>Estructura</td>
                                                                                <td>Ladrillo</td>
                                                                                <td><div class="col-4">  
                                                                                    <input type="text" class="form-control sumcontrol" value="" />
                                                                                </div></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3</td>
                                                                                <td>Estructura</td>
                                                                                <td>Ladrillo</td>
                                                                                <td>
                                                                                    <div class="col-4">
                                                                                    <input type="text" class="form-control sumcontrol" value="" />
                                                                                    </div> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>Total</td>
                                                                                <td>
                                                                                    <div class="col-4">
                                                                                    <input type="text" class="form-control total" value="" />
                                                                                    <div id="validsuma" Style="color:red;"></div>
                                                                                    </div> </td>                                                                             
                                                                            </tr>
                                                                            <tr>
                                                                                <td>4</td>
                                                                                <td>Muro</td>
                                                                                <td>Adobe</td>
                                                                                <td>
                                                                                    <div class="col-4">
                                                                                    <input type="text" class="form-control sumcontrol2" value="" />
                                                                                    </div> </td>
                                                                            </tr>
                                                                            
                                                                            <tr>
                                                                                <td>5</td>
                                                                                <td>Muro</td>
                                                                                <td>Adobe</td>
                                                                                <td>
                                                                                    <div class="col-4">
                                                                                    <input type="text" class="form-control sumcontrol2" value="" />
                                                                                    </div> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>Total</td>
                                                                                  <td>
                                                                                    <div class="col-4">
                                                                                    <input type="text" class="form-control total2" value="" />
                                                                                    </div> </td> 
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    
                                                                </div>
                                                                
                                                                
                                                                <div class="col-lg-6">
                                                                    <h6 class="card-subtitle">Caracteristicas de la construccion</h6>
                                                                    <div class="row">
                                                                        <!--test-->
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="location1">Año :</label>
                                                                                <select class="custom-select form-control" id="location1" name="location">
                                                                                    <option value="">Seleccionar</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="location1">Destino :</label>
                                                                                <select class="custom-select form-control" id="location1" name="location">
                                                                                    <option value="">Seleccionar</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="location1">Uso :</label>
                                                                                <select class="custom-select form-control" id="location1" name="location">
                                                                                    <option value="">Seleccionar</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="location1">Estado Fisico :</label>
                                                                                <select class="custom-select form-control" id="location1" name="location">
                                                                                    <option value="">Seleccionar</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <h6 class="card-subtitle">Superficie de la Planta</h6>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="location1">Nivel :</label>
                                                                                <select class="custom-select form-control" id="location1" name="location">
                                                                                    <option value="">Seleccionar</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="location1">Tipo de planta :</label>
                                                                                <select class="custom-select form-control" id="location1" name="location">
                                                                                    <option value="">Seleccionar</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="wfirstName2"> Superficie : <span class="danger">*</span> </label>
                                                                                <input type="text" class="form-control required" id="wfirstName2" name="firstName">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- /.modal-body -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success" value="save">Guardar</button>
                                                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- div-boton--nuevo-->
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">nro</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Estado fisico</th>
                                            <th scope="col">Año construccion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                        <tr>
                                            <th scope="row">0000001</th>
                                            <td>1</td>
                                            <td>Sotano</td>
                                            <td>Deficiente</td>
                                            <td>1980</td>
                                            <td>
                                                
                                            </td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </section>
                            <!-- Step 2 -->
                            <h6>Step 2</h6>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jobTitle2">Company Name :</label>
                                            <input type="text" class="form-control required" id="jobTitle2">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="webUrl3">Company URL :</label>
                                            <input type="url" class="form-control required" id="webUrl3" name="webUrl3"> </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="shortDescription3">Short Description :</label>
                                                <textarea name="shortDescription" id="shortDescription3" rows="6" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Step 3 -->
                                <h6>Step 3</h6>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="wint1">Interview For :</label>
                                                <input type="text" class="form-control required" id="wint1"> </div>
                                                <div class="form-group">
                                                    <label for="wintType1">Interview Type :</label>
                                                    <select class="custom-select form-control required" id="wintType1" data-placeholder="Type to search cities" name="wintType1">
                                                        <option value="Banquet">Normal</option>
                                                        <option value="Fund Raiser">Difficult</option>
                                                        <option value="Dinner Party">Hard</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="wLocation1">Location :</label>
                                                    <select class="custom-select form-control required" id="wLocation1" name="wlocation">
                                                        <option value="">Select City</option>
                                                        <option value="India">India</option>
                                                        <option value="USA">USA</option>
                                                        <option value="Dubai">Dubai</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wjobTitle2">Interview Date :</label>
                                                    <input type="date" class="form-control required" id="wjobTitle2">
                                                </div>
                                                <div class="form-group">
                                                    <label>Requirements :</label>
                                                    <div class="mb-2">
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio3" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-label">Employee</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio4" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-label">Contract</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 4 -->
                                    <h6>Step 4</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="behName1">Behaviour :</label>
                                                    <input type="text" class="form-control required" id="behName1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants1">Confidance</label>
                                                    <input type="text" class="form-control required" id="participants1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants1">Result</label>
                                                    <select class="custom-select form-control required" id="participants1" name="location">
                                                        <option value="">Select Result</option>
                                                        <option value="Selected">Selected</option>
                                                        <option value="Rejected">Rejected</option>
                                                        <option value="Call Second-time">Call Second-time</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="decisions1">Comments</label>
                                                    <textarea name="decisions" id="decisions1" rows="4" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Rate Interviwer :</label>
                                                    <div class="c-inputs-stacked">
                                                        <label class="inline custom-control custom-checkbox block">
                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">1 star</span> </label>
                                                            <label class="inline custom-control custom-checkbox block">
                                                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">2 star</span> </label>
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">3 star</span> </label>
                                                                    <label class="inline custom-control custom-checkbox block">
                                                                        <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">4 star</span> </label>
                                                                        <label class="inline custom-control custom-checkbox block">
                                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">5 star</span> </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============================================================== -->
                                    <!-- End PAge Content -->
                                    <!-- ============================================================== -->
                                    <!-- ============================================================== -->
                                    <!-- Right sidebar -->
                                    <!-- ============================================================== -->
                                    <!-- .right-sidebar -->
                                    
                                    <!-- ============================================================== -->
                                    <!-- End Right sidebar -->
                                    <!-- ============================================================== -->
                                </div>
                                <!-- ============================================================== -->
                                <!-- End Container fluid  -->
                                <!-- ============================================================== -->