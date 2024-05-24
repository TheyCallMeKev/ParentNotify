<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParentNotify</title>

    <link rel="stylesheet" href="../src/css/login.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    
</head>
<body>

    <div class="container py-2">
        <div class="row">
            <div class="col-7 d-none d-lg-block">
                <img src="../assets/Libro.png" alt="Libro_IMG" class="" style="width: 40vh;">
            </div>

            <div class="col">
                <form action="" method="post">
                    <div class="mb-2">
                        <label for="nombre_estudiante" class="form-label">E-mail</label>
                        <input type="text" class="form-control" name="userEmail">
                    </div>

                    <div class="mb-2">
                        <label for="cuenta_contraseña" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="userPassword">
                    </div>

                    <button type="submit" class="btn btn-success p-3 mt-2" name="submit_btn">Ingresar</button>

                    <?php
                        include '../backend/login_check.php';
                    ?>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>