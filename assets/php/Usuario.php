<?php

class Usuario
{
  function verUsuarioss()
  {
    include("conexion.php");
    $consulta = "SELECT nombre, precio FROM productos";
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
                <p>$producto[nombre]</p>
              </div>
            </div>
          </td>
          <td>
            <h5>$producto[precio]</h5>
          </td>
          <td>
            <h5>$720.00</h5>
          </td>
          </tr>
          <tr>
            <td>$producto[nombre]</td>
            <td>$producto[precio]</td>
            <td>$producto[stock]</td>
            <td>$producto[descripcion_corta]</td>
            <td>$producto[descripcion]</td>
            <td>$producto[id_imagen]</td>
            <td>$producto[fecha_creacion]</td>
            <td>$producto[id_usuario]</td>
            <td><a href="">Editar</a></td>
            <td><a href="">Eliminar</a></td>
          </tr>
        EOT;
      }
    }
  }

  function verUsuarioId($id)
  {
    include("conexion.php");
    $consulta = "SELECT * FROM productos WHERE id_producto=?";
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
                <p>$producto[nombre]</p>
              </div>
            </div>
          </td>
          <td>
            <h5>$producto[precio]</h5>
          </td>
          <td>
            <h5>$720.00</h5>
          </td>
        </tr>
        <tr>
          <td>$producto[nombre]</td>
          <td>$producto[precio]</td>
          <td>$producto[stock]</td>
          <td>$producto[descripcion_corta]</td>
          <td>$producto[descripcion]</td>
          <td>$producto[id_imagen]</td>
          <td>$producto[fecha_creacion]</td>
          <td>$producto[id_usuario]</td>
          <td><a href="">Editar</a></td>
          <td><a href="">Eliminar</a></td>
        </tr>
      EOT;
    }
  }

  function editarUsuario($idCat, $nombre, $descripción)
  {
    include("conexion.php");
    $update = "UPDATE usuarios nombre = ?, descripción = ? WHERE id_usuario = ?";
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

  function eliminarUsuario($idCat)
  {
    include("conexion.php");
    $update = "DELETE FROM usuarios WHERE id_usuario = ?";
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