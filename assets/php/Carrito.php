<?php

class Carrito
{
  function verProductosId($idUsu)
  {
    include("conexion.php");
    $consulta = "SELECT p.id_producto as idP, p.nombre as producto, p.precio as precio, c.cantidad as cantidad, c.id_usuario as usuario FROM carrito c, productos p WHERE p.id_producto = c.id_producto AND c.id_usuario = ?";
    $resultado = $pdo->prepare($consulta);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$idUsu])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      if ($resultado->rowCount() > 0) {
        $total = 0.0;
        $registro = $resultado->fetchAll();
        foreach ($registro as $producto) {
          $subtotal = $producto['precio'] * $producto['cantidad'];
          print <<<EOT
          <tr>
            <td>
                <div class="media">
                    <div class="d-flex">
                        <img src="assets/img/gallery/card1.png" alt="" class="item-image"/>
                    </div>
                    <div class="media-body item-title">
                        <p>$producto[producto]</p>
                    </div>
                </div>
            </td>
            <td>
                <h5>$$producto[precio]</h5>
            </td>
            <td>
                <div class="media">
                    <div class="media-body item-title">
                      <form action="card.php" method="post" name="formulario1">
                        <input type="hidden" name="id_producto" value="$producto[idP]" />
                          <a href="javascript:enviar_formulario()" class="text-danger">Eliminar</a>
                      </form>
                    </div>
                </div>
            </td>
          </tr>
        EOT;
          $total += $subtotal;
        }
      }else{
        echo <<< EOT
        <script>
          $("#carrito > div").remove();
          $("#carrito").append("<h2>No hay Productos en el carrito.</h2>");
        </script>
        EOT;
      }
    }
  }

  function obtenerSubtotal($idUsu)
  {
    include("conexion.php");
    $consulta = "SELECT p.precio as precio, c.cantidad as cantidad FROM carrito c, productos p WHERE p.id_producto = c.id_producto AND c.id_usuario = ?";
    $resultado = $pdo->prepare($consulta);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$idUsu])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      $subTotal = 0.0;
      foreach ($resultado as $producto) {
        $subTotal = $producto['precio'] * $producto['cantidad'];
      }
      return $subTotal;
    }
  }

  function agregarProductoCarrito($idProd, $idUsu)
  {
    isset($_SESSION['id_usuario']) ? '' : header("location: ./login.html");
    empty($_POST) ? header("location: ./product_details.php?p=$idProd") : '';
    (isset($_POST['id_producto'])) ? '' : header("location: ./product_details.php?p=$idProd");
    include("conexion.php");
    $insert = "INSERT INTO carrito (id_producto, id_usuario) VALUES (?, ?)";
    $resultado = $pdo->prepare($insert);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$idProd, $idUsu])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      print <<<EOT
          
      EOT;
      header("location: ./product_details.php?p=$idProd&pp=true");
    }
  }

  function editarCarrito($idProd, $idUsu, $cantidad)
  {
    include("conexion.php");
    $consulta = "SELECT * FROM carrito WHERE p.id_producto = ? AND id_usuario = ?";
    $resultado = $pdo->query($consulta);

    if (!$resultado) {
      print "<p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      if ($resultado->rowCount() == 0) {
        header('location: carrito.php');
      }
    }
    $update = "UPDATE carrito SET cantidad = ?  WHERE id_producto = ? AND id_usuario = ?";
    $resultado = $pdo->prepare($update);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$cantidad, $idProd, $idUsu])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      if ($resultado->rowCount() == 0) {
        header('location: carrito.php');
        print <<<EOT
          
        EOT;
      }
      header('location: carrito.php');
      print <<<EOT
          
      EOT;
    }
  }

  function eliminarProducto($idProd, $idUsu)
  {

    include("conexion.php");
    $consulta = "SELECT * FROM carrito WHERE id_producto = ? AND id_usuario = ?";
    $resultado = $pdo->prepare($consulta);

    if (!$resultado) {
      print "<p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$idProd, $idUsu])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      if ($resultado->rowCount() == 0) {
        header('location: card.php');
      }
    }
    $delete = "DELETE FROM carrito WHERE id_producto = ? AND id_usuario = ?";
    $resultado = $pdo->prepare($delete);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$idProd, $idUsu])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      header('location: card.php?pp=true');
      print <<<EOT
          
      EOT;
    }
  }
}
