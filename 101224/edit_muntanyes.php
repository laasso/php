<?php
session_start();

// Verificar si la montaña existe
$id = $_GET['id'] ?? '';
if (!$id || !isset($_SESSION['muntanyes'][$id])) {
    header('Location: index.php');
    exit;
}

$muntanya = $_SESSION['muntanyes'][$id];
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Editar Muntanya</title>
</head>
<body>
    <h1>Editar muntanya</h1>
    <form action="processa_edicio.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

        <label for="nom_muntanya">Nom de la muntanya:</label>
        <input type="text" id="nom_muntanya" name="nom_muntanya" value="<?= htmlspecialchars($muntanya['nom_muntanya']) ?>" required>
        <br><br>

        <label for="altura">Altura en metres:</label>
        <input type="number" id="altura" name="altura" value="<?= htmlspecialchars($muntanya['altura']) ?>" min="1" required>
        <br><br>

        <label for="data_ascens">Data de l'últim ascens:</label>
        <input type="date" id="data_ascens" name="data_ascens" value="<?= htmlspecialchars($muntanya['data_ascens']) ?>">
        <br><br>

        <label for="dificultat">Nivell de dificultat:</label>
        <select id="dificultat" name="dificultat">
            <option value="facil" <?= $muntanya['dificultat'] === 'facil' ? 'selected' : '' ?>>Fàcil</option>
            <option value="moderat" <?= $muntanya['dificultat'] === 'moderat' ? 'selected' : '' ?>>Moderat</option>
            <option value="dificil" <?= $muntanya['dificultat'] === 'dificil' ? 'selected' : '' ?>>Difícil</option>
        </select>
        <br><br>

        <label>Activitats disponibles:</label>
        <br>
        <input type="checkbox" id="senderisme" name="activitats[]" value="senderisme" <?= strpos($muntanya['activitats'], 'senderisme') !== false ? 'checked' : '' ?>>
        <label for="senderisme">Senderisme</label>
        <br>
        <input type="checkbox" id="escalada" name="activitats[]" value="escalada" <?= strpos($muntanya['activitats'], 'escalada') !== false ? 'checked' : '' ?>>
        <label for="escalada">Escalada</label>
        <br>
        <input type="checkbox" id="fotografia" name="activitats[]" value="fotografia" <?= strpos($muntanya['activitats'], 'fotografia') !== false ? 'checked' : '' ?>>
        <label for="fotografia">Fotografia</label>
        <br><br>

        <button type="submit">Guardar canvis</button>
    </form>
    <a href="index.php">Tornar a la llista</a>
</body>
</html>
