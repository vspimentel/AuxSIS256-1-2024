<?php session_start();
if (isset($_SESSION['usuario'])) { ?>
    <?php
    include('conexion.php');
    $nivel = $_SESSION['nivel'];
    $sql = "SELECT l.id, l.titulo, l.imagen, l.autor, e.editorial, l.anio FROM libros l INNER JOIN editoriales e ON l.ideditorial = e.id";
    $result = $con->query($sql);
    ?>

    <table border='1'>
        <tr>
            <th>Nro</th>
            <th>Imagen</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Año</th>
            <?php if ($nivel == 1) { ?>
                <th colspan=2>Operaciones</th>
            <?php } ?>
        </tr>
        <?php
        while ($libro = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $libro['id']; ?></td>
                <td><img src="images/<?php echo $libro["imagen"]; ?>" width="50" height="50"></td>
                <td><?php echo $libro["titulo"]; ?></td>
                <td><?php echo $libro["autor"]; ?></td>
                <td><?php echo $libro["editorial"]; ?></td>
                <td><?php echo $libro["anio"]; ?></td>
                <?php if ($_SESSION['nivel'] == 1) { ?>
                    <td>
                        <a href="#">Editar</a>
                    </td>
                    <td>
                        <a href="#">Borrar</a>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
<?php } ?>