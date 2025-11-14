<?php

function obtenerCategoria($pdo){
    $stmt = $pdo->query("SELECT * FROM categorias");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerMarca($pdo){
    $stmt = $pdo->query("SELECT * FROM marcas");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
 ?>