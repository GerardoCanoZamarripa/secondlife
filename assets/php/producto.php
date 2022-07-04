<?php

class Producto
{
  function verProductos()
  {
    include("conexion.php");
    $consulta = "SELECT nombre, precio, id_producto FROM productos";
    $resultado = $pdo->query($consulta);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      foreach ($resultado as $registro) {
        print <<<EOT
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-new-arrival mb-50 text-center">
                            <div class="popular-img">
                                <img src="assets/img/gallery/popular1.png" alt="">
                            </div>
                            <div class="popular-caption">
                                <h3><a href="product_details.php?p=$registro[id_producto]">$registro[nombre]</a></h3>
                                <span>$$registro[precio]</span>
                            </div>
                        </div>
                    </div>
                EOT;
      }
    }
  }

  function verProductoId($id)
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
      $Vfav = "";
      $Vfav = verificarFavorito($registro['id_producto'], 3);
      include_once('Categoria.php');
      $cat = new Categoria;
      $c = $cat->verCategoriaId($registro['id_categoria']);
      print <<< EOT
            <div class="product_image_area section-padding40">
                <div class="container">
                    <div class="row s_product_inner">
                        <div class="col-lg-5">
                            <div class="product_slider_img">
                                <div id="vertical">
                                    <div data-thumb="assets/img/gallery/product-details1.png">
                                        <img src="assets/img/gallery/product-details1.png" / class="w-100">
                                    </div>
                                    <div data-thumb="assets/img/gallery/product-details2.png">
                                        <img src="assets/img/gallery/product-details2.png"/ class="w-100">
                                    </div>
                                    <div data-thumb="assets/img/gallery/product-details3.png">
                                        <img src="assets/img/gallery/product-details3.png" / class="w-100">
                                    </div>
                                    <div data-thumb="assets/img/gallery/product-details4.png">
                                        <img src="assets/img/gallery/product-details4.png" / class="w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-1">
                            <div class="s_product_text">
                                <h3>$registro[nombre]</h3>
                                <h2>$registro[precio]</h2>
                                <ul class="list">
                                    <li>
                                        <span>Categoría: </span><a class="active">$c</a>
                                    </li>
                                    <li>
                                        <span>Disponibilidad: </span><a class="active"> $registro[stock]</a>
                                    </li>
                                </ul>
                                <div class="card_area">
                                    <div class="product_count d-inline-block">
                                        <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                                        <input class="input-number" type="text" value="1" min="1" max="$registro[stock]">
                                        <span class="number-increment"> <i class="ti-plus"></i></span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="#" class="btn">Agregar al carrito</a>
                                        <a href="#" class="like_us"><span class="material-symbols-rounded" style="margin-top: 13px;">$Vfav</span> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Product Area End-->
            <!--? Product Description Area Start-->
            <section class="product_description_area">
                <div class="container">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Descripción</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Especificaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Comentarios</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <p>
                                $registro[descripcion]
                            </p>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5>Width</h5>
                                            </td>
                                            <td>
                                                <h5>128mm</h5>
                                            </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5>Height</h5>
                                </td>
                                <td>
                                  <h5>508mm</h5>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5>Depth</h5>
                                </td>
                                <td>
                                  <h5>85mm</h5>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5>Weight</h5>
                                </td>
                                <td>
                                  <h5>52gm</h5>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5>Quality checking</h5>
                                </td>
                                <td>
                                  <h5>yes</h5>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5>Freshness Duration</h5>
                                </td>
                                <td>
                                  <h5>03days</h5>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5>When packeting</h5>
                                </td>
                                <td>
                                  <h5>Without touch of hand</h5>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5>Each Box contains</h5>
                                </td>
                                <td>
                                  <h5>60pcs</h5>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      
                    <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="row total_rate">
                            <div class="col-6">
                              <div class="box_total">
                                <h5>Overall</h5>
                                <h4>4.0</h4>
                                <h6>(03 Reviews)</h6>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="rating_list">
                                <h3>Based on 3 Reviews</h3>
                                <ul class="list">
                                  <li>
                                    <a href="#">5 Star
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i> 01</a>
                                    </li>
                                    <li>
                                      <a href="#">4 Star
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> 01</a>
                                      </li>
                                      <li>
                                        <a href="#">3 Star
                                          <i class="fa fa-star"></i>
                                          <i class="fa fa-star"></i>
                                          <i class="fa fa-star"></i>
                                          <i class="fa fa-star"></i>
                                          <i class="fa fa-star"></i> 01</a>
                                        </li>
                                        <li>
                                          <a href="#">2 Star
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> 01</a>
                                          </li>
                                          <li>
                                            <a href="#">1 Star
                                              <i class="fa fa-star"></i>
                                              <i class="fa fa-star"></i>
                                              <i class="fa fa-star"></i>
                                              <i class="fa fa-star"></i>
                                              <i class="fa fa-star"></i> 01</a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="review_list">
                                      <div class="review_item">
                                        <div class="media">
                                          <div class="d-flex">
                                            <img src="assets/img/gallery/review-1.png" alt="" />
                                          </div>
                                          <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                          </div>
                                        </div>
                                        <p>
                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                          sed do eiusmod tempor incididunt ut labore et dolore magna
                                          aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                          ullamco laboris nisi ut aliquip ex ea commodo
                                        </p>
                                      </div>
                                      
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="review_box">
                                      <h4>Add a Review</h4>
                                      <p>Your Rating:</p>
                                      <ul class="list">
                                        <li>
                                          <a href="#">
                                            <i class="fa fa-star"></i>
                                          </a>
                                        </li>
                                        <li>
                                          <a href="#">
                                            <i class="fa fa-star"></i>
                                          </a>
                                        </li>
                                        <li>
                                          <a href="#">
                                            <i class="fa fa-star"></i>
                                          </a>
                                        </li>
                                        <li>
                                          <a href="#">
                                            <i class="fa fa-star"></i>
                                          </a>
                                        </li>
                                        <li>
                                          <a href="#">
                                            <i class="fa fa-star"></i>
                                          </a>
                                        </li>
                                      </ul>
                                      <p>Outstanding</p>
                                      <form class="row contact_form" action="contact_process.php" method="post" novalidate="novalidate">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Your Full name" />
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email Address" />
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <input type="text" class="form-control" name="number" placeholder="Phone Number" />
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <textarea class="form-control" name="message" rows="1" placeholder="Review"></textarea>
                                          </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                          <button type="submit" value="submit" class="btn">
                                            Submit Now
                                          </button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
            EOT;
    }
  }

  function verProductosVendedor($idVendedor)
  {
    include("conexion.php");
    $consulta = "SELECT * FROM productos WHERE id_vendedor = ?";
    $resultado = $pdo->prepare($consulta);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$idVendedor])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      $registro = $resultado->fetchAll();
      foreach ($registro as $producto) {
        print <<<EOT
          <tr>
            <td>
              <div class="media">
                <div class="d-flex">
                  <img src="assets/img/gallery/card1.png" alt="" height="100px"/>
                </div>
                <div class="media-body">
                  <p>$producto[nombre]</p>
                </div>
              </div>
            </td>
            <td>
              <h5>$$producto[precio]</h5>
            </td>
            <td>
              <h5>$producto[stock]</h5>
            </td>
            <td>
              <div class="media">
                <div class="media-body">
                  <p>$producto[descripcion_corta]</p>
                </div>
              </div>
            </td>
            <td>
              <div class="media">
                <div class="media-body">
                  <p>$producto[descripcion]</p>
                </div>
              </div>
            </td>
            <td>
              <div class="media">
                <div class="media-body">
                  <p>$producto[id_categoria]</p>
                </div>
              </div>
            </td>
            <td>
              <div class="media">
                <div class="media-body">
                  <p>$producto[fecha_creacion]</p>
                </div>
              </div>
            </td>
            <td><a href="" class="text-dark">Editar</a></td>
            <td><a href="" class="text-dark">Eliminar</a></td>
          </tr>
        EOT;
      }
    }
  }

  function agregarProducto()
  {
    empty($_POST) ? header('location: ./product_add.html') : '';
    (isset($_POST['nombre']) && !empty($_POST)) ? '' : header('location: ./product_add.html');
    include("conexion.php");
    $update = "INSERT INTO productos (id_producto, nombre, stock, ubicacion, precio, descripción, marca, dimensiones, id_condicion, id_categoria, id_vendedor, fecha_creacion) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $resultado = $pdo->prepare($update);
    $fecha = new DateTime();

    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$nombre, $stock, $ubicacion, $precio, $descripcion, $marca, $dimensiones, $id_condicion, $id_categoria, $id_vendedor, $fecha])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      print <<<EOT
          
      EOT;
      header('location: ./index.html');
    }
  }

  function editarProducto($id, $idVendedor)
  {
    include("conexion.php");
    $update = "UPDATE productos   WHERE id_producto = ? AND id_vendedor = ?";
    $resultado = $pdo->prepare($update);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$id, $idVendedor])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      print <<<EOT
          
      EOT;
    }
  }

  function eliminarProducto($id)
  {
  }

  function verFavoritos($idUsu)
  {
    include("conexion.php");
    $consulta = "SELECT p.nombre as prod, p.precio as prec, v.nombre as nomV  FROM favoritos f, productos p, vendedores v, usuarios u WHERE f.id_producto = p.id_producto AND p.id_vendedor = v.id_vendedor AND f.id_usuario = u.id_usuario AND f.id_usuario = ?";
    $resultado = $pdo->prepare($consulta);

    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$idUsu])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      if ($resultado->rowCount() > 0) {
        $registro = $resultado->fetchAll();
        foreach ($registro as $favorito) {
          print <<< EOT
            <tr>
              <td>
                  <div class="media">
                      <div class="d-flex">
                          <img src="assets/img/gallery/card1.png" alt="" />
                      </div>
                      <div class="media-body">
                          <p>$favorito[prod]</p>
                      </div>
                  </div>
              </td>
              <td>
                  <h5>$$favorito[prec]</h5>
              </td>
              <td>
                  <div class="media">
                      <div class="media-body">
                          <p>$favorito[nomV]</p>
                      </div>
                  </div>
              </td>
              <td>
                <div class="media">
                  <div class="media-body">
                      <p>Eliminar</p>
                  </div>
                </div>
              </td>
            </tr>
          EOT;
        }
      } else {
        echo <<< EOT
        <script>
          $("#favoritos > div").remove();
          $("#favoritos").append("<h2>No hay Favoritos por mostrar</h2>");
        </script>
        EOT;
      }
    }
  }
}

