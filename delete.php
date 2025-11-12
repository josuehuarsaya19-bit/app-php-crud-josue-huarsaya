<?php
require 'config/db.php';

$id_productos = $_GET["id_producto"];

$stmt = $pdo->prepare("DELETE FROM PRODUCTOS WHERE ID_PRODUCTO=?");
$stmt->execute([$id_productos]);
header("Location: index.php");
exit;
//var_dump("$id_producto") ;
?>