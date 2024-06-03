<?php
session_start();

// Estas cabeceras evitan que se almacene la imagen en el caché
header("Expires: Sat, 12 Jul 2020 09:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Creamos la imagen con el tamaño determinado
$imagen = imagecreate(250, 100);

// Elegimos los colores para el fondo y el texto
$rojo = mt_rand(150, 200);
$verde = mt_rand(150, 200);
$azul = mt_rand(200, 250);
$rojo_fondo = mt_rand(80, 120);
$verde_fondo = mt_rand(80, 120);
$azul_fondo = mt_rand(80, 200);
$rojo_basura = $rojo + 55;
$verde_basura = $verde + 55;
$azul_basura = $azul + 5;

$color_texto = imagecolorallocate($imagen, $rojo, $verde, $azul);
$color_fondo = imagecolorallocate($imagen, $rojo_fondo, $verde_fondo, $azul_fondo);
$color_basura = imagecolorallocate($imagen, $rojo_basura, $verde_basura, $azul_basura);

// Aplicamos el color de fondo
imagefill($imagen, 0, 0, $color_fondo);

// Construimos la palabra
$caracteres = "ABCDEFGHJKMNPRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789";
$cantidad = 6;
$palabra = "";
for ($i = 1; $i <= $cantidad; $i++) {
    $pos = mt_rand(0, strlen($caracteres) - 1);
    $palabra .= substr($caracteres, $pos, 1);
}

// Comprobamos la existencia de la función ImageTTFText()
$fontsList = array(
    "./fonts/VeraMoBd.ttf",
    "./fonts/VeraMoBI.ttf",
    "./fonts/VeraMono.ttf",
    "./fonts/VeraMoIt.ttf"
);
$randFontNo = mt_rand(0, sizeof($fontsList) - 1);
$randFontPath = realpath($fontsList[$randFontNo]);

// Al azar las señales al fondo del respectivo texto ImageTTFText
for ($i = 1; $i < 20; $i++) {
    $x = mt_rand(0, 250); // pos x
    $y = mt_rand(0, 100); // pos y
    $car = chr(mt_rand(45, 250)); //caracter aleatorio
    $angulo = mt_rand(3, 180);
    imagettftext($imagen, 12, $angulo, $x, $y, $color_basura, $randFontPath, $car);
}

// Imprimir la palabra
$x = mt_rand(10, 120);
$y = mt_rand(40, 65);
imagettftext($imagen, 28, mt_rand(-10, 10), $x, $y, $color_texto, $randFontPath, $palabra);

// Ensuciamos la imagen con líneas
for ($i = 1; $i < 60; $i++) {
    $x = mt_rand(0, 250);
    $y = mt_rand(0, 100);
    imageline($imagen, $x, $y, $x + mt_rand(-40, 40), $y + mt_rand(-40, 40), $color_basura);
}

// Enviamos mediante la sesión la palabra elegida
$_SESSION["oculto"] = $palabra;

// Enviamos la cabecera correspondiente al navegador y luego la imagen
header("Content-type: image/png");
imagepng($imagen);

// Eliminamos la imagen
imagedestroy($imagen);
