<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParentNotify | Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/aa91c476b6.js" crossorigin="anonymous"></script>

    
</head>

<body style="height: 100dvh;">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
    * {
        font-family: 'Montserrat';
        font-weight: 650;
    }
</style>
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">ParentNotify</a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ParentNotify</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                                <form action="" method="post">
                                    <button type="submit" name="logout" class="m-0 p-0 border border-0">
                                        Cerrar sesión
                                    </button>
                                </form>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">Proximamente...</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">

        <?php
        // include '../src/select.php';

        if (isset($_GET['selectSon'])) {

            $sonSession = $_GET['selectSon'];
            $fatherName = $_GET['name'];
            $ID = $_GET['ponchadorID'];
            

            echo "<h1 class='text-center mt-3'>Bienvenido, $fatherName</h1>";
        }
        ?>
        <h2 class="opacity-50 text-center" style="font-size: 20px">
            Información de <?php echo $sonSession ?>
        </h2>

        <div class="row d-flex justify-content-center mt-4">
            <div class="col-10 p-2 bg-dark rounded">
                <p class="text-center text-light">Información de hoy</p>

                <div class="col text-center bg-secondary">
                    <p class="text-light mb-2">¿Llegó a la escuela?</p>
                    <span><i class="fa-solid fa-circle-xmark fa-2x text-danger bg-dark border-dark rounded-circle"></i></span>

                    <p class="mb-0 text-light">Hora de llegada:</p>
                    <span class="text-light">
                    <?php 
                    include '../backend/user_info_check.php';

                    if ($conexion) {
                        $consulta = $conexion->prepare('SELECT punch_time FROM att_punches WHERE employee_id = ? ORDER BY punch_time DESC');
                        $consulta->bindValue(1, $ID, SQLITE3_INTEGER);
                        $resultado = $consulta->execute();

                        if ($fila = $resultado->fetchArray()) {
                            $ponche_hora = $fila['punch_time'];
                            echo $ponche_hora;
                        } else {
                            echo "No se encontraron registros.";
                        }
                        $resultado->finalize();
                    } else {
                        echo "Error al conectar a la base de datos SQLite.";
                    }
                    ?>

                    </span>
                </div>

                
                <div class="col mt-2 text-center bg-secondary">
                    <p class="text-light mb-2">¿Salió de la escuela?</p>
                    <span><i class="fa-solid fa-circle-xmark fa-2x text-danger bg-dark border-dark rounded-circle"></i></span>

                    <p class="mb-0 text-light">Hora de salida:</p>
                    <span class="text-light">
                        <?php 
                        include '../backend/user_info_check.php';

                        if ($conexion) {
                            $consulta = $conexion->prepare('SELECT punch_time FROM att_punches WHERE employee_id = ? AND workstate = ? ORDER BY punch_time DESC');
                            $consulta->bindValue(1, $ID, SQLITE3_INTEGER);
                            $resultado = $consulta->execute();

                            if ($fila = $resultado->fetchArray()) {
                                if ($fila['workstate'] == 1)
                                $ponche_hora = $fila['punch_time'];
                                echo $ponche_hora;
                            } else {
                                echo "No se encontraron registros.";
                            }
                            $resultado->finalize();
                        } else {
                            echo "Error al conectar a la base de datos SQLite.";
                        }
                        ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-4">
            <div class="col-10 p-2 bg-dark rounded">
                <p class="text-center text-light">Información semanal</p>

                <div class="col d-flex justify-content-center text-center bg-secondary">
                    <div class="p-3">
                        <span><i class="fa-solid fa-circle-xmark fa-2x text-danger bg-dark border-dark rounded-circle"></i></span>
                        <p>LUN</p>
                    </div>
                    <div class="p-3">
                        <span><i class="fa-solid fa-circle-xmark fa-2x text-danger bg-dark border-dark rounded-circle"></i></span>
                        <p>MAR</p>
                    </div>
                    <div class="p-3">
                        <span><i class="fa-solid fa-circle-xmark fa-2x text-danger bg-dark border-dark rounded-circle"></i></span>
                        <p>MIE</p>
                    </div>
                    <div class="p-3">
                        <span><i class="fa-solid fa-circle-xmark fa-2x text-danger bg-dark border-dark rounded-circle"></i></span>
                        <p>JUE</p>
                    </div>
                    <div class="p-3">
                        <span><i class="fa-solid fa-circle-xmark fa-2x text-danger bg-dark border-dark rounded-circle"></i></span>
                        <p>VIE</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>