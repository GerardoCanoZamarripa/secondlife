<?php

if (isset($_POST['email'])) {
    if (strlen($_POST['email']) > 1) {
        $email = $_POST['email'];
        $pass = $_POST['clave'];

        $key = $pass.$email;
        $clave = md5($key);
        

        include("conexion.php");
        $consulta = "SELECT * FROM vendedores WHERE correo_electronico = ? AND pass = ?";
        $resultado = $pdo->prepare($consulta);

        if (!$resultado) {
            print "<p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
        } elseif (!$resultado->execute([$email, $clave])) {
            printf("<script> alert('Usuario y/o Contraseña incorrectos')</script>");
            printf("<script>window.location.href = '../../login.html';</script>");
        } else {
            $registro = $resultado->fetch();
            session_start();

            $registro['id_usuario'] ??= 'Default Value';
            $registro['nombre'] ??= 'Default Value';
            $registro['id_permiso'] ??= 'Default Value';

            $_SESSION['id_usuario'] = '';
            $_SESSION['usuario'] = '';
            $_SESSION['apellido'] = '';
            $_SESSION['permiso'] = '';
            $_SESSION['id_usuario'] = $registro['id_vendedor'];
            $_SESSION['usuario'] = $registro['nombre'];
            $_SESSION['permiso'] = $registro['id_permiso'];

            if ($_SESSION['permiso'] == 3) {
                header('location: ../../vendedor/index.php');
            }
            printf("<script> alert('Usuario y/o Contraseña incorrectos')</script>");
            printf("<script>window.location.href = '../../login.html';</script>");
        }
    } else header('location: ../../login.html');
} else header('location: ../../login.html');
