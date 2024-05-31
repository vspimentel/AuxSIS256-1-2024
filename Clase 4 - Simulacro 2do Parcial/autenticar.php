<?php
session_start();
include('conexion.php');
$nombre = $_POST['nombre'];
$password = sha1($_POST['password']);

$sql = "SELECT nombre, nivel FROM usuarios WHERE nombre='$nombre' AND password='$password'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    $_SESSION['usuario'] = $usuario['nombre'];
    $_SESSION['nivel'] = $usuario['nivel'];
    $mensaje = "Usuario autenticado";
    $mensaje .= $usuario['nivel'] == 1 ? " Administrador" : " Usuario";
    $mensaje .= " $usuario[nombre]";
    $mensaje .= " Nivel $usuario[nivel]";
    echo $mensaje;
} else {
    echo "Usuario no autenticado";
}
