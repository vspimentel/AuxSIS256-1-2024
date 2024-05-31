<?php session_start();
if (isset($_SESSION['usuario'])) { ?>
    <?php
    include('conexion.php');
    $nivel = $_SESSION['nivel'];
    $sql = "SELECT l.id, l.nombre, l.imagen, e.nombre AS editorial FROM libros l INNER JOIN editoriales e ON l.id_editorial = e.id";
    $result = $con->query($sql);
    ?>

    <table border='1'>
        <tr>
            <th>Nro</th>
            <th>Imagen</th>
            <th>Nombres</th>
            <th>Editorial</th>
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
                <td><?php echo $libro["nombre"]; ?></td>
                <td><?php echo $libro["editorial"]; ?></td>
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