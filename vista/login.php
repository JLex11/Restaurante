<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin-styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/validacion.js"></script>
    <title>Acceso</title>
</head>
<body>
    <header>
        <nav>
            <p  class="logo-name">RESTAURANT</p>
            <p>LA PLAZUELA DE LA SALCHICHA</p>
        </nav>
    </header>

    
    <div class="contenedor">
        <div class="contenedor-activador">
            <p class="btn-login">Iniciar session</p>

            <form method="post" action="../modelo/facade.php?opc=1" class="form-login" id="form-login" onsubmit="return vlogin()">

                <div class="contenedor-login">
                    <input type="text" name="usuario" id="usuario" required placeholder="Ingresa tu nombre de usuario">
                    <input type="password" name="contrasena" id="contrasena" required placeholder="Ingresa tu contraseña">
                    <div class="buttons">
                        <a href="../index.html"><input class="b2" type="button" value="Regresar"></a>
                        <input type="submit" value="Ingresar" class="btn">
                    </div>
                </div>
            </form>

        </div>
    </div>
</body>
</html>