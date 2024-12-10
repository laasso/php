<?php
session_start();

// Verificar si existe una variable de sesión para las montañas
if (!isset($_SESSION['muntanyes'])) {
    $_SESSION['muntanyes'] = [];
}

// Obtener los datos del formulario
$nom_muntanya = isset($_GET['nom_muntanya']) ? $_GET['nom_muntanya'] : '';
$altura = isset($_GET['altura']) ? $_GET['altura'] : '';
$data_ascens = isset($_GET['data_ascens']) ? $_GET['data_ascens'] : '';
$dificultat = isset($_GET['dificultat']) ? $_GET['dificultat'] : '';
$activitats = isset($_GET['activitats']) ? $_GET['activitats'] : [];

// Acción: agregar un nuevo registro
if ($nom_muntanya && $altura && $data_ascens && $dificultat) {
    // Crear un ID único para cada muntanya
    $id = uniqid();
    $_SESSION['muntanyes'][$id] = [
        'nom_muntanya' => $nom_muntanya,
        'altura' => $altura,
        'data_ascens' => $data_ascens,
        'dificultat' => $dificultat,
        'activitats' => implode(", ", $activitats) // Almacenar las actividades como texto
    ];
}

// Mostrar todas las montañas
echo "<h1>Les muntanyes introduïdes</h1>";
echo "<ul>";
foreach ($_SESSION['muntanyes'] as $id => $muntanya) {
    echo "<li>";
    echo "Nom: " . $muntanya['nom_muntanya'] . "<br>";
    echo "Altura: " . $muntanya['altura'] . " metres<br>";
    echo "Data d'ascens: " . $muntanya['data_ascens'] . "<br>";
    echo "Dificultat: " . $muntanya['dificultat'] . "<br>";
    echo "Activitats: " . $muntanya['activitats'] . "<br>";
    echo "<a href='edit.php?nom_muntanya=" . urlencode($muntanya['nom_muntanya']) . "'>Editar</a> | ";
    echo "<a href='delete.php?nom_muntanya=" . urlencode($muntanya['nom_muntanya']) . "'>Eliminar</a>";
    echo "</li>";
}
echo "</ul>";

echo "<a href='formulari_muntanyes.html'>Afegir més muntanyes</a>";
?>

