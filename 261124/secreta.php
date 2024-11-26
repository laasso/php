<html>
<head>
<title>PRIMERA SESION</title>
</head>
<body>
<?php
session_start();

if ($_SESSION['nombre'] != null){

	$nombre = $_SESSION['nombre'];
	$apellido = $_SESSION['apellido'];
	$ciudad = $_SESSION['ciudad'];

	echo "PAGINA ACCESIBLE CON SESION INICIADA<br/>";

	echo "Te has logeado como: ". $nombre. " ". $apellido . "<br/>";
	echo "Vives en: ". $ciudad . "<br/>";
	
	echo "<a href='logout.php'>Cerrar sesión</a>";
	
} else {

	header("Location:formsesion.php");

}
?>
</body>
</html>
