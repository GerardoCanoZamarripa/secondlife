<?php

class Categoria
{
  function verCategorias()
  {
    include("conexion.php");
    $consulta = "SELECT * FROM categorias";
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
                <p>$categoria[nombre]</p>
              </div>
            </div>
          </td>
          <td>
            <h5>$categoria[precio]</h5>
          </td>
          <td>
            <h5>$720.00</h5>
          </td>
          </tr>
          <tr>
            <td>$categoria[nombre]</td>
            <td>$categoria[precio]</td>
            <td>$categoria[stock]</td>
            <td>$categoria[descripcion_corta]</td>
            <td>$categoria[descripcion]</td>
            <td>$categoria[id_imagen]</td>
            <td>$categoria[fecha_creacion]</td>
            <td>$categoria[id_categoria]</td>
            <td><a href="">Editar</a></td>
            <td><a href="">Eliminar</a></td>
          </tr>
        EOT;
      }
    }
  }

  function verOpcionesCategorias()
  {
    include("conexion.php");
    $consulta = "SELECT * FROM categorias";
    $resultado = $pdo->query($consulta);

    if (!$resultado) {
      print "<p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      foreach ($resultado as $categoria) {
        print <<<EOT
            <option value="$categoria[id_categoria]">$categoria[nombre]</option>
        EOT;
      }
    }
  }

  function verCategoriaId($id)
  {
    include("conexion.php");
    $consulta = "SELECT * FROM categorias WHERE id_categoria=?";
    $resultado = $pdo->prepare($consulta);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$id])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      $registro = $resultado->fetch();
      return $registro['nombre'];
    }
  }

  function editarCategoria($idCat, $nombre, $descripción)
  {
    include("conexion.php");
    $update = "UPDATE categorias nombre = ?, descripción = ? WHERE id_categoria = ?";
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

  function eliminarCategoria($idCat)
  {
    include("conexion.php");
    $update = "DELETE FROM categorias WHERE id_categoria = ?";
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