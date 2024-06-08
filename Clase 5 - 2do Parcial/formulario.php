<?php
include('conexion.php');
$sql = "SELECT id, editorial FROM editoriales";
$result = $con->query($sql);
?>

<form action="javascript:insertarLibro()" class="insert-libro">
  <label>Imagen</label>
  <input type="file" name="imagen" />
  <label>Titulo</label>
  <input type="text" name="titulo" />
  <label>Autor</label>
  <input type="text" name="autor" />
  <label>Editorial</label>
  <select name="editorial">
    <?php while ($editorial = $result->fetch_assoc()) { ?>
      <option value="<?php echo $editorial['id'] ?>"><?php echo $editorial['editorial'] ?></option>
    <?php } ?>
  </select>
  <label>Año</label>
  <input type="number" name="anio" />
  <button type="submit">Insertar</button>
</form>