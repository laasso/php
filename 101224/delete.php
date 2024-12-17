<?php
session_start();

// Verificar que la sesión existe
if (!isset($_SESSION['muntanyes'])) {
    $_SESSION['muntanyes'] = [];
}

$id = $_GET['id'] ?? '';

if ($id && isset($_SESSION['muntanyes'][$id])) {
    unset($_SESSION['muntanyes'][$id]);
}

// Redirigir de vuelta al listado de montañas
header('Location: index.php');
exit;
