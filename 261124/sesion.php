<html>
<head>
<title>PRIMERA SESION</title>
</head>
<body>
<?php
session_start();


$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$ciudad = $_GET['ciudad'];

echo "HOLA MUNDO DE ASIX<br/>";

echo "Te has logeado como: ". $nombre. " ". $apellido . "<br/>";
echo "Vives en: ". $ciudad . "<br/>";

$_SESSION['nombre'] = $nombre;
$_SESSION['apellido'] = $apellido;
$_SESSION['ciudad'] = $ciudad;

?>
<a href="secreta.php">Puedes entrar</a>
</body>
</html>
