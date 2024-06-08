<?php
$con = new mysqli("localhost", "root", "", "bd_biblioteca");
if ($con->connect_error)
    die("Conexión fallida" . $con->connect_error);
