<?php
session_start();

// Verificar que la sesión existe
if (!isset($_SESSION['muntanyes'])) {
    $_SESSION['muntanyes'] = [];
}

if (isset($_GET['nom_muntanya'])) {
    $nom_muntanya = $_GET['nom_muntanya'];

    // Eliminar el registro correspondiente al nombre de la muntanya
    foreach ($_SESSION['muntanyes'] as $id => $muntanya) {
        if ($muntanya['nom_muntanya'] === $nom_muntanya) {
            unset($_SESSION['muntanyes'][$id]);
            break;
        }
    }
}

// Redirigir de vuelta al listado de montañas
header('Location: processa_muntanyes.php');
exit;
?>

