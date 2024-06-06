<?php
include '../../src/backend/SonSelection/selectedSon.php';   
include '../../src/backend/PunchTimeCheck/PunchTime.php';   
include '../../src/backend/DatabaseConnection/connection.php';   

$first_name = $_SESSION['logged_in_name'];
$last_name = $_SESSION['logged_in_lastName'];
$selected_student = $_SESSION['currentSon'];


if (!isset($_COOKIE['session_token'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />


    <link rel="stylesheet" href="../css/generalStyles.css">
    <link rel="stylesheet" href="../css/loadingScreenStyles.css">
    <link rel="stylesheet" href="../css/homeStyles.css">
</head>
<body>
    <div id="loading_screen">
        <div class="configure-border1">
            <div class="configure-core"></div>
        </div>

        <span class="white-dot"></span>
    
        <div class="configure-border2">
            <div class="configure-core"></div>
        </div>

        <span id="final-text">Cargando...</span>
    </div>

    <header>
        <!-- later -->
    </header>
    <main>
        <div class="container">
            <?php
                echo "<h1>Bienvenido, $first_name $last_name</h1>";
                echo "<h2>Información de $selected_student</h2>";
            ?>
            <p class="text_info">Información del día de hoy</p>

            <div class="user_info">
                <p class="text_info">¿Llegó a la escuela?</p>
                <div class="info_block">
                    <?php
                        echo $circle_text;
                        echo "<span class='text_info'>$entry_punch_time</span>";
                    ?>
                </div>
            </div>

            <div class="user_info">
                <p class="text_info">¿Salió de la escuela?</p>
            </div>
        </div>
    </main>

    <script src="../js/loadingScreen.js"></script>
</body>
</html>