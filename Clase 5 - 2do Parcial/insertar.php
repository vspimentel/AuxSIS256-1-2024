<?php
include("conexion.php");
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$ideditorial = $_POST["editorial"];
$anio = $_POST["anio"];

$nombre_imagen = $_FILES['imagen']['name'];
$temp = $_FILES['imagen']['tmp_name'];
$nombre_imagen = explode(".", $nombre_imagen);
$extension = $nombre_imagen[1];
$nuevo_nombre = uniqid() . "." . $extension;
copy($temp, "images/$nuevo_nombre");

$sql = "INSERT INTO libros (imagen, titulo, autor, ideditorial, anio) 
VALUES ('$nuevo_nombre', '$titulo', '$autor', $ideditorial, $anio)";
$con->query($sql);
