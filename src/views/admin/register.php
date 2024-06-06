<?php
    include "../backend/logout.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParentNotify | Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../src/design/stylelogin.css">

    <script src="https://kit.fontawesome.com/aa91c476b6.js" crossorigin="anonymous"></script>
</head>
<body style="height: 100dvh; background-color: #303030;" class="d-flex justify-content-center align-items-center m-0 p-0">

    <div class="container shadow-lg" style="width: 60%;">
        <div class="row">

            <div class="col p-3 bg-light rounded">
                <h3 class="text-center opacity-50 mb-4">ParentNotify Registro</h3>

                <form action="" method="post" class="d-flex flex-column">
                    <div class="input-group mb-2">
                        <div class="input-group-text border-1 border-dark">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <input type="text" class="form-control border-1 border-dark" style="font-size: 14px;" name="nombre_usuario" placeholder="Nombre">
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-text border-1 border-dark">
                           <i class="fa-solid fa-user"></i>
                        </div>
                        <input type="text" class="form-control border-1 border-dark" style="font-size: 14px;" name="apellido_usuario" placeholder="Apellido">
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-text border-1 border-dark">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <input type="email" class="form-control border-1 border-dark" style="font-size: 14px;" name="email_usuario" placeholder="Email">
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-text border-1 border-dark">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input type="password" class="form-control border-1 border-dark" style="font-size: 14px;" name="contraseña_usuario" placeholder="Contraseña">
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-text border-1 border-dark">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input type="password" class="form-control border-1 border-dark" style="font-size: 14px;" name="repetir_contraseña_usuario" placeholder="Repetir contraseña">
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-text border-1 border-dark">
                            <i class="fa-solid fa-child"></i>
                        </div>
                        <input type="text" class="form-control border-1 border-dark" style="font-size: 14px;" name="hijo1" placeholder="Nombre completo del primer hijo">
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-text border-1 border-dark">
                            <i class="fa-solid fa-child"></i>
                        </div>
                        <input type="text" class="form-control border-1 border-dark" style="font-size: 14px;" name="hijo2" placeholder="Nombre completo del segundo hijo (vacio en caso de no haber)">
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-text border-1 border-dark">
                            <i class="fa-solid fa-child"></i>
                        </div>
                        <input type="text" class="form-control border-1 border-dark" style="font-size: 14px;" name="hijo3" placeholder="Nombre completo del tercer hijo (vacio en caso de no haber)">
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-text border-1 border-dark">
                            <i class="fa-solid fa-hashtag"></i>
                        </div>
                        <input type="text" class="form-control border-1 border-dark" style="font-size: 14px;" name="userPonchadorID" placeholder="ID del usuario dentro del ponchador">
                    </div>

                    <button class="btn btn-outline-success shadow" name="public">Registrar al usuario</button>
                    <form action="" method="post">
                        <button type="submit" name="logout" class="btn btn-outline-danger shadow mt-3">Cerrar Sesión</button>
                    </form>

                    <?php
                        include "../backend/user_register_check.php";
                    ?>
                </form>
            </div>
        </div>
    </div>

    <script src="../../assets/bootstrap/bootstrap.min.js"></script>
</body>
</html>