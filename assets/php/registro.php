<?php

if (!$_POST) header('location: ../../index.html');
if (isset($_POST['nombre']) && $_POST['nombre'] != null) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $key = $pass.$email;
    $clave = md5($key);
    

    include('conexion.php');
    $query = "INSERT INTO USUARIOS (id_usuario, first_name, last_name, correo_electronico, pass, id_permiso)
VALUES (null, '$nombre', '$apellido', '$email', '$clave', 2)";
    if ($pdo->query($query)) {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
        </head>

        <body>
            <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
            <script>
                $(document).ready(function() {
                    alertify.alert("Second Life dice:", "Usuario registrado correctamente" ,function(e) {
                        if (e) {
                            window.location.href = "<?= "../../login.html" ?>";
                        }
                    });
                });
            </script>
        </body>

        </html>
<?php
    } //header('location: ../../login.html');
}
?>