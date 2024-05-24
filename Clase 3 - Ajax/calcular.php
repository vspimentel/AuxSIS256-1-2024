<?php

$num = $_POST['num'];
$operacion = $_POST['operacion'];
$hasta = $_POST['hasta'];
$respuesta = array();
for ($i = 1; $i <= $hasta; $i++) {
    switch ($operacion) {
        case 'suma':
            $fila = [$num, "+", $i, "=", $num + $i];
            break;
        case "resta":
            $fila = [$num, "-", $i, "=", $num - $i];
            break;
        case "multiplicacion":
            $fila = [$num, "*", $i, "=", $num * $i];
            break;
        case "division":
            $fila = [$num, "/", $i, "=", $num / $i];
            break;
    }
    array_push($respuesta, $fila);
}
echo json_encode($respuesta);
