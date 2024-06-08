<?php
include('conexion.php');
$id = $_GET['id'];
$sql = "SELECT * FROM libros l INNER JOIN editoriales e ON l.ideditorial = e.id WHERE l.id = $id";
$result = $con->query($sql);
$libro = $result->fetch_assoc();
?>

<div class="libro-detalles">
    <img src="images/<?php echo $libro['imagen'] ?>" />
    <div class="datos">
        <div><b>Titulo:</b> <?php echo $libro['titulo'] ?></div>
        <div><b>Autor:</b> <?php echo $libro['autor'] ?></div>
        <div><b>Editorial:</b> <?php echo $libro['editorial'] ?></div>
        <div><b>Año:</b> <?php echo $libro['anio'] ?></div>
    </div>
</div>