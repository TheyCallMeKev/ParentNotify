<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_DB";

try {
    $connect_db = new mysqli($servername, $username, $password, $dbname);
    if ($connect_db->connect_error) {
        throw new Exception("Error de conexión a la base de datos: " . $connect_db->connect_error);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit();
}


?>  