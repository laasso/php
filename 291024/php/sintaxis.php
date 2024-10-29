<?php
 
//Això és un comentari d'una línia en php.
/*Això també és un comentari d'una línia en php*/
#Això també és un comentari d'una sola línia.
 
/* Això és un comentari
PHP de
més d'una línia */
 
//Integració dins d'un document HTML
echo "Això és un missatge escrit amb PHP abans d'escriure el document HTML";
 
?>
 
<html>
 
<head>
<title>Integració php</title>
<meta charset="UTF-8"/>
</head>
 
<body>
<br/>
 
<?php
//Integració dins del cos del document HTML
echo "Això és un missatge escrit amb PHP integrat en el cos del document html";
?>
 
<!-- Integració de la funció echo dins d'un element HTML-->
<p><?= "Això és un missatge echo integrat en el paràgraf del document html";?></p>
 
</body>
 
</html>
