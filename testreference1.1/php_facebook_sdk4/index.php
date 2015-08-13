<?php
	require_once 'app/start.php';
?>
<!DOCTYPE html>

<html>
<head>
	<meta chartset="UTF-8">
	<title>Conexion</title>

	<style>
		body{
			margin: 100px auto;
			width: 400px;
			text-align: center;
		}

	</style>

</head>
<body>

	<h1>Conexion con facebook</h1>

	<a href="<?php echo $helper->getLoginUrl($config['scopes']); ?>">Iniciar Sesion</a>
</body>
</html>