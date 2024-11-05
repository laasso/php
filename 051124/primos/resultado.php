<?php

$numero = $_GET['numero'];
$i = 3;
$primo = $numero % 2 != 0 || $numero == 2;

while ($primo && $i < $numero) {
    $primo = ($numero % $i) != 0;
    $i = $i + 2;
}

if ($primo) {
    echo "El número $numero es primo";
} else {
    echo "No es primo. Sus divisores son: ";
    
    for ($j = 1; $j <= $numero; $j++) {
        if ($numero % $j == 0) {
            echo $j . " ";
        }
    }
}

?>

