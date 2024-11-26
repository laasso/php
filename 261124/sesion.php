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
$frase = isset($_GET['frase']) ? $_GET['frase'] : '';
$caracteres = strlen($frase); // Calcula el número de caracteres en el textarea

// Muestra los datos
echo "HOLA MUNDO DE ASIX<br/>";
echo "Te has logeado como: " . htmlspecialchars($nombre) . " " . htmlspecialchars($apellido) . "<br/>";
echo "Vives en: " . htmlspecialchars($ciudad) . "<br/>";
echo "La frase que has introducido tiene " . $caracteres . " caracteres.<br/>";

// Guarda los datos en la sesión
$_SESSION['nombre'] = $nombre;
$_SESSION['apellido'] = $apellido;
$_SESSION['ciudad'] = $ciudad;
$_SESSION['frase'] = $frase;
$_SESSION['caracteres'] = $caracteres;
?>
<a href="secreta.php">Puedes entrar</a>
</body>
</html>

