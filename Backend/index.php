<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (file_exists(__DIR__ . '/public' . $_SERVER['REQUEST_URI'])) {
        return false; // Sirve el archivo directamente si existe
    } else {
        include __DIR__ . '/public/index.php'; // Redirige todas las solicitudes a index.php
    }