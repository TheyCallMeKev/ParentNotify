<?php
$default_path = __DIR__. '/';
include $default_path. '../../src/backend/DatabaseConnection/connection.php';
include $default_path. '../../src/backend/CloseSession/logout.php';
include '../../src/backend/SonSelection/selectedSon.php';

if (!isset($_COOKIE['session_token'])) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['currentSon'])) {
    header("Location: ./home.php");
    exit();
}

$consult = $connect_db->prepare('SELECT hijo1, hijo2, hijo3, ponchadorUserID FROM student_info WHERE email=?');
$consult->bind_param("s", $_SESSION['logged_in_email']);
$consult->execute();

$result = $consult->get_result();
$resultRows = $result->num_rows;

$user = $result->fetch_assoc();
$consult->close();

$hijos = array_filter([$user['hijo1'], $user['hijo2'], $user['hijo3']]); // Filtrar elementos vacíos

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccione al estudiante | ParentNotify</title>

    <link rel="stylesheet" href="../css/generalStyles.css">
    <link rel="stylesheet" href="../css/selectSonStyles.css">
</head>
<body>
    <div class="container">
        <h1>Seleccione al estudiante</h1>

        <div>
            <form action="../../src/backend/SonSelection/selectedSon.php" method="post">
                <?php foreach ($hijos as $hijo):?>
                    <input type="submit" name="selectSon" value="<?php echo htmlspecialchars($hijo);?>">
                <?php endforeach;?>
            </form>

            <hr>

            <form action="../../src/backend/CloseSession/logout.php" method="post">
                <input type="submit" value="Cerrar sesión">
            </form>
        </div>
    </div>
</body>
</html>