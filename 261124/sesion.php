<html>
<head>
    <title>Contar Letras en PHP</title>
</head>
<body>
    <form method="get" action="">
        <label for="frase">Introduce una frase:</label>
        <input type="text" id="frase" name="frase" required>
        <input type="submit" value="Contar">
    </form>

    <?php
    # Iniciamos la sesión
    session_start();

    if (isset($_GET['frase'])) {
        # Mostramos el contenido del array GET
        var_dump($_GET);

        # Convertimos el string enviado en un array de caracteres
        $frasearray = str_split($_GET['frase']);
        echo "<br/>";
        
        # Mostramos el array convertido
        var_dump($frasearray);

        # Recuperamos o inicializamos el contador de letras
        if (!isset($_SESSION['contador_letras'])) {
            $_SESSION['contador_letras'] = [];
        }
        
        # Procesamos cada letra
        foreach ($frasearray as $letra) {
            if (ctype_alpha($letra)) { // Solo contar letras
                $letra = strtolower($letra); // Convertir a minúsculas
                if (!isset($_SESSION['contador_letras'][$letra])) {
                    $_SESSION['contador_letras'][$letra] = 0;
                }
                $_SESSION['contador_letras'][$letra]++;
            }
        }

        # Mostramos los resultados
        echo "<h3>Conteo de letras:</h3>";
        foreach ($_SESSION['contador_letras'] as $letra => $cantidad) {
            echo "Letra '$letra': $cantidad veces<br/>";
        }
    }
    ?>
</body>
</html>

