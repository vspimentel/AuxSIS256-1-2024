<?php
include('conexion.php');
$sql = "SELECT l.imagen, l.titulo, l.autor, e.editorial, l.anio FROM libros l INNER JOIN editoriales e ON l.ideditorial = e.id";
$result = $con->query($sql);
?>

<table border='1'>
    <tr>
        <th>Imagen</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Editorial</th>
        <th>Año</th>
    </tr>
    <?php
    while ($libro = $result->fetch_assoc()) {
    ?>
        <tr>
            <td><img src="images/<?php echo $libro["imagen"]; ?>" width="50" height="50"></td>
            <td><?php echo $libro["titulo"]; ?></td>
            <td><?php echo $libro["autor"]; ?></td>
            <td><?php echo $libro["editorial"]; ?></td>
            <td><?php echo $libro["anio"]; ?></td>
        </tr>
    <?php } ?>
</table>