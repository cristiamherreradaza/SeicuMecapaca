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
                <div class="card">
                    <div class="card-body">
                        Aqui el contenido <?php //echo $data['title']; ?>
                        <div class="card-body wizard-content">
                            <h4 class="card-title">Step wizard</h4>
                            <h6 class="card-subtitle">You can find the <a href="http://www.jquery-steps.com" target="_blank">offical website</a></h6>
                            <form action="#" class="tab-wizard wizard-circle">
                                <!-- Step 1 -->
                                <h6>Personal Info</h6>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName1">First Name :</label>
                                                <input type="text" class="form-control" id="firstName1"> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastName1">Last Name :</label>
                                                <input type="text" class="form-control" id="lastName1"> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="emailAddress1">Email Address :</label>
                                                <input type="email" class="form-control" id="emailAddress1"> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phoneNumber1">Phone Number :</label>
                                                <input type="tel" class="form-control" id="phoneNumber1"> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="location1">Select City :</label>
                                                <select class="custom-select form-control" id="location1" name="location">
                                                    <option value="">Select City</option>
                                                    <option value="Amsterdam">India</option>
                                                    <option value="Berlin">USA</option>
                                                    <option value="Frankfurt">Dubai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date1">Date of Birth :</label>
                                                <input type="date" class="form-control" id="date1"> </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Step 2 -->
                                <h6>Job Status</h6>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jobTitle1">Job Title :</label>
                                                <input type="text" class="form-control" id="jobTitle1"> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="videoUrl1">Company Name :</label>
                                                <input type="text" class="form-control" id="videoUrl1">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="shortDescription1">Job Description :</label>
                                                <textarea name="shortDescription" id="shortDescription1" rows="6" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Step 3 -->
                                <h6>Interview</h6>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="int1">Interview For :</label>
                                                <input type="text" class="form-control" id="int1"> </div>
                                            <div class="form-group">
                                                <label for="intType1">Interview Type :</label>
                                                <select class="custom-select form-control" id="intType1" data-placeholder="Type to search cities" name="intType1">
                                                    <option value="Banquet">Normal</option>
                                                    <option value="Fund Raiser">Difficult</option>
                                                    <option value="Dinner Party">Hard</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Location1">Location :</label>
                                                <select class="custom-select form-control" id="Location1" name="location">
                                                    <option value="">Select City</option>
                                                    <option value="India">India</option>
                                                    <option value="USA">USA</option>
                                                    <option value="Dubai">Dubai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jobTitle2">Interview Date :</label>
                                                <input type="date" class="form-control" id="jobTitle2">
                                            </div>
                                            <div class="form-group">
                                                <label>Requirements :</label>
                                                <div class="mb-2">
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio1" name="radio" type="radio" class="custom-control-input">
                                                        <span class="custom-control-label">Employee</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio2" name="radio" type="radio" class="custom-control-input">
                                                        <span class="custom-control-label">Contract</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Step 4 -->
                                <h6>Remark</h6>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="behName1">Behaviour :</label>
                                                <input type="text" class="form-control" id="behName1">
                                            </div>
                                            <div class="form-group">
                                                <label for="participants1">Confidance</label>
                                                <input type="text" class="form-control" id="participants1">
                                            </div>
                                            <div class="form-group">
                                                <label for="participants1">Result</label>
                                                <select class="custom-select form-control" id="participants1" name="location">
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
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <div class="right-sidebar">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                <div class="r-panel-body">
                    <ul id="themecolors" class="mt-3">
                        <li><b>With Light sidebar</b></li>
                        <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                        <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                        <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                        <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                        <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                        <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                        <li class="d-block mt-4"><b>With Dark sidebar</b></li>
                        <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                        <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                        <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                        <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                        <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                        <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                    </ul>
                    <ul class="mt-3 chatonline">
                        <li><b>Chat option</b></li>
                        <li>
                            <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>public/assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>public/assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>public/assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>public/assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>public/assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>public/assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>public/assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>public/assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
