            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © Ministerio de Obras publicas - Programa de Mejora de la Gestion Municipal
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>public/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>public/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>public/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>public/js/custom.js"></script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/js/custom.min.js"></script>


    <script src="<?php echo base_url(); ?>public/assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    
    <script>
    jQuery(document).ready(function() {
        
        $(".select2").select2();
        
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                dropdownParent: $('#Modal_insert'),
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
    
    
     
    <script src="<?php echo base_url(); ?>public/assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/mask.init.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

   
    
</body>

</html>