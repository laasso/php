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
```
