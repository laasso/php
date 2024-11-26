<html>
<head>
<title>PRIMERA SESION</title>
</head>
<body>
<?php
session_start();

session_destroy();

	echo "Sesion cerrada: ";
	
	echo "<a href='formsesion.php'>Ir a inicio</a>";

?>
</body>
</html>
