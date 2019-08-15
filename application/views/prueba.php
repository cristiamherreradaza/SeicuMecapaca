<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head runat="server">
    <title>FirstAjax</title>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript">
        $("#ci1").focusout(function(){
        var ci = $("#ci1").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            url: '<?php echo base_url(); ?>prueba/ajax_verifica/',
            type: 'GET',
            dataType: 'json',
            data: {csrfName: csrfHash, param1: ci},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {
                alert("Se envio bien");
                // csrfName = data.csrfName;
                // csrfHash = data.csrfHash;
                // alert(data);
               
            },
            error:function(jqXHR, textStatus, errorThrown) {
                // alert("error");
            }
        });
    });
    </script>
</head>
 <!-- url: '<?php echo base_url(); ?>tipo_tramite/ajax_verifica/', -->
                
    <!-- <body onLoad="document.forma1.cantidad.focus();">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

            <span>Valor #1</span>
            <input type="text" id="txt_campo_1" class="monto" onkeyup="sumar();" />
            <br/>

            <span>Valor #2</span>
            <input type="text" id="txt_campo_2" class="monto" onkeyup="sumar();" />
            <br/>

            <span>Valor #3</span>
            <input type="text" id="txt_campo_3" class="monto" onkeyup="sumar();" />
            <br/>

            <span>El resultado es: </span> <span id="spTotal"></span>
    </body>
<script type="text/javascript">
    function sumar() {

  var total = 0;

  $(".monto").each(function() {

    if (isNaN(parseFloat($(this).val()))) {

      total += 0;

    } else {

      total += parseFloat($(this).val());

    }

  });

  //alert(total);
  document.getElementById('spTotal').innerHTML = total;

}
</script> -->
</html>

