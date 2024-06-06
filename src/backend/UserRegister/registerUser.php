<?php
include '../../../src/backend/DatabaseConnection/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nombre_usuario'];
    $lastname = $_POST['apellido_usuario'];
    $email = $_POST['email_usuario'];
    $password = $_POST['contraseña_usuario'];
    $repeat_password = $_POST['repetir_contraseña_usuario'];
    $first_son = $_POST['hijo1'];
    $second_son = $_POST['hijo2'];
    $third_son = $_POST['hijo3'];
    $ponchador_id = $_POST['ponchador_id'];

    $consult = $connect_db->prepare('SELECT * FROM student_info WHERE nombre=? AND apellido=? OR email=? OR ponchadorUserID=?');
    $consult->bind_param("sssi", $name, $lastname, $email, $ponchador_id);
    $consult->execute();

    $result = $consult->get_result();

    if ($result->num_rows > 0) {
        echo '<span class="">El nombre, apellido, email o ID del ponchador ya están registrados.</span>';
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash de la contraseña
        $sql = "INSERT INTO student_info (isAdmin, nombre, apellido, contraseña, email, hijo1, hijo2, hijo3, ponchadorUserID) VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?)";

        $insert = $connect_db->prepare($sql);
        $insert->bind_param("sssssssi", $name, $lastname, $hashed_password, $email, $first_son, $second_son, $third_son, $ponchador_id);
        
        if ($insert->execute()) {
            echo '<span>Registro exitoso.</span>';
        } else {
            echo "Error: " . $insert->error;
        }
        $insert->close();
    }
    $consult->close();
}
?>