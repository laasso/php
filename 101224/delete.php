<?php
session_start();

// Verificar que la sesión existe
if (!isset($_SESSION['muntanyes'])) {
    $_SESSION['muntanyes'] = [];
}

if (isset($_GET['nom_muntanya'])) {
    $nom_muntanya = $_GET['nom_muntanya'];

    // Buscar la montaña en el array de montañas y obtener la posición
    foreach ($_SESSION['muntanyes'] as $id => $muntanya) {
        if ($muntanya['nom_muntanya'] === $nom_muntanya) {
            // Eliminar el elemento utilizando array_splice
            $keys = array_keys($_SESSION['muntanyes']);
            $position = array_search($id, $keys);  // Obtener la posición del id

            // Eliminar el elemento de la posición
            array_splice($_SESSION['muntanyes'], $position, 1);
            break;
        }
    }
}

// Redirigir de vuelta al listado de montañas
header('Location: processa_muntanyes.php');
exit;
?>

