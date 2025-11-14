<?php
require 'config/db.php';
require 'includes/funciones.php';
include 'includes/header.php';

$id_producto = $_GET["id_producto"];
$stmt = $pdo->prepare("SELECT * FROM productos WHERE id_producto = ?");
$stmt->execute([$id_producto]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);

$marcas = obtenerMarca($pdo);
$categorias = obtenerCategoria($pdo);


if ($_SERVER["REQUEST_METHOD"] === 'POST') {

  $nombre = $_POST["nombre"];
  $precio = $_POST["precio"];
  $descripcion = $_POST["descripcion"];
  $stock = $_POST["stock"];

  try {
    $stmt = $pdo->prepare(
      "UPDATE PRODUCTOS
      SET nombre =?, descripcion = ?, precio= ?, stock=?, categoria=? marca=?
      WHERE id_producto =?"
    );
    $stmt->execute([$nombre, $descripcion, $precio, $stock, $id_categoria, $id_marca, $id_producto]);

    echo"
    <script>
  Swal.fire({
          title: 'Producto Editado',
          text: 'Producto registrado correctamente',
          icon: 'success'
        }).then(()=>window.location='index.php');
    </script> 
    ";

  } catch (PDOException $e) {
    $error = addslashes($e->getMessage());
    echo"
    <script>
  Swal.fire({
    title: 'Error al Guardar',
    text: '$error',
    icon: 'error'
  }).then(()=>window.location='index.php');
</script>
    ";
  }

  exit;

}
?>

<h2>Actualizar productos🚀</h2>
<form method="POST">
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $producto['nombre']?>">
  </div>

  <div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion"
    value="<?= $producto['descripcion'] ?>"
    >
  </div>

  <div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" class="form-control" id="precio" name="precio" required
    value="<?= $producto['precio'] ?>"
    >
  </div>

  <div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" class="form-control" id="stock" name="stock"
    value="<?= $producto['stock'] ?>"
    >
  </div>

  <div class="mb-3">
    <label for="marca">Marca</label>
    <select name="id_marca" class="form-select mb-3" aria-label="Default select example">
      <option selected>Selecione una marca</option>
      <?php foreach ($marcas as $item): ?>
        <option value="<?= $item['id_marca'] ?>">
          <?= $item['nombre'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="categoria">Categoria</label>
    <select name="id_categoria" class="form-select mb-3" aria-label="Default select example">
      <option selected>Seleccione un categoria</option>
      <?php foreach ($categorias as $item):  ?>
        <option value="<?= $item['id_categoria'] ?>">
          <?= $item['nombre'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <button type="guardar" class="btn btn-primary">Guardar</button>
</form>






<?php
include 'Includes/footer.php'
?>