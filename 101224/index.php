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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #555;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #fff;
            margin: 10px 0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        li img {
            max-width: 200px;
            height: auto;
            display: block;
            margin-top: 10px;
        }
        a {
            color: #007BFF;
            text-decoration: none;
            margin-right: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
        .add-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .add-button:hover {
            background-color: #218838;
        }
    </style>
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
