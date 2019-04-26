

<!DOCTYPE html>
<html>
<head>
    <title>Reporte</title>
</head>
<body>
    <div>
        <div>
          <p>
          	<img src="<?php echo base_url().'public/assets/images/logo.png' ;?>" style=" float: left; height: 80px; width: 130px;">
            
          </p>
        </div>
        <div>
          <!-- <h3 style="text-align: center;">CITE : <?php echo $tramite->cite; ?></h3>
          <br>
          <div style="text-align: left; padding-left: 70px;">A &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp;  <?php echo $tramite->remitente; ?> </div>
          <br>
          <div style="text-align: left; padding-left: 70px;">DE &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; <?php echo $de->nombres; ?> <?php echo $de->paterno; ?> <?php echo $de->materno; ?> </div>
          <br>
          <div style="text-align: left; padding-left: 70px;">REF. &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; <?php echo $tramite->referencia; ?></div>
          <br>
          <div style="text-align: left; padding-left: 70px;">FECHA : &nbsp; &nbsp; &nbsp; <?php echo $tramite->fecha; ?></div>
          <br> -->
          <hr style="clear: both;">
          <table style="border-collapse: collapse; border: 1px solid black; width: 100%">
            <tr>
               <td style="border-collapse: collapse; border: 1px solid black;" colspan="3">PROCEDENCIA:</td>
               <td style="border-collapse: collapse; border: 1px solid black;" colspan="2">CITE ORIGINAL:</td>
           </tr>

            <tr style="border-collapse: collapse; border: 1px solid black;" >
               <td style="border-collapse: collapse; border: 1px solid black; " colspan="4">REMITENTE:</td>
               <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">FECHA: <br> HORA:</td>
           </tr>
           <tr style="border-collapse: collapse; border: 1px solid black;">
               <td style="border-collapse: collapse; border: 1px solid black;" colspan="5">DESTINATARIO:</td>
           </tr>
           <tr style="border-collapse: collapse; border: 1px solid black;">
             <td style="border-collapse: collapse; border: 1px solid black;" colspan="5">REFERENCIA: </td>
           </tr>
           <tr style="border-collapse: collapse; border: 1px solid black;">
             <td style="border-collapse: collapse; border: 1px solid black;" colspan="2">PROCESO: </td>
             <td style="border-collapse: collapse; border: 1px solid black;" colspan="2">ADJUNTO: </td>
             <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">HOJAS: </td>
           </tr>
        </table>
        
        
        <br>
        <table style="border-collapse: collapse; border: 1px solid black; width: 100%" cellspacing="0" cellpadding="0">
          <tr style="border-collapse: collapse; border: 1px solid black;">
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">Proveido N°: 1</td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">A:</td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="3"></td>
          </tr>
          
          <tr style="border-collapse: collapse; border: 1px solid black;">
            <td colspan="2" style="border-collapse: collapse; border: 1px solid black;"></td>
            <td colspan="3" style="border-collapse: collapse; border: 1px solid black;"></td>
          </tr>

          <tr style="border-collapse: collapse; border: 1px solid black;">
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">Adjunto: </td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="2"></td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">Hora: </td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1"></td>
          </tr>
        </table>

       <!--  <br>
        <table style="border-collapse: collapse; border: 1px solid black; width: 100%">
          <tr style="border-collapse: collapse; border: 1px solid black;">
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">Proveido N°: 2</td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">A:</td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="3"></td>
          </tr>
          
          <tr style="border-collapse: collapse; border: 1px solid black;">
            <td colspan="2"  style="border-collapse: collapse; border: 1px solid black;"></td>
            <td colspan="3"  style="border-collapse: collapse; border: 1px solid black;">a</td>
          </tr>

          <tr style="border-collapse: collapse; border: 1px solid black;">
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">Adjunto: </td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="2"></td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">Hora: </td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1"></td>
          </tr>
        </table>

        <br>
        <table style="border-collapse: collapse; border: 1px solid black; width: 100%">
          <tr style="border-collapse: collapse; border: 1px solid black;">
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">Proveido N°: 3</td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">A:</td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="3"></td>
          </tr>
          
          <tr style="border-collapse: collapse; border: 1px solid black;">
            <td colspan="2" rowspan="1"  style="border-collapse: collapse; border: 1px solid black;" ></td>
            <td colspan="3"  style="border-collapse: collapse; border: 1px solid black;"></td>
          </tr>

          <tr style="border-collapse: collapse; border: 1px solid black;">
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">Adjunto: </td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="2"></td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">Hora: </td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1"></td>
          </tr>
        </table>

        <br>
        <table style="border-collapse: collapse; border: 1px solid black; width: 100%">
          <tr style="border-collapse: collapse; border: 1px solid black;">
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">Proveido N°: 4</td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">A:</td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="3"></td>
          </tr>
          
          <tr style="border-collapse: collapse; border: 1px solid black;">
            <td colspan="2"  style="border-collapse: collapse; border: 1px solid black;"></td>
            <td colspan="3"  style="border-collapse: collapse; border: 1px solid black;">a</td>
          </tr>

          <tr style="border-collapse: collapse; border: 1px solid black;">
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">Adjunto: </td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="2"></td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1">Hora: </td>
            <td style="border-collapse: collapse; border: 1px solid black;" colspan="1"></td>
          </tr>
        </table>
        </div>
        -->
         
          
                    
       
       

    </div>
</body>
</html>
        </div>