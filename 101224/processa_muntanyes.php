<?php
// Inicia la sessió
session_start();

// Crea un array associatiu per desar les dades si no existeix
if (!isset($_SESSION['muntanyes'])) {
    $_SESSION['muntanyes'] = [];
}

// Accions basades en el mètode GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $nom_muntanya = $_GET['nom_muntanya'] ?? null;

        // Eliminar un registre
        if ($action === 'delete' && $nom_muntanya) {
            $_SESSION['muntanyes'] = array_filter(
                $_SESSION['muntanyes'],
                fn($muntanya) => $muntanya['nom_muntanya'] !== $nom_muntanya
            );
        }

        // Editar un registre
        if ($action === 'edit' && $nom_muntanya) {
            foreach ($_SESSION['muntanyes'] as $id => $muntanya) {
                if ($muntanya['nom_muntanya'] === $nom_muntanya) {
                    // Crea un formulari per modificar els valors
                    echo "<h1>Edita la muntanya: $nom_muntanya</h1>";
                    echo "<form action='processa_muntanyes.php' method='get'>";
                    echo "<input type='hidden' name='action' value='update'>";
                    echo "<input type='hidden' name='id' value='$id'>";
                    echo "<label for='nom_muntanya'>Nom de la muntanya:</label>";
                    echo "<input type='text' id='nom_muntanya' name='nom_muntanya' value='" . htmlspecialchars($muntanya['nom_muntanya']) . "' required><br><br>";
                    echo "<label for='altura'>Altura (en metres):</label>";
                    echo "<input type='number' id='altura' name='altura' value='" . htmlspecialchars($muntanya['altura']) . "' required><br><br>";
                    echo "<label for='data_ascens'>Data de l'últim ascens:</label>";
                    echo "<input type='date' id='data_ascens' name='data_ascens' value='" . htmlspecialchars($muntanya['data_ascens']) . "' required><br><br>";
                    echo "<label for='dificultat'>Dificultat:</label>";
                    echo "<select id='dificultat' name='dificultat'>";
                    echo "<option value='fàcil' " . ($muntanya['dificultat'] === 'fàcil' ? 'selected' : '') . ">Fàcil</option>";
                    echo "<option value='moderada' " . ($muntanya['dificultat'] === 'moderada' ? 'selected' : '') . ">Moderada</option>";
                    echo "<option value='difícil' " . ($muntanya['dificultat'] === 'difícil' ? 'selected' : '') . ">Difícil</option>";
                    echo "</select><br><br>";
                    echo "<label>Activitats disponibles:</label><br>";
                    foreach (['escalada', 'senderisme', 'fotografia'] as $activitat) {
                        $checked = in_array($activitat, $muntanya['activitats']) ? 'checked' : '';
                        echo "<input type='checkbox' id='$activitat' name='activitats[]' value='$activitat' $checked>";
                        echo "<label for='$activitat'>" . ucfirst($activitat) . "</label><br>";
                    }
                    echo "<br><button type='submit'>Actualitzar</button>";
                    echo "</form>";
                    exit;
                }
            }
        }

        // Actualitzar un registre
        if ($action === 'update') {
            $id = $_GET['id'];
            $_SESSION['muntanyes'][$id] = [
                'nom_muntanya' => $_GET['nom_muntanya'] ?? 'No especificat',
                'altura' => $_GET['altura'] ?? 'No especificat',
                'data_ascens' => $_GET['data_ascens'] ?? 'No especificada',
                'dificultat' => $_GET['dificultat'] ?? 'No especificada',
                'activitats' => $_GET['activitats'] ?? []
            ];
        }
    } else {
        // Desa una nova muntanya
        $nom_muntanya = $_GET['nom_muntanya'] ?? 'No especificat';
        $altura = $_GET['altura'] ?? 'No especificat';
        $data_ascens = $_GET['data_ascens'] ?? 'No especificada';
        $dificultat = $_GET['dificultat'] ?? 'No especificada';
        $activitats = $_GET['activitats'] ?? [];
        $id = uniqid();

        $_SESSION['muntanyes'][$id] = [
            'nom_muntanya' => $nom_muntanya,
            'altura' => $altura,
            'data_ascens' => $data_ascens,
            'dificultat' => $dificultat,
            'activitats' => $activitats
        ];
    }
}

// Mostra totes les muntanyes
echo "<h1>Totes les dades introduïdes</h1>";
if (!empty($_SESSION['muntanyes'])) {
    echo "<ul>";
    foreach ($_SESSION['muntanyes'] as $muntanya) {
        echo "<li>";
        echo "<strong>Nom de la muntanya:</strong> " . htmlspecialchars($muntanya['nom_muntanya']) . "<br>";
        echo "<strong>Altura:</strong> " . htmlspecialchars($muntanya['altura']) . " metres<br>";
        echo "<strong>Data de l'últim ascens:</strong> " . htmlspecialchars($muntanya['data_ascens']) . "<br>";
        echo "<strong>Dificultat:</strong> " . htmlspecialchars($muntanya['dificultat']) . "<br>";
        echo "<strong>Activitats seleccionades:</strong> " . htmlspecialchars(implode(', ', $muntanya['activitats'])) . "<br>";
        echo "<a href='?action=edit&nom_muntanya=" . urlencode($muntanya['nom_muntanya']) . "'>Edita</a> | ";
        echo "<a href='?action=delete&nom_muntanya=" . urlencode($muntanya['nom_muntanya']) . "' onclick='return confirm(\"Segur que vols eliminar aquesta muntanya?\");'>Elimina</a>";
        echo "</li><br>";
    }
    echo "</ul>";
} else {
    echo "<p>No hi ha dades introduïdes.</p>";
}

// Botó per afegir més dades
echo "<hr>";
echo "<form action='formulari_muntanyes.html' method='get'>";
echo "<button type='submit'>Afegir més dades</button>";
echo "</form>";
?>

