<?php session_start();
include('conexion.php');
$sql = "SELECT l.titulo, l.imagen FROM libros l";
$result = $con->query($sql);

$libros = [];

while ($libro = $result->fetch_assoc()) {
    $libros[] = $libro;
}

echo json_encode($libros);