function cambiarFavorito($idProd, $idUsu)
{
  include("conexion.php");
  $consulta = "SELECT * FROM favoritos WHERE id_producto = ? AND id_usuario = ?";
  $resultado = $pdo->prepare($consulta);
  if (!$resultado) {
    print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
  } elseif (!$resultado->execute([$idProd, $idUsu])) {
    print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
  } else {
    $query = "";
    if ($resultado->rowCount() > 0) {
      $query = "DELETE FROM favoritos WHERE id_producto = ? AND id_usuario = ?";
    } else {
      $query = "INSERT INTO favoritos (id_producto, id_usuario) VALUES (?,?)";
    }
    $resultado = $pdo->prepare($query);
    if (!$resultado) {
      print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([$idProd, $idUsu])) {
      print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
      die('<script type="text/javascript">window.location=\'' . 'product_details.php' . '\';</script‌​>');
    }
  }
}

function verificarFavorito($idProd, $idUsu)
{
  include("conexion.php");
  $consulta = "SELECT * FROM favoritos WHERE id_producto = ? AND id_usuario = ?";
  $resultado = $pdo->prepare($consulta);

  if (!$resultado) {
    print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
  } elseif (!$resultado->execute([$idProd, $idUsu])) {
    print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
  } else {
    if ($resultado->rowCount() > 0) {
      return "heart_minus";
    } else {
      return "heart_plus";
    }
  }
}
