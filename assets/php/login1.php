<?php
session_start();

if(!$_POST)  header('Location: ../../index.php');

class Login{
    public function verificarUsuario($email, $clave){
        require ('conexion.php');
        $c = md5($clave);
        $query = "SELECT COUNT(*) FROM usuarios WHERE correo_electronico = `$email` AND pass = `$c`";
        $q = mysqli_query($connect, $query);
        if ($q == 1) Login::verificarPermiso($email);
        return FALSE;
    }

    public function verificarPermiso($email){
        require ('conexion.php');
        $query = "SELECT p.nombre 
        FROM PERMISOS p, USUARIOS u, USUARIO_PERMISO up 
        WHERE p.id_permiso = up.id_permiso 
        AND up.id_usuario = u.id_usuario
        AND u.correo_electronico = `$email`";
        $r = $connect->prepare($query);
        $r->store_result();
        if($r->num_rows() > 0){
            $permiso = $connect->use_result();
        }

        else return FALSE;
    }

    public function redireccionarUsuario($email, $clave){
        if (Login::verificarUsuario($email, $clave)) 
        require ('conexion.php');
        $query = "SELECT p.nombre 
        FROM PERMISOS p, USUARIOS u, USUARIO_PERMISO up 
        WHERE p.id_permiso = up.id_permiso 
        AND up.id_usuario = u.id_usuario
        AND u.correo_electronico = `$email`";
        $r = $connect->prepare($query);
        if($r->num_rows() > 0)
        {
            
        }
    }

}

?>