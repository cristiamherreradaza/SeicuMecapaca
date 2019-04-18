  <!--nestable CSS -->
    <link href="<?php echo base_url(); ?>public/assets/plugins/nestable/nestable.css" rel="stylesheet" type="text/css"/>  

  <style type="text/css">
 body {
          color: #555;
          font-size: 1.25em;
          font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        hr {
          margin: 50px 0;
        }

        ul {
          list-style: none;
        }

        .container {
          margin: 40px auto;
          max-width: 700px;
        }

        li {
          margin-top: 1em;
        }

        label {
          font-weight: bold;
        }
    </style>
    


<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
<!-- vertical wizard -->
                <div class="row">
                                       
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                                <?php echo form_open('usuario/update', array('method'=>'POST')); ?>
                                    <h4 class="card-title">Men&uacute; Administrador</h4>
                                        <div class="form-group">
                                            <!--<input type="text" hidden="" value="<?php echo $credencial_id; ?>" name="credencial">-->
                                        </div>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                          <div class="container">
                                            <ul>
                                              <li>
                                                <div><a onclick="nivel1()" class="ti-plus"></a> Electronics
                                                    <input type="checkbox" id="option"><label for="option"></label>
                                                </div>
                                                      <ul id="nivel1">

                                                          <li><label>Laptops <input type="checkbox" class="subOption"></label></li>

                                                          <li><label>TVs <input type="checkbox" class="subOption"></label></li>

                                                          <li><label>Microphones <input type="checkbox" class="subOption"></label></li>
                                                      </ul>
                                              </li>
                                            </ul>
                                           


                                          </div>
                                </form>
                        </div>
                    </div>
                </div>
                </div>
        </div>
</div>
 <!--Nestable js -->
<script src="<?php echo base_url(); ?>public/assets/plugins/nestable/jquery.nestable.js"></script>

<script type="text/javascript">
 

        function nivel2(){
        $('#nivel2').toggle('slow');
        }

        function nivel3(){
        $('#nivel3').toggle('slow');
        }
</script>

 <script type="text/javascript">
        var checkboxes = document.querySelectorAll('input.subOption'),
              checkall = document.getElementById('option');

        for(var i=0; i<checkboxes.length; i++) {
                checkboxes[i].onclick = function() {
                var checkedCount = document.querySelectorAll('input.subOption:checked').length;

                checkall.checked = checkedCount > 0;
                checkall.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
              }
            }

        checkall.onclick = function() {
          for(var i=0; i<checkboxes.length; i++) {
            checkboxes[i].checked = this.checked;
          }
        }


         function nivel1(){
        $('#nivel1').toggle('slow');
        }

</script>


