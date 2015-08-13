
<?php if(!isset($_COOKIE["chsm"])&&(!isset($_SESSION['facebook']))) { ?>

	<div class= "perfil">
				Por favor inicie sesion.
	</div>

<?php } else {

	?>

		<div class= "perfil">

			<h2>Informacion del Usuario</h2>

			<p>Nombre: <label id="nombreUsuario"/></p>

			<p>Apellido: <label id="apellidosUsuario"/></p>

			<p>Nombre de usuario: <?php print "$_COOKIE[chsm]";?> </p>

			<p>Universidad: <label id="nombreUniversidad"/></p>

			<p>Programa: <label id="nombrePrograma"/></p>

		</div> 

<?php } ?>