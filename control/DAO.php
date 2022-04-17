<?php
    class Usuario {
        var $usuario;
        var $contrasena;
        var $estado;

        function Usuario($usuario, $contrasena, $estado) {
            $this -> usuario = $nombre_usuario;
            $this -> contrasena = $contrasena;
            $this -> estado = $estado;
        }

        public static function acceso($usuario, $contrasena) {
            include "../conexion/conexion.php";
            $sql = mysqli_query($cnn, "select usuario, contrasena, tipo from usuario where usuario = '$usuario' and contrasena = '$contrasena' and estado = 'T';");
            while ($consulta = mysqli_fetch_array($sql)) {
                $tipo = $consulta['tipo'];
            }
            $rows = mysqli_num_rows($sql);
            if ($rows == 0) {
                echo "<script type='text/javascript'> alert('Nombre de usuario y/o contrasena incorrectos'); history.back(); </script>";
            } else {
                if ($tipo == 'a') {
                    echo "<script type='text/javascript'> window.location.href='../vista/main-admin.html'; </script>";
                } else {
                    echo "<script type='text/javascript'> window.location.href='../vista/main.php'; </script>";
                }
            }
        }
    }  
    
    /*  */
?>