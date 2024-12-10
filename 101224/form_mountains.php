<?php
// Inicia la sessió
session_start();

// Crea un array associatiu per desar les dades si no existeix
if (!isset($_SESSION['muntanyes'])) {
    $_SESSION['muntanyes'] = [];
}

// Genera un ID automàtic per la nova entrada
$id = uniqid();

// Recupera els valors de la URL (GET)
$nom_muntanya = $_GET['nom_muntanya'] ?? 'No especificat';
$altura = $_GET['altura'] ?? 'No especificat';
$data_ascens = $_GET['data_ascens'] ?? 'No especificada';
$dificultat = $_GET['dificultat'] ?? 'No especificada';
$activitats = $_GET['activitats'] ?? [];

// Desa les dades en un array associatiu amb l'ID com a clau
$_SESSION['muntanyes'][$id] = [
    'nom_muntanya' => $nom_muntanya,
    'altura' => $altura,
    'data_ascens' => $data_ascens,
    'dificultat' => $dificultat,
    'activitats' => $activitats
];

// Mostra totes les dades introduïdes fins ara
echo "<h1>Totes les dades introduïdes</h1>";
if (!empty($_SESSION['muntanyes'])) {
    echo "<ul>";
    foreach ($_SESSION['muntanyes'] as $key => $muntanya) {
        echo "<li><strong>ID:</strong> $key</li>";
        echo "<ul>";
        echo "<li><strong>Nom de la muntanya:</strong> " . htmlspecialchars($muntanya['nom_muntanya']) . "</li>";
        echo "<li><strong>Altura:</strong> " . htmlspecialchars($muntanya['altura']) . " metres</li>";
        echo "<li><strong>Data de l'últim ascens:</strong> " . htmlspecialchars($muntanya['data_ascens']) . "</li>";
        echo "<li><strong>Dificultat:</strong> " . htmlspecialchars($muntanya['dificultat']) . "</li>";
        echo "<li><strong>Activitats seleccionades:</strong> " . htmlspecialchars(implode(', ', $muntanya['activitats'])) . "</li>";
        echo "</ul>";
    }
    echo "</ul>";
} else {
    echo "<p>No hi ha dades introduïdes.</p>";
}
?>

