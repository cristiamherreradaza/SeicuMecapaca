<!DOCTYPE html>
<html>
	<head>
	    <title>Reporte</title>
	<style type="text/css">
		h4{
			padding-bottom: -20px;	
		}
		h5{
			padding-bottom: -25px;
		}
		.linea{
			padding: 3px;
		}
		.referencias1, .cuadro{
			display: inline;
		}
		.referencias{
			text-align: left;
			margin-left: 235px;
			padding-top: -13px;
			
		}
		.referencias1{
			text-align: right;
			margin-left: 16%;

		}
		.cuadro{
			box-sizing: border-box;
		 	width: 370px;
		  	border: 1px solid red;
		  	border-style: dotted;
			border-color: black;
			background-color: #e2e2e2;
		  	float: right;
		 	margin-right: 90px;
		}
		.columna1, .columna2, .columna3, .columna4, .columna5, .columna6{
			display: inline;
		}
		.columna1{
			margin-left: 20px;
		}
		.division{
			padding-bottom: 4px;
		}


		.contenido1, .contenido2{
			display: inline;
			text-align: center;
		}
		.contenido1{
			padding-left: 40px;
			width: 50%;
		}
		.contenido2{
			padding-left: 30px;
			width: 50%;
		}
		.contenido{
			padding-left: 10px;
		}
		.subcontenido, .subcontenido1{
			display: inline;
		}
		.subcontenido{
			padding-bottom: 5px;
		}
		.particion1, .particion{
			display: inline;
		}
		.particion1{

		}
		.particion2{
			
		}
		
	</style>
	</head>
	<body>
	    <div>
	        <div>
	          	<p>
	          		<img src="<?php echo base_url().'public/assets/images/logo.png' ;?>" style=" float: left; height: 80px; width: 130px;">
	            	<img src="<?php echo base_url().'public/assets/images/pmgm.jpg' ;?>"  style=" float: right; height: 80px; width: 130px;">
					<center>            
						<h5 style="padding-top: 10px;">ESTADO PLURINACIONAL DE BOLIVIA <br>MINISTERIO DE OBRAS PUBLICAS, SERVICIOS Y VIVIENDA <br>VICEMINSTERIO DE VIVIENDA Y URBANISMO </h5>
					</center>		
	          	</p>
	        </div>
	        <div>
	        	<h3 style="text-align: center; padding: -20px;">INFORME TECNICO</h3>
	          	<h4 style="text-align: center; ">CITE : GAMM-SMDT-TEC-N° <?php echo $tramite->cite; ?></h4>
	          	<div class="linea">
	          		<div class="referencias1">A  : </div> <div class="cuadro" ><?php echo $a->nombre; ?></div>
	          		<div class="referencias"> <b><?php echo $a->cargo; ?></b></div>
	          	</div>
	          	<div class="linea">
	          		<div class="referencias1">VIA : </div> <div class="cuadro" > <?php echo $via->nombre; ?> </div>
	          		<div class="referencias"><b><?php echo $via->cargo;?></b></div>
	          	</div>
	          	<div class="linea">
	          		<div class="referencias1">DE : </div> <div class="cuadro" > <?php echo $de->nombres; ?> <?php echo $de->paterno; ?> <?php echo $de->materno; ?> </div>
	          		<div class="referencias"> <b> <?php echo $cargo->descripcion;?></b></div>
	          	</div>
	          	<div class="linea">
	          		<div class="referencias1">REFERENCIA</div> : <div class="cuadro" ><?php echo $tramite->referencia; ?></div>
	          	</div>
	       		<div class="linea">
	       			<div class="referencias1">FECHA </div> : <div class="cuadro" > <?php echo $tramite->fecha_informe; ?></div>
	       		</div>
	       		<div class="linea">
	       			<div class="referencias1">PROCESADOR </div> : <div class="cuadro" > <?php echo $procesador->cargo; ?>	 <?php echo $procesador->nombre; ?></div>
	       		</div>
	          	<h4 ><b><u>ANTECEDENTES</u></b></h4>
	          	<h5>Se da curso a la siguiente solicitud</h5>
	          	<div class="division">
	          		<div class="columna1" style="margin-left: 107px:">GAMM : </div>
	          		<div class="columna2" style="box-sizing: border-box; padding: 20px; border: 1px solid black; border-style: dotted; background-color: #e2e2e2;"> <?php echo $tramite->correlativo ?></div>
	          		<div class="columna3" style="margin-left: 20px;">DE FECHA : </div>
	          		<div class="columna4" style="box-sizing: border-box;width: 250px;border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"><?php echo $tramite->fecha_solicitud ?></div>
	          	</div>
	          	
	          	<div class="division">
	          		<div class="columna1" style="margin-left: 55px:">SOLICITANTE : </div>
	          		<div class="columna2" style="box-sizing: border-box; padding: 10px; border: 1px solid black; border-style: dotted; background-color: #e2e2e2;"> <?php echo $tramite->solicitante ?></div>
	          		<div class="columna3" style="margin-right: 0px;">CI : </div>
	          		<div class="columna4" style="box-sizing: border-box;width: 150px;border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"><?php echo $tramite->ci ?></div>
	          	</div>
	          	<div class="division">
	          		<div class="columna3" style="margin-left: 0px;">OBJETO DE TRAMITE : </div>
	          		<div class="columna4" style="box-sizing: border-box;width: 494px; border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"> <?php echo $tipo_tramite->tramite ?></div>
	          	</div>
	          	<div class="division">
	          		<div class="columna3" style="margin-left: 68px;">UBICACION : </div>
	          		<div class="columna4" style="box-sizing: border-box;width: 494px; border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"> <?php echo $tramite->ubicacion ?></div>
	          	</div>
	          	<div class="division">
	          		<div class="columna1" style="margin-left: 119px:">LOTE : </div>
	          		<div class="columna2" style="box-sizing: border-box; padding: 20px; border: 1px solid black; border-style: dotted; background-color: #e2e2e2;"> <?php echo $tramite->lote ?></div>
	          		<div class="columna3" style="margin-left: 20px;">URBANIZACION : </div>
	          		<div class="columna4" style="box-sizing: border-box;width: 250px;border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"><?php echo $tramite->urbanizacion ?></div>
	          	</div>
	          	<div class="division">
	          		<div class="columna1" style="margin-left: 79px:">MANZANO : </div>
	          		<div class="columna2" style="box-sizing: border-box; padding: 20px; border: 1px solid black; border-style: dotted; background-color: #e2e2e2;"> <?php echo $tramite->manzana ?></div>
	          		<div class="columna3" style="margin-left: 20px;">COMUNIDAD : </div>
	          		<div class="columna4" style="box-sizing: border-box;width: 250px;border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"><?php echo $tramite->comunidad ?></div>
	          	</div>
	          	<div class="division">
	          		<div class="columna1" style="margin-left: -2px:">SUPERFICIE SEGUN TESTIMONIO : </div>
	          		<div class="columna2" style="box-sizing: border-box; padding: 0px; border: 1px solid black; border-style: dotted; background-color: #e2e2e2;"><?php echo $tramite->superficie_testimonio ?> m2</div>
	          		<div class="columna3" style="margin-left: -2px;">SUPERFICIE SEGUN MEDICION : </div>
	          		<div class="columna4" style="box-sizing: border-box; padding: 0px; ;border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"><?php echo $tramite->superficie_medicion ?> m2</div>
	          	</div>

	          	<h4><b><u>DOCUMENTACION PRESENTADA</u></b></h4>
	          	<h5><b>CARNET DE IDENTIDAD</b></h5>
	          	<div class="division">
	          		<div class="columna1" style="margin-left: 55px:">A FAVOR DE : </div>
	          		<div class="columna2" style="box-sizing: border-box; padding: 10px; border: 1px solid black; border-style: dotted; background-color: #e2e2e2;"> <?php echo $tramite->solicitante ?></div>
	          		<div class="columna3" style="margin-right: 0px;">CI : </div>
	          		<div class="columna4" style="box-sizing: border-box;width: 150px;border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"><?php echo $tramite->ci ?></div>
	          	</div>
	          	<h5><b>FOLIO</b></h5>
	          	<div class="division">
	          		<div class="columna1" style="margin-left: 119px:">N° : </div>
	          		<div class="columna2" style="box-sizing: border-box; padding: 20px; border: 1px solid black; border-style: dotted; background-color: #e2e2e2;"> <?php echo $tramite->nro_folio ?></div>
	          		<div class="columna3" style="margin-left: 20px;">SUPERFICIE : </div>
	          		<div class="columna4" style="box-sizing: border-box;width: 210px;border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"><?php echo $tramite->superficie_testimonio ?> m2</div>
	          	</div>
	          	<div class="division">
	          		<div class="columna3" style="margin-left: 42px;">A FAVOR DE : </div>
	          		<div class="columna4" style="box-sizing: border-box;width: 517px;border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"><?php echo $tramite->solicitante ?></div>
	          	</div>
	          	<h5><b>TESTIMONIO DE PROPIEDAD</b></h5>
	          	<div class="division">
	          		<div class="columna1" style="margin-left: 119px:">N° : </div>
	          		<div class="columna2" style="box-sizing: border-box; padding: 20px; border: 1px solid black; border-style: dotted; background-color: #e2e2e2;"><?php echo $tramite->nro_testimonio ?></div>
	          		<div class="columna3" style="margin-left: 10px;">NOTARIA N° : </div>
	          		<div class="columna4" style="box-sizing: border-box; padding: 20px; border: 1px solid black; border-style: dotted; background-color: #e2e2e2;"><?php echo $tramite->notaria ?></div>
		 			<div class="columna5" style="margin-left: 40px;">FECHA : </div>
	          		<div class="columna6" style="box-sizing: border-box;width: 110px;border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"><?php echo $tramite->fecha_testimonio ?></div>
	          	</div>
	          	<div class="division">
	          		<div class="columna3" style="margin-left: 17px;">NOTARIO DR(A) : </div>
	          		<div class="columna4" style="box-sizing: border-box;width: 517px;border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"><?php echo $tramite->notario ?></div>
	          	</div>
	          	<div class="division">
	          		<div class="columna3" style="margin-left: 42px;">A FAVOR DE : </div>
	          		<div class="columna4" style="box-sizing: border-box;width: 517px;border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"><?php echo $tramite->solicitante ?></div>
	          	</div>
	          	<h5><b>IMPUESTOS</b></h5>
	          	<div class="division">
	          		<div class="columna4" style="box-sizing: border-box;width: 617px;border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"><?php echo $tramite->impuestos ?></div>
	          		
	          	</div>
	          	<h4><b><u>CARACTERISTICAS DE LA PROPIEDAD</u></b></h4>
	          	<div class="division">
	          		<div class="columna1" style="margin-left: -2px:">SUPERFICIE SEGUN TESTIMONIO : </div>
	          		<div class="columna2" style="box-sizing: border-box; padding: 0px; border: 1px solid black; border-style: dotted; background-color: #e2e2e2;"><?php echo $tramite->superficie_testimonio ?> m2</div>
	          		<div class="columna3" style="margin-left: -2px;">SUPERFICIE SEGUN MEDICION : </div>
	          		<div class="columna4" style="box-sizing: border-box; padding: 0px; ;border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"><?php echo $tramite->superficie_medicion ?> m2</div>
	          	</div>	
	          	<h4><b><u>OBSERVACIONES</u></b></h4>
	          	<div class="division">
	          		<div class="columna4" style="box-sizing: border-box;width: 617px;border: 1px solid black;border-style: dotted;background-color: #e2e2e2;float: right;
		 			margin-right: 30px;"><?php echo $tramite->observaciones ?></div>
	          		
	          	</div>
	          	
	    	</div>
	</body>
</html>