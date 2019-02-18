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
                        <h4 class="card-title">Formulario de registro de predio</h4>
                        <h6 class="card-subtitle">ingrese los datos llenados correctamente</h6>
                        <form action="#" class="validation-wizard wizard-circle">
                            <!-- Step 1 -->
                            <h6>Datos del terreno</h6>
                            <section>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wfirstName2"> Tpo Predio: <span class="danger">*</span> </label>
                                            <select class="custom-select form-control required" id="tipo_predio" name="data[tipo_predio]">
                                                <option value="">Selccione tipo predio</option>
                                                <option value="India">Tipo 1</option>
                                                <option value="USA">Tipo 2</option>
                                                <option value="Dubai">Tipo 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wlastName2"> Numero inmueble : <span class="danger">*</span> </label>
                                            <input type="text" class="form-control required" id="wlastName2" name="data[n_inmueble]"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wemailAddress2"> Numero puerta : <span class="danger">*</span> </label>
                                            <input type="email" class="form-control required" id="data[n_puerta]" name="emailAddress"> 
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="wemailAddress2"> Latitud : <span class="danger">*</span> </label>
                                            <input type="email" class="form-control required" id="data[latitud]" name="emailAddress"> 
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="wemailAddress2"> Longitud : <span class="danger">*</span> </label>
                                            <input type="email" class="form-control required" id="data[longitud]" name="emailAddress"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Calle Principal :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2"> 
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Zona :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2"> 
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Superficie CAD:</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2"> 
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Superficie Levantada :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2"> 
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Superficie Legal :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2"> 
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Frente :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Fondo :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Ubicacion :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Pendiente :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Nivel :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Forma :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2"> 
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Servicios Basicos:</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2"> 
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Observaciones :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2"> 
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Superficie Legal :</label>
                                            <input type="tel" class="form-control" id="wphoneNumber2"> 
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Fotografia Frete :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Foto</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Seleccionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="wphoneNumber2">Fotografia Plano :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Foto</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Seleccionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                
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
