<?php
// Router para el servidor embebido de PHP - emula las reglas de public/.htaccess
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . $uri;

// Si el fichero solicitado existe (img, css, js, etc.), dejar que el servidor lo sirva
if ($uri !== '/' && file_exists($file)) {
    return false;
}

// De lo contrario, pasar la ruta a index.php como ?url=
$_GET['url'] = ltrim($uri, '/');

// Asegurar que el directorio de trabajo es `public` para que los require relativos funcionen
chdir(__DIR__);
require __DIR__ . '/index.php';
