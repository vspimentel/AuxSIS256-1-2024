<?php
session_start();
include('conexion.php');
$usuario = $_POST['usuario'];
$password = sha1($_POST['password']);
$captcha = $_POST['captcha'];
if ($captcha == $_SESSION['oculto']) {
    $sql = "SELECT usuario, nivel FROM usuarios WHERE usuario='$usuario' AND password='$password'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        $_SESSION['usuario'] = $usuario['usuario'];
        $_SESSION['nivel'] = $usuario['nivel'];
        $mensaje = "Usuario autenticado";
        $mensaje .= $usuario['nivel'] == 1 ? " Administrador" : " Usuario";
        $mensaje .= " $usuario[usuario]";
        $mensaje .= " Nivel $usuario[nivel]";
        echo $mensaje;
    } else {
        echo "Usuario no autenticado";
    }
} else {
    echo "Captcha incorrecto";
}
