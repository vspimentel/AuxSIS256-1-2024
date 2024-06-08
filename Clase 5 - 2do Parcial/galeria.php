<?php
include('conexion.php');
$sql = "SELECT id, imagen FROM libros";
$result = $con->query($sql);
?>
<div class="galeria">
    <?php while ($libro = $result->fetch_assoc()) { ?>
        <img src="images/<?php echo $libro['imagen'] ?>" id="<?php echo $libro['id'] ?>" class="imagen-libro" />
    <?php } ?>
</div>