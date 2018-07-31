<!DOCTYPE HTML>
<!--
	Fractal by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Modificar Contacto</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body id="top">

		<!-- Header -->
			<header id="header">
				<div class="content">
				
					<ul class="actions">
						<li><a href="<?php echo base_url(); ?>Inicio" class="button special icon fa-download">Volver al inicio</a></li>						
					</ul>
				</div>
				<div class="formulario_contacto">
					<form method="POST" action="ActualizarComentario/<?=$id;?>">						
						<table>
							<tr>
								<td colspan="2"><label>Modificar Comentario</label></td>
							</tr>
							<?php
							//Jalas los datos del arreglo usando la sentencia mencionada $nombre_posicion->result[pos]->Atributo.
							echo "<tr>
								<td><label>Nombre:</label></td>
								<td><input type='text' name='nombre' value= '".$comentario->result()[0]->Nombre."' disabled></td>								
							</tr>
							<tr>
								<td><label>Correo:</label></td>
								<td><input type='text' name='correo' value='".$comentario->result()[0]->Correo."' disabled ></td>	
							</tr>
							<tr>
								<td><label>Comentario:</label></td>
								<td><textarea name='comentario'></textarea></td>
							</tr>";
							?>

							<tr>
								<td colspan="2" align="center"><input type="submit" value="Enviar"></td>							
							</tr>
						</table>
					</form>
					
				</div>
			</header>

		<!-- One -->
			<section id="one" class="wrapper style2 special">
				<header class="major">
					<h2>Una aplicación única<br />
					Comparte videojuegos y algo más.</h2>
				</header>
				<ul class="icons major">
					<li><span class="icon fa-camera-retro"><span class="label">Shoot</span></span></li>
					<li><span class="icon fa-refresh"><span class="label">Process</span></span></li>
					<li><span class="icon fa-cloud"><span class="label">Upload</span></span></li>
				</ul>
			</section>

		
		</body>
	</html>