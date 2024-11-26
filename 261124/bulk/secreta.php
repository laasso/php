<html>
<head>
<title>PAGINA SECRETA</title>
</head>
<body>
<?php
session_start();

// Verifica si los datos están en la sesión
if (isset($_SESSION['nombre'], $_SESSION['apellido'], $_SESSION['ciudad'], $_SESSION['caracteres'])) {
    echo "Bienvenido a la página secreta, " . htmlspecialchars($_SESSION['nombre']) . " " . htmlspecialchars($_SESSION['apellido']) . ".<br/>";
    echo "Vives en: " . htmlspecialchars($_SESSION['ciudad']) . "<br/>";
    echo "La frase que ingresaste tiene: " . $_SESSION['caracteres'] . " caracteres.<br/>";
} else {
    echo "No tienes acceso a esta página. Debes iniciar sesión primero.";
}
?>
<a href="sesion.php">Volver</a>
</body>
</html>

