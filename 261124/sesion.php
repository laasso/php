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
    session_start();

    if (isset($_GET['frase'])) {
        $frasearray = str_split($_GET['frase']);
        echo "<br/>";
        
        var_dump($frasearray);

        if (!isset($_SESSION['contador_letras'])) {
            $_SESSION['contador_letras'] = [];
        }
        
        foreach ($frasearray as $letra) {
            if (ctype_alpha($letra)) { 
                $letra = strtolower($letra); 
                if (!isset($_SESSION['contador_letras'][$letra])) {
                    $_SESSION['contador_letras'][$letra] = 0;
                }
                $_SESSION['contador_letras'][$letra]++;
            }
        }

        echo "<h3>Contadores:</h3>";
        foreach ($_SESSION['contador_letras'] as $letra => $cantidad) {
            echo "Letra '$letra': $cantidad<br/>";
        }
    }
    ?>
</body>
</html>

