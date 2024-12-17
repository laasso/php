<?php
session_start();

// Verificar si existe una variable de sesión para las montañas
if (!isset($_SESSION['muntanyes'])) {
    $_SESSION['muntanyes'] = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Montañas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Gestión de Montañas</h1>
    <a href="add_muntanyes.php" class="add-button">Añadir nueva montaña</a>
    <ul>
        <?php if (!empty($_SESSION['muntanyes'])): ?>
            <?php foreach ($_SESSION['muntanyes'] as $id => $muntanya): ?>
                <li>
                    <strong>Nombre:</strong> <?= htmlspecialchars($muntanya['nom_muntanya']) ?><br>
                    <strong>Altura:</strong> <?= htmlspecialchars($muntanya['altura']) ?> metros<br>
                    <strong>Fecha de ascenso:</strong> <?= htmlspecialchars($muntanya['data_ascens']) ?><br>
                    <strong>Dificultad:</strong> <?= htmlspecialchars($muntanya['dificultat']) ?><br>
                    <strong>Actividades:</strong> <?= htmlspecialchars($muntanya['activitats']) ?><br>
                    
                    <?php if (!empty($muntanya['foto_muntanya'])): ?>
                        <img src="<?= htmlspecialchars($muntanya['foto_muntanya']) ?>" alt="Foto de <?= htmlspecialchars($muntanya['nom_muntanya']) ?>">
                    <?php endif; ?>

                    <a href="delete.php?id=<?= urlencode($id) ?>">Eliminar</a>
                    <a href="edit_muntanyes.php?id=<?= urlencode($id) ?>">Editar</a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay montañas registradas. <a href="add_muntanyes.php">Añade una aquí</a>.</p>
        <?php endif; ?>
    </ul>
</body>
</html>
