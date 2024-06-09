<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="estils.css">
	<title>Paginació</title>
	<!-Alex Vazquez Carrion->
</head>
<body>
	<div class="sessio">
		
			<button onclick="location.href='Controlador/iniciar_controlador.php'">Iniciar sessio</button>
			<button onclick="location.href='Controlador/register_controlador.php'">Registrar-se</button>
	</div>
	<div class="contenidor">
		<h1>Articles</h1>
		<section class="articles">
			<ul>
					<?php echo articles();?>
			</ul>
		</section>
		<form action="index.php" method="GET" id="principal">
			<select id="opcions" name="opcions" onchange="this.form.submit()">
				<option value="5" <?php if($fi == 5) echo "selected"?>>5</option>
				<option value="10" <?php if($fi == 10) echo "selected"?>>10</option>
				<option value="15" <?php if($fi == 15) echo "selected" ?>>15</option>
				<option value="20" <?php if($fi == 20) echo "selected" ?>>20</option>
			</select>
		</form>	
		<section class="paginacio">
		<ul>
		<?php //Aqui el que estic fent es activar o desactivar el boto a partir de comprovar a quina pagina es troba l'usuari?>
    		<li class="<?php if ($pagina == 1) echo "disabled" ?>">
        	<?php if($pagina != 1){ ?> <a href="?pagina=<?php echo $pagina - 1; ?>"><?php } ?>Anterior</a>
    		</li>
			<?php //Aqui el que estic fent es fer un bucle per posar els botons exactes depenent del que seleccioni l'usuari?>
			<?php for ($x = 1; $x <= $paginas; $x++) { ?>
				<li class="<?php if ($x == $pagina) echo "active"; ?>">
					<a value=<?php echo $x; ?> href="?pagina=<?php echo $x; ?>"><?php echo $x; ?></a>
				</li>
			<?php } ?>
			<?php //Aqui el que estic fent es activar o desactivar el boto a partir de comprovar a quina pagina es troba l'usuari?>
			<li class="<?php if ($pagina == $paginas) echo "disabled" ?>">
			<?php if($pagina < $paginas){ ?> <a href="?pagina=<?php echo $pagina + 1; ?>"><?php } ?>Seguent</a>
			</li>
		</ul>
		</section>
	</div>
</body>
</html>