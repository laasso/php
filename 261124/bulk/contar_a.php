<html>
<head>
<title>ORDENAR PHP</title>
</head>
<body>
<?php
#mostramos el contenido del array 
var_dump($_GET);
#convertimos el string enviado en un array
$frasearray = str_split($_GET['frase']);
echo "<br/>";
#lo mostramos:
var_dump($frasearray);

#a partir de aquí habrá que tratar el contenido y resolver...

?>
</body>
</html>
