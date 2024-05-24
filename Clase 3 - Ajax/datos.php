<?php
$texto = $_POST['texto'];

$carreras = [
    "Ing. en Sistemas",
    "Ing. en Ciencias de Computacion",
    "Ing. en TI y Seguridad",
    "Ing. en Disenio y Animacion",
    "Ing. en Telecomunicaciones",
];

$resultados = array();
foreach ($carreras as $carrera) {
    if (strpos($carrera, $texto)) {
        array_push($resultados, $carrera);
    }
}

echo json_encode($resultados);
