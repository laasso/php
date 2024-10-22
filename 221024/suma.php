<html>
<head>
<title>Mi primer PHP</title>
</head>
<body>

<form action="suma.php" method="GET">
<input type="text" name="num1"/>
<input type="text" name="num2"/>
<input type="submit" name="submit" value ="sumar/>
</form
<?php

$numero = $_GET['num1'];

$numero2 = $_GET['num2'];

$resultado =  $numero + $numero2;

echo "Hola mundo de asix<br/>";

echo "La suma es:", $resultado;

?>

</body>
</html>

