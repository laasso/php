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

// Determina el sexo
if ($sexe == "H") {
    echo "Tu sexo es Masculino<br/>";
} else {
    echo "Tu sexo es Femenino<br/>";
}

// Verifica si está trabajando
if ($treballar == "Si") {
    echo "Estás currando<br/>";
} else {
    echo "No estás currando<br/>";
}

?>

