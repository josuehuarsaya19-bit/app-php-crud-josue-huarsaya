<?php
require 'config/db.php';
include 'includes/header.php';

$stmt = $pdo->query('SELECT * FROM productos');
$productos =$stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === 'POST'){
    
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];
    $stock = $_POST["stock"];

    $stmt = $pdo->prepare(
        "INSERT INTO PRODUCTOS (nombre, descripcion, precio, stock) 
        VALUES (?,?,?,?)");
    $stmt->execute([$nombre, $descripcion, $precio, $stock]);
     
    header("Location: index.php");
    exit;


    //(var_dump($nombre, $precio, $descripcion, $stock);
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
    <input type="text" class="form-control" id="precio" name="precio">
  </div>

  <div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="text" class="form-control" id="stock" name="stock">
  </div>
  
  <button type="guardar" class="btn btn-primary">Guardar</button>
</form>





<?php
include 'Includes/footer.php'
?>