<?php

$nombre = $_GET['name'];
$adreca = $_GET['adreca'];
$mail = $_GET['mail'];
$telefono = $_GET['telefon'];
$sexe = $_GET['sexe'];
$treballar = $_GET['treballar'];

echo "Tus datos son:<br/>";

echo "Nombre: " . $nombre . "<br/>";
echo "Adreça: " . $adreca . "<br/>";
echo "Mail: " . $mail . "<br/>";
echo "Teléfono: " . $telefono . "<br/>";
echo "Sexo: " . $sexe . "<br/>";
echo "Traballar: " . $treballar;

?>

