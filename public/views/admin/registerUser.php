<?php
    // include "../../../src/backend/CloseSession/logout.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParentNotify | Admin Panel</title>

    <link rel="stylesheet" href="../../css/generalStyles.css">
    <link rel="stylesheet" href="../../css/registerStyles.css">

    <script src="https://kit.fontawesome.com/aa91c476b6.js" crossorigin="anonymous"></script>
</head>

<body>

<div class="container">
    <h1>Registro | Administración</h1>
    
    <form action="" method="post">
        <div>
            <input type="text" name="nombre_usuario" placeholder="Nombres">
            <input type="text" name="apellido_usuario" placeholder="Apellidos">
        </div>
      
        <div>
            <input type="text" name="email_usuario" class="width_completo" placeholder="Email">
        </div>
      
        <div>
            <input type="password" name="contraseña_usuario" placeholder="Contraseña">
            <input type="password" name="repetir_contraseña_usuario" placeholder="Repetir contraseña">
        </div>

        <div>
            <input type="text" name="hijo1" class="width_completo" placeholder="Nombre completo del primer hijo">
        </div>

        <div>
            <input type="text" name="hijo2" class="width_completo" placeholder="Nombre completo del segundo hijo (vacio en caso de no haber)">
        </div>

        <div>
            <input type="text" name="hijo3" class="width_completo" placeholder="Nombre completo del tercer hijo (vacio en caso de no haber)">
        </div>
      
        <div class="id_container">
            <input type="text" name="ponchador_id" id="" placeholder="Ponchador ID">
            <form action="../../../src/backend/UserRegister/registerUser.php" method="post">
                <input type="submit" name="public" value="Registrar al usuario">
            </form>
        </div>

        <hr>

        <div class="cerrar_sesion_container">
            <form action="../../../src/backend/CloseSession/logout.php" method="post">
                <input type="submit" name="logout" value="Cerrar sesión">
            </form>
        </div>
    </form>
    <?php
    include "../../../src/backend/UserRegister/registerUser.php";
?>
</div>
</body>
</html>