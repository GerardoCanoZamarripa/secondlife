<?php

class Imagen
{
  function verImagenes($idP)
  {
    include("conexion.php");
    $consulta = "SELECT i.nombre as imagen, v.nombre as nomv FROM imagenes i, productos p, vendedores v WHERE p.id_producto = i.id_producto AND p.id_vendedor = v.id_vendedor AND i.id_producto = ?";
    $resultado = $pdo->prepare($consulta);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$idP])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      print <<<EOT
        <div class="product_image_area section-padding40">
              <div class="container">
                <div class="row s_product_inner">
                  <div class="col-lg-5">
                    <div class="product_slider_img">
                      <div id="vertical">
      EOT;
      foreach ($resultado as $img) {
        print <<< EOT
            <div data-thumb="assets/img/productos/$img[nomv]/$img[imagen]">
              <img src="assets/img/productos/$img[nomv]/$img[imagen]" / class="w-100">
            </div>
        EOT;
      }
    }
  }

  function verImagenId($idP)
  {
    include("conexion.php");
    $consulta = "SELECT i.nombre as imagen  FROM productos p, vendedores v, imagenes i WHERE i.id_producto = p.id_producto AND p.id_vendedor = v.id_vendedor AND i.nombre LIKE ('%1____') AND i.id_producto = ?";
    $resultado = $pdo->prepare($consulta);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$idP])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      $registro = $resultado->fetch();
      return $registro['imagen'];
    }
  }

  function editarImagen($idCat, $nombre, $descripción)
  {
    include("conexion.php");
    $update = "UPDATE imagenes nombre = ?, descripción = ? WHERE id_imagen = ?";
    $resultado = $pdo->prepare($update);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$idCat, $nombre, $descripción])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      print <<<EOT
          
        EOT;
    }
  }

  function eliminarImagen($idCat)
  {
    include("conexion.php");
    $update = "DELETE FROM imagenes WHERE id_imagen = ?";
    $resultado = $pdo->prepare($update);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$idCat])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      print <<<EOT
          
        EOT;
    }
  }
}
