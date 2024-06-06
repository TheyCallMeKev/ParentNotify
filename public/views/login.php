<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParentNotify | Inicio de sesión</title>

    <link rel="stylesheet" href="../css/generalStyles.css">
    <link rel="stylesheet" href="../css/loginStyles.css">

</head>
<body>
    <div class="container">
        <span class="shape"></span>
        <span class="shape"></span>
        <div>
            <h1>ParentNotify</h1>
            <h2>Inicio de sesión</h2>
            <form action="../../src/backend/Login/loginAuthenthication.php" method="post">
                <input type="email" name="account_email" placeholder="Correo electrónico" required>
                <input type="password" name="account_password" placeholder="Contraseña" required>
                <input type="submit" value="Iniciar sesión">

                <?php
                    include '../../src/backend/Login/loginAuthenthication.php';
                ?>
            </form>
        </div>
    </div>
</body>
</html>