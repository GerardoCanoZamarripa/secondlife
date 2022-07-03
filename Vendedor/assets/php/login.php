<?php

if(isset($_POST['email'])){
    if (strlen($_POST['email']) > 1) {
        $email = $_POST['email'];
        $clave = $_POST['clave'];

        require ('conexion.php');

        $query = "SELECT * FROM USUARIOS WHERE correo_electronico = '$email' AND pass = '$clave'";
        $result = mysqli_query($connect, $query);
        $filas = mysqli_fetch_array($result);

        if($filas){
            session_start();
            $_SESSION['usuario'] = $filas['first_name'];
            $_SESSION['apellido'] = $filas['last_name'];
            $_SESSION['permiso'] = $filas['id_permiso'];

            $p1 = base64_encode($filas['pass']);
            $p2 = base64_encode($clave);

            if($p1 === $p2)

            if ($_SESSION['permiso'] == 1) {
                header('location: ../../admin.php');
            }
            if ($_SESSION['permiso'] == 2) {
                header('location: ../../user.php');
            }
        }else{
            printf("<script> alert('Usuario y/o Contraseña incorrectos')</script>");
            printf("<script>window.location.href = '../../login.html';</script>");
        }
    }else header('location: ../../login.html');
}else header('location: ../../login.html');