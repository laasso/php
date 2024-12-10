
<?php
// Inicia la sessió
session_start();

// Recupera els valors de la URL (GET)
$nom_muntanya = $_GET['nom_muntanya'] ?? 'No especificat';
$altura = $_GET['altura'] ?? 'No especificat';
$data_ascens = $_GET['data_ascens'] ?? 'No especificada';
$dificultat = $_GET['dificultat'] ?? 'No especificada';
$activitats = $_GET['activitats'] ?? [];

// Desa les dades en la sessió
$_SESSION['nom_muntanya'] = $nom_muntanya;
$_SESSION['altura'] = $altura;
$_SESSION['data_ascens'] = $data_ascens;
$_SESSION['dificultat'] = $dificultat;
$_SESSION['activitats'] = $activitats;

// Mostra un resum
echo "<h1>Dades Rebudes</h1>";
echo "<p><strong>Nom de la muntanya:</strong> $nom_muntanya</p>";
echo "<p><strong>Altura:</strong> $altura metres</p>";
echo "<p><strong>Data de l'últim ascens:</strong> $data_ascens</p>";
echo "<p><strong>Dificultat:</strong> $dificultat</p>";
echo "<p><strong>Activitats seleccionades:</strong> " . implode(', ', $activitats) . "</p>";
?>
