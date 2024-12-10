<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari de Muntanyes</title>
</head>
<body>
    <h1>Afegeix una nova muntanya</h1>
    <form action="processa_muntanyes.php" method="get">
        <label for="nom_muntanya">Nom de la muntanya:</label>
        <input type="text" id="nom_muntanya" name="nom_muntanya" required><br><br>
        
        <label for="altura">Altura (en metres):</label>
        <input type="number" id="altura" name="altura" required><br><br>
        
        <label for="data_ascens">Data de l'últim ascens:</label>
        <input type="date" id="data_ascens" name="data_ascens" required><br><br>
        
        <label for="dificultat">Dificultat:</label>
        <select id="dificultat" name="dificultat">
            <option value="fàcil">Fàcil</option>
            <option value="moderada">Moderada</option>
            <option value="difícil">Difícil</option>
        </select><br><br>
        
        <label>Activitats disponibles:</label><br>
        <input type="checkbox" id="escalada" name="activitats[]" value="escalada">
        <label for="escalada">Escalada</label><br>
        
        <input type="checkbox" id="senderisme" name="activitats[]" value="senderisme">
        <label for="senderisme">Senderisme</label><br>
        
        <input type="checkbox" id="fotografia" name="activitats[]" value="fotografia">
        <label for="fotografia">Fotografia</label><br><br>
        
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

