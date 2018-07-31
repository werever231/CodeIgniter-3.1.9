<!DOCTYPE HTML>
<!--
	Fractal by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Comentarios</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css"/>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body id="top">
		<!-- Header -->
			<header id="header">
				<div class="content">
				<div class="maquina">
					<table align="center">
						<tr>
							<td colspan="5"><label>Comentarios</label></td>
						</tr>
						<tr>
							<td><label>Nombre</label></td>
							<td><label>Correo</label></td>
							<td><label>Comentario</label></td>
							<td>&nbps;</td>
							<td>&nbps;</td>
						</tr>

						<?php
							foreach ($consulta->result() as $fila)
							{
								echo"<tr>
									<td><label>" .$fila->Nombre. "</label></td>
									<td><label>" .$fila->Correo. "</label></td>
									<td><label>" .$fila->Coment."</label></td>
																		
									<td><a href='Modificar?id=".$fila->ID_Coment."' class='button special icon fa-download'>Modificar</a></li></td>
									<td><a href='Eliminar?id=".$fila->ID_Coment."'class='button special icon fa-download'>Eliminar</a></li></td>
								</tr>";		
							}	
						?>

					</table>
						
					<ul class="actions">
						<li><a href="<?php echo base_url(); ?>Inicio" class="button special icon fa-download">Volver al inicio</a></li>						
					</ul>										
				</div>
			</header>	
		</body>
	</html>