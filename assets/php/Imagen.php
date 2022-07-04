<?php

class Imagen
{
  function verImagenes()
  {
    include("conexion.php");
    $consulta = "SELECT * FROM imagenes";
    $resultado = $pdo->query($consulta);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      foreach ($resultado as $registro) {
        print <<<EOT
          <tr>
          <td>
            <div class="media">
              <div class="d-flex">
                <img src="assets/img/gallery/card1.png" alt="" />
              </div>
              <div class="media-body">
                <p>$imagen[nombre]</p>
              </div>
            </div>
          </td>
          <td>
            <h5>$imagen[precio]</h5>
          </td>
          <td>
            <h5>$720.00</h5>
          </td>
          </tr>
          <tr>
            <td>$imagen[nombre]</td>
            <td>$imagen[precio]</td>
            <td>$imagen[stock]</td>
            <td>$imagen[descripcion_corta]</td>
            <td>$imagen[descripcion]</td>
            <td>$imagen[id_imagen]</td>
            <td>$imagen[fecha_creacion]</td>
            <td>$imagen[id_imagen]</td>
            <td><a href="">Editar</a></td>
            <td><a href="">Eliminar</a></td>
          </tr>
        EOT;
      }
    }
  }

  function verImagenId($id)
  {
    include("conexion.php");
    $consulta = "SELECT * FROM imagenes WHERE id_imagen=?";
    $resultado = $pdo->prepare($consulta);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$id])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      $registro = $resultado->fetch();
      print <<< EOT
        <tr>
          <td>
            <div class="media">
              <div class="d-flex">
                <img src="assets/img/gallery/card1.png" alt="" />
              </div>
              <div class="media-body">
                <p>$imagen[nombre]</p>
              </div>
            </div>
          </td>
          <td>
            <h5>$imagen[precio]</h5>
          </td>
          <td>
            <h5>$720.00</h5>
          </td>
        </tr>
        <tr>
          <td>$imagen[nombre]</td>
          <td>$imagen[precio]</td>
          <td>$imagen[stock]</td>
          <td>$imagen[descripcion_corta]</td>
          <td>$imagen[descripcion]</td>
          <td>$imagen[id_imagen]</td>
          <td>$imagen[fecha_creacion]</td>
          <td>$imagen[id_imagen]</td>
          <td><a href="">Editar</a></td>
          <td><a href="">Eliminar</a></td>
        </tr>
      EOT;
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
