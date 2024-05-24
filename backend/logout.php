<?php
ob_start(); // Iniciar el almacenamiento en búfer de salida

// Verificar si se hizo clic en el botón de cierre de sesión
if (isset($_POST['logout'])) {
    // Destruir la sesión
    session_start();
    $_SESSION = array();
    session_destroy();

    // Borrar las cookies
    if (isset($_COOKIE['user_session'])) {
        setcookie('user_session', '', time() - 3600, '/');
        setcookie('adminChecker', '', time() - 3600, '/');
    }

    // Redirigir al login
    header("Location: ../src/login.php");
    exit();
}

ob_end_flush(); // Enviar la salida del búfer y apagar el almacenamiento en búfer
?>
