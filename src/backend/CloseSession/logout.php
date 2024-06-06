<!-- <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $_SESSION = array();
    session_destroy();

    setcookie('session_token', '', time() - (86400 * 5), '/');

    header("Location: ../../../public/views/login.php");
    exit();
}
?> -->