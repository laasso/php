<?php
session_start();

// Verificar si existe una variable de sesión para las montañas
if (!isset($_SESSION['muntanyes'])) {
    $_SESSION['muntanyes'] = [];
}

// Obtener los datos del formulario
$nom_muntanya = $_POST['nom_muntanya'] ?? '';
$altura = $_POST['altura'] ?? '';
$data_ascens = $_POST['data_ascens'] ?? '';
$dificultat = $_POST['dificultat'] ?? '';
$activitats = isset($_POST['activitats']) ? implode(", ", $_POST['activitats']) : '';

// Validar que todos los datos requeridos están presentes
if ($nom_muntanya && $altura && $data_ascens && $dificultat) {
    $id = uniqid();
    $_SESSION['muntanyes'][$id] = [
        'nom_muntanya' => $nom_muntanya,
        'altura' => $altura,
        'data_ascens' => $data_ascens,
        'dificultat' => $dificultat,
        'activitats' => $activitats
    ];
}

// Redirigir a la página principal
header('Location: index.php');
exit;
