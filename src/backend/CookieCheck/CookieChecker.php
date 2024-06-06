<?php
// session_start();
$default_path = __DIR__. '/';
include $default_path. '../DatabaseConnection/connection.php';

if (isset($_COOKIE['session_token'])) {
    $session_token = $_COOKIE['session_token'];

    $consult = $connect_db->prepare('SELECT nombre FROM student_info WHERE session_token=?');
    $consult->bind_param("s", $session_token);
    $consult->execute();

    $result = $consult->get_result();
    $resultRows = $result->num_rows;
    
    $consult->close();

    if ($resultRows === 1 ) {
        $user = $result->fetch_assoc();

        if ($_COOKIE['isAdmin'] === 1) {
            header('Location: ../../public/views/admin/registerUser.php');
            exit();
        } else {
            header('Location: ../../public/views/selectSon.php');
            exit();
        }

    } else {

    }
}
?>