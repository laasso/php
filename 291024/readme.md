# 291024

Segunda clase

## Configuracion php.ini

```bash
vim /etc/php/8.1/apache/php.ini
```

### Lineas modificadas

En el fichero comentado anteriormente ponemos la siguiente configuracion

```bash
display_errors = Off

;Oculta la version de PHP
expose_php = Off

;Deshabilita la apertura de URL remota
allow_url_fopen = Off
allow_url_include = Off

;Restringe el acceso PHP a ciertos directorios
open_basedir = Off

;Desactiva funciones potencialemente peligrosas
disable_functions = Off

;Proteger las cookies   
session.cookie_httponly = 1
session.cookie_secure = 1

;Prevenir ejecucion de scripts
max_execution_time
memory_limit

;Desactivar subida de arhcivos i restringir maximo de tamano
file_uploads = Off/O
upload_max_filesize = 2M
max_file_uploads = 10
```

## Formulario HTML que ejecuta PHP

En la carpeta php se encuentran los fichero suma.php y form.php

[suma.php](php/suma.php)

```php
<?php

$numero = $_GET['num1'];

$numero2 = $_GET['num2'];

$resultado =  $numero + $numero2;

echo "Hola mundo de asix<br/>";

echo "La suma es:", $resultado;

?>

```

[form.php](php/form.php)

```php
<html>
<head>
<title>Mi primer PHP</title>
</head>
<body>

<form action="suma.php" method="GET">
<input type="text" name="num1"/>
<input type="text" name="num2"/>
<input type="submit" name="submit" value ="sumar"/>
</form>


</body>
</html>
```

