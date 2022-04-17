<?php
    include $_SERVER["DOCUMENT_ROOT"] . '/Restaurante/control/DAO.php';

    switch ($_REQUEST["opc"]) {

        case 1:
            $usuario = $_POST["usuario"];
            $contrasena = $_POST["contrasena"];
            Usuario :: acceso($usuario, $contrasena);
            include "../vista/main-admin.php";
            exit();
        break;
    }
    

?>