<?php
session_start();

// Verificar que la sesión existe
if (!isset($_SESSION['muntanyes'])) {
    $_SESSION['muntanyes'] = [];
}

if (isset($_GET['nom_muntanya'])) {
    $nom_muntanya = $_GET['nom_muntanya'];

    // Buscar la montaña para editar
    foreach ($_SESSION['muntanyes'] as $id => $muntanya) {
        if ($muntanya['nom_muntanya'] === $nom_muntanya) {
            // Pre-cargar los valores de la montaña en el formulario
            $altura = $muntanya['altura'];
            $data_ascens = $muntanya['data_ascens'];
            $dificultat = $muntanya['dificultat'];
            $activitats = explode(", ", $muntanya['activitats']);
            break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los nuevos valores del formulario
    $altura = $_POST['altura'] ?? '';
    $data_ascens = $_POST['data_ascens'] ?? '';
    $dificultat = $_POST['dificultat'] ?? '';
    $activitats = $_POST['activitats'] ?? [];

    // Actualizar la montaña en la sesión
    foreach ($_SESSION['muntanyes'] as $id => &$muntanya) {
        if ($muntanya['nom_muntanya'] === $nom_muntanya) {
            $muntanya['altura'] = $altura;
            $muntanya['data_ascens'] = $data_ascens;
            $muntanya['dificultat'] = $dificultat;
            $muntanya['activitats'] = implode(", ", $activitats);
            break;
        }
    }

    // Redirigir después de editar
    header('Location: processa_muntanyes.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Muntanya</title>
</head>
<body>
    <h1>Edita la muntanya: <?php echo htmlspecialchars($nom_muntanya); ?></h1>
    <form action="edit.php?nom_muntanya=<?php echo urlencode($nom_muntanya); ?>" method="post">
        <label for="altura">Altura (en metres):</label>
        <input type="number" id="altura" name="altura" value="<?php echo htmlspecialchars($altura); ?>" required><br><br>
        
        <label for="data_ascens">Data de l'últim ascens:</label>
        <input type="date" id="data_ascens" name="data_ascens" value="<?php echo htmlspecialchars($data_ascens); ?>" required><br><br>
        
        <label for="dificultat">Dificultat:</label>
        <select id="dificultat" name="dificultat">
            <option value="fàcil" <?php echo ($dificultat === 'fàcil') ? 'selected' : ''; ?>>Fàcil</option>
            <option value="moderada" <?php echo ($dificultat === 'moderada') ? 'selected' : ''; ?>>Moderada</option>
            <option value="difícil" <?php echo ($dificultat === 'difícil') ? 'selected' : ''; ?>>Difícil</option>
        </select><br><br>
        
        <label>Activitats disponibles:</label><br>
        <input type="checkbox" id="escalada" name="activitats[]" value="escalada" <?php echo (in_array('escalada', $activitats)) ? 'checked' : ''; ?>>
        <label for="escalada">Escalada</label><br>
        
        <input type="checkbox" id="senderisme" name="activitats[]" value="senderisme" <?php echo (in_array('senderisme', $activitats)) ? 'checked' : ''; ?>>
        <label for="senderisme">Senderisme</label><br>
        
        <input type="checkbox" id="fotografia" name="activitats[]" value="fotografia" <?php echo (in_array('fotografia', $activitats)) ? 'checked' : ''; ?>>
        <label for="fotografia">Fotografia</label><br><br>
        
        <button type="submit">Guardar canvis</button>
    </form>
</body>
</html>

