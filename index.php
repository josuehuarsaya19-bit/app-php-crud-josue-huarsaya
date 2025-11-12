<?php
require 'config/db.php';
include 'includes/header.php';

$stmt = $pdo->query('SELECT * FROM productos');
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($productos)
?>

<h2> Gestion de Productos</h2>
<a href="create.php" class="btn btn-success">NUEVO PRODUCTO ➕</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      <th scope="col">Precio</th>
      <th scope="col">Stock</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($productos as $item): ?>
      <tr>
        <th scope="row"><?= $item["id_producto"]; ?></th>
        <td><?= $item["nombre"];?></td>
        <td><?= $item["descripcion"];?></td>
        <td><?= $item["precio"];?></td>
        <td><?= $item["stock"];?></td>
        <td>
          <div style="display: flex;">
          <a  href="delete.php?id_producto=<?= $item["id_producto"]; ?>" type="button" class="mx-2 btn btn-danger">🗑️</a>
          <a type="button" class="mx-2 btn btn-info">🖋️</a>
          </div>
        </td>
      </tr>

    <?php endforeach; ?>
  </tbody>
</table>




<?php
include 'Includes/footer.php'
?>