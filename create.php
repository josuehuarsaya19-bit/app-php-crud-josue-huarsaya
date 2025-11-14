<?php
require 'config/db.php';
require "includes/funciones.php";
include 'includes/header.php';

$stmt = $pdo->query('SELECT * FROM productos');
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$marcas = obtenerMarca($pdo);
$categorias = obtenerCategoria($pdo);


if ($_SERVER["REQUEST_METHOD"] === 'POST') {

  $nombre = $_POST["nombre"];
  $precio = $_POST["precio"];
  $descripcion = $_POST["descripcion"];
  $stock = $_POST["stock"];
  $categoria = $_POST["id_categoria"];
  $marca = $_POST["id_marca"];

  try {
    $stmt = $pdo->prepare(
      "INSERT INTO PRODUCTOS (nombre, descripcion, precio, stock, id_categoria, id_marca) 
        VALUES (?,?,?,?,?,?)"
    );
    $stmt->execute([$nombre, $descripcion, $precio, $stock, $categoria, $marca]);

    
    echo "
    <script>
  Swal.fire({
          title: 'Producto Guardado',
          text: 'Producto registrado correctamente',
          icon: 'success'
        }).then(()=>window.location='index.php');
    </script> 
    ";
  } catch (PDOException $e) {
    $error = addslashes($e->getMessage());
    echo "
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

<h2>Agregar Nuevo Producto➕😀🚀</h2>
<form method="POST">
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
  </div>

  <div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion">
  </div>

  <div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="text" class="form-control" id="precio" name="precio" required>
  </div>

  <div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="text" class="form-control" id="stock" name="stock">
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