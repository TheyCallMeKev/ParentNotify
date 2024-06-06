<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['currentSon'] = $_POST['selectSon'];

    header('Location: ../../../public/views/home.php');
}
?>