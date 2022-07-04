<?php

class Vendedor
{
  function verVendedores()
  {
    include("conexion.php");
    $consulta = "SELECT * FROM vendedores";
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
            <td>$producto[id_vendedor]</td>
            <td><a href="">Editar</a></td>
            <td><a href="">Eliminar</a></td>
          </tr>
        EOT;
      }
    }
  }

  function verVendedorId($id)
  {
    include("conexion.php");
    $consulta = "SELECT * FROM vendedores WHERE id_producto=?";
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
          <td>$producto[id_vendedor]</td>
          <td><a href="">Editar</a></td>
          <td><a href="">Eliminar</a></td>
        </tr>
      EOT;
    }
  }

  function editarVendedor($idCat, $nombre, $descripción)
  {
    include("conexion.php");
    $update = "UPDATE vendedores nombre = ?, descripción = ? WHERE id_vendedor = ?";
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

  function eliminarVendedor($idCat)
  {
    include("conexion.php");
    $update = "DELETE FROM vendedores WHERE id_vendedor = ?";
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
