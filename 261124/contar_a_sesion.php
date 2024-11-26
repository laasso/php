<html>
<head>
<title>ORDENAR PHP</title>
</head>
<body>
<?php
#creamos sesion
session_start();

#mostramos el contenido del array 
var_dump($_GET);
#convertimos el string enviado en un array
$frasearray = str_split($_GET['frase']);
echo "<br/>";
#lo mostramos:
var_dump($frasearray);

#a partir de aquí habrá que tratar el contenido y resolver...
$cuentaA = 0;

foreach ($frasearray as $letra){
	if ($letra == 'a' || $letra == 'A'){
		$cuentaA ++;
		echo "Encontrada nueva A. Ya van:".$cuentaA."</br>";
	}
}

$_SESSION['cuentaA'] = $cuentaA + $_SESSION['cuentaA'];

echo "A's totales: ".$_SESSION['cuentaA']."</br>";
?>
</body>
</html>
