<?php
$connect_db = mysqli_connect("localhost", "root", "", "student_DB");

if ($connect_db->connect_error) {
    die("Conexión fallida: " . $connect_db->connect_error);
}

if (isset($_POST['public'])) {
    $name = $_POST['nombre_usuario'];
    $lastname = $_POST['apellido_usuario'];
    $email = $_POST['email_usuario'];
    $password = $_POST['contraseña_usuario'];
    $repeat_password = $_POST['repetir_contraseña_usuario'];
    $first_son = $_POST['hijo1'];
    $second_son = $_POST['hijo2'];
    $third_son = $_POST['hijo3'];

    if (!empty($name) && !empty($lastname) && !empty($email) && !empty($password) && $repeat_password == $password && !empty($first_son)) {
        // Modifica la consulta para buscar por nombre, apellido y email
        $consult = $connect_db->prepare('SELECT * FROM student_info WHERE nombre=? AND apellido=? OR email=?');
        $consult->bind_param("sss", $name, $lastname, $email);
        $consult->execute();

        $resultado = $consult->get_result();

        if($resultado->num_rows > 0) {
            echo '<span class="text-danger text-center">El nombre, apellido o email ya están registrados.</span>';
        } else {
            // Asegúrate de escapar correctamente las variables antes de insertarlas en la base de datos
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash de la contraseña
            $sql = "INSERT INTO student_info (isAdmin, nombre, apellido, contraseña, email, hijo1, hijo2, hijo3) VALUES (0, ?, ?, ?, ?, ?, ?, ?)";

            $insert = $connect_db->prepare($sql);
            $insert->bind_param("sssssss", $name, $lastname, $hashed_password, $email, $first_son, $second_son, $third_son);
            if ($insert->execute()) {
                echo '<span class="text-success text-center">Registro exitoso.</span>';
            } else {
                echo "Error: " . $insert->error;
            }
            $insert->close();
        }
        $consult->close();
    } else {
        echo '<div class="alert alert-danger">Rellene todos los datos.</div>';
    }
}
?>
