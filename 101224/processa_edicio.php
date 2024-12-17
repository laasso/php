<?php
session_start();

// Verificar que los datos están presentes
$id = $_POST['id'] ?? '';
if (!$id || !isset($_SESSION['muntanyes'][$id])) {
    header('Location: index.php');
    exit;
}

$nom_muntanya = $_POST['nom_muntanya'] ?? '';
$altura = $_POST['altura'] ?? '';
$data_ascens = $_POST['data_ascens'] ?? '';
$dificultat = $_POST['dificultat'] ?? '';
$activitats = isset($_POST['activitats']) ? implode(", ", $_POST['activitats']) : '';

if ($nom_muntanya && $altura && $dificultat) {
    $_SESSION['muntanyes'][$id] = [
        'nom_muntanya' => $nom_muntanya,
        'altura' => $altura,
        'data_ascens' => $data_ascens,
        'dificultat' => $dificultat,
        'activitats' => $activitats
    ];
}

// Redirigir de vuelta al listado de montañas
header('Location: index.php');
exit;
