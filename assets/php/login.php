<?php

if(isset($_POST['email'])){
    if (strlen($_POST['email']) > 1) {
        $email = $_POST['email'];
        $clave = $_POST['clave'];

        include("conexion.php");
        $consulta = "SELECT * FROM usuarios WHERE correo_electronico = ? AND pass = ?";
        $resultado = $pdo->prepare($consulta);

        if (!$resultado) {
            print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
        } elseif (!$resultado->execute([$email, $clave])) {
            printf("<script> alert('Usuario y/o Contraseña incorrectos')</script>");
            printf("<script>window.location.href = '../../login.html';</script>");
        } else {
            $registro = $resultado->fetch();

            session_start();
            
            $_SESSION['usuario'] = '';
            $_SESSION['apellido'] = '';
            $_SESSION['permiso'] = '';
            $_SESSION['usuario'] = $registro['first_name'];
            $_SESSION['apellido'] = $registro['last_name'];
            $_SESSION['permiso'] = $registro['id_permiso'];

            $p1 = base64_encode($registro['pass']);
            $p2 = base64_encode($clave);

            if($p1 === $p2)

            if ($_SESSION['permiso'] == 1) {
                header('location: ../../admin.php');
            }
            if ($_SESSION['permiso'] == 2) {
                header('location: ../../user.php');
            }
        }
    }else header('location: ../../login.html');
}else header('location: ../../login.html');