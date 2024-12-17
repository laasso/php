<?php
session_start();

// Verificar si existe una variable de sesión para las montañas
if (!isset($_SESSION['muntanyes'])) {
    $_SESSION['muntanyes'] = [];
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llista de Muntanyes</title>
</head>
<body>
    <h1>Les muntanyes introduïdes</h1>

    <?php if (!empty($_SESSION['muntanyes'])): ?>
        <ul>
            <?php foreach ($_SESSION['muntanyes'] as $id => $muntanya): ?>
                <li>
                    <strong>Nom:</strong> <?= htmlspecialchars($muntanya['nom_muntanya']) ?><br>
                    <strong>Altura:</strong> <?= htmlspecialchars($muntanya['altura']) ?> metres<br>
                    <strong>Data d'ascens:</strong> <?= htmlspecialchars($muntanya['data_ascens']) ?><br>
                    <strong>Dificultat:</strong> <?= htmlspecialchars($muntanya['dificultat']) ?><br>
                    <strong>Activitats:</strong> <?= htmlspecialchars($muntanya['activitats']) ?><br>
                    <a href="delete.php?id=<?= urlencode($id) ?>">Eliminar</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No hi ha cap muntanya registrada.</p>
    <?php endif; ?>

    <a href="add_muntanyes.php">Afegir una nova muntanya</a>
</body>
</html>
