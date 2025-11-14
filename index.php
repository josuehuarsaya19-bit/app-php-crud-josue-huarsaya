<?php
require 'config/db.php';
require 'includes/funciones.php';
include 'includes/header.php';

$stmt = $pdo->query("SELECT 
            p.id_producto,
            p.nombre,
            p.descripcion,
            c.nombre as categoria,
            m.nombre as marca,
            p.precio,
            p.stock
            from productos p
            INNER JOIN categorias c on p.id_categoria = c.id_categoria
            INNER JOIN marcas m on p.id_marca = m.id_marca
            order by 
            p.id_producto desc
");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$categorias = obtenerCategoria($pdo);
$marcas = obtenerMarca($pdo)
//var_dump($productos)
?>

<h2> Gestion de Productos</h2>
<a href="create.php" class="btn btn-success">NUEVO PRODUCTO ➕</a>

<table class="table">
  <thead>
    <tr>

      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      <th scope="col">categoria</th>
      <th scope="col">marca</th>
      <th scope="col">Precio</th>
      <th scope="col">Stock</th>
      <th scope="col">Opciones</th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($productos as $item): ?>
      <tr>
        <th scope="row"><?= $item["id_producto"] ?></th>
        <td><?= $item["nombre"] ?></td>
        <td><?= $item["descripcion"] ?></td>
        <td><?= $item["categoria"] ?></td>
        <td><?= $item["marca"] ?></td>
        <td><?= $item["precio"] ?></td>
        <td><?= $item["stock"] ?></td>

        <td>
          <div style="display: flex;">
            <a href="delete.php?id_producto=<?= $item["id_producto"]; ?>" type="button" class="mx-2 btn btn-danger">🗑️</a>
            <a href="update.php?id_producto=<?= $item["id_producto"]; ?>" type="button" class="mx-2 btn btn-info">🖋️</a>
          </div>
        </td>
      </tr>

    <?php endforeach; ?>
  </tbody>
</table>

<!-- <script>
  Swal.fire({
    title: "Producto Guardado",
    text: "Producto registrado correctamente",
    icon: "success"
  }).then(()=>window.location='index.php');
</script> -->



<?php
include 'Includes/footer.php'
?>