<?php
include("conexion.php");
$sql = "SELECT id, imagen FROM libros";
$result = $con->query($sql);
?>
<div class="gallery">
    <?php while ($libro = $result->fetch_assoc()) { ?>
        <div class="imagen">
            <img src="images/<?php echo $libro["imagen"] ?>">
        </div>
    <?php } ?>
</div>