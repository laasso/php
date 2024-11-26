<html>
<head>
    <title>Contar Letras "a" en PHP</title>
</head>
<body>
    <form method="get" action="">
        <label for="frase">Introduce una frase:</label>
        <input type="text" id="frase" name="frase" required>
        <input type="submit" value="Contar">
    </form>

    <?php
    #creamos sesion
    session_start();

    if (isset($_GET['frase'])) {
        # Mostramos el contenido del array
        var_dump($_GET);

        # Convertimos el string enviado en un array
        $frasearray = str_split($_GET['frase']);
        echo "<br/>";
        
        # Lo mostramos:
        var_dump($frasearray);
        
        # Contamos las letras "a"
        $contador_a = $_SESSION['contador_a'];

        foreach ($frasearray as $letra) {
            if (strtolower($letra) === 'a') {
                $contador_a++;

            }
        }

        echo "<br/>La letra 'a' aparece $contador_a veces en la frase.";
        $_SESSION['contador_a'] = $contador_a;
    }
    ?>
</body>
</html>
