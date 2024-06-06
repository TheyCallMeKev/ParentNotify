<?php
// Iniciar la sesión
session_start();

// Asegúrate de que el usuario está logueado
if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirigir al login si no hay sesión
    exit();
}

$connect_db = mysqli_connect("localhost", "root", "", "student_DB");

if ($connect_db->connect_error) {
    die("Conexión fallida: " . $connect_db->connect_error);
}

// Obtener el email del usuario de la sesión
$user_email = $_SESSION['user'];

// Preparar la consulta para obtener los nombres de los hijos
$consult = $connect_db->prepare('SELECT hijo1, hijo2, hijo3, nombre, apellido, ponchadorUserID FROM student_info WHERE email=?');
$consult->bind_param("s", $user_email);
$consult->execute();

$resultado = $consult->get_result();
if ($fila = $resultado->fetch_assoc()) {
    $hijos = array_filter([$fila['hijo1'], $fila['hijo2'], $fila['hijo3']]); // Filtrar elementos vacíos
    $nombre = $fila['nombre'];
    $apellido = $fila['apellido'];
    $texto = "$nombre $apellido";
    $ponchadorID = $fila['ponchadorUserID'];
}
$consult->close();
?>

<!DOCTYPE html>
<html lang="en">
    d>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParentNotify | Select</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/aa91c476b6.js" crossorigin="anonymous"></script>
</head>

<body style="height: 100dvh" class="bg-light">
    
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row p-1 w-50 bg-secondary rounded text-center d-flex align-items-center flex-column">
            <h2 class="h2 opacity-75 bold text-light">Seleccione a su hijo/a</h2>
            <?php foreach ($hijos as $hijo): ?>
                <div class="col-11 m-1 p-0 rounded d-flex justify-content-center align-items-center">
                    <form action="../src/home.php" method="get" class="w-100">
                        <input type="hidden" name="name" value="<?php echo $nombre; ?>">
                        <input type="hidden" name="ponchadorID" value="<?php echo $ponchadorID; ?>">
                        <button type="submit" name="selectSon" value="<?php echo htmlspecialchars($hijo); ?>" class="btn bg-dark w-100">
                        <p class="m-2 fw-semibold text-light"><?php echo htmlspecialchars($hijo); ?></p>
                    </form>  
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
