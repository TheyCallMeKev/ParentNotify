<?php
session_start();

// Verificar si la cookie de sesión existe
if (isset($_COOKIE['user_session'])) {
    $_SESSION['user'] = $_COOKIE['user_session'];
    // Redirigir según el rol guardado en la cookie
    if ($_COOKIE['adminChecker'] == 1) {
        header("Location: ../admin/register.php");
        exit();
    } else {
        header("Location: ./select.php");
        exit();
    }
}

$connect_db = mysqli_connect("localhost", "root", "", "student_DB");

if ($connect_db->connect_error) {
    die("Conexión fallida: " . $connect_db->connect_error);
}

if (isset($_POST['submit_btn'])) {
    $account_email = $_POST['userEmail'];
    // Asumiendo que recibes la contraseña en texto plano desde el formulario
    $account_password = $_POST['userPassword'];

    if (!empty($account_email) && !empty($account_password)) {

        // Preparar la consulta para obtener el hash de la contraseña
        $consult = $connect_db->prepare('SELECT isAdmin, nombre, contraseña FROM student_info WHERE email=?');
        $consult->bind_param("s", $account_email);
        $consult->execute();

        $resultado = $consult->get_result();
        if ($fila = $resultado->fetch_assoc()) {
            // Verificar si la contraseña coincide con el hash almacenado
            if (password_verify($account_password, $fila['contraseña'])) {

                setcookie('user_session', $account_email, time() + (86400 * 30), "/"); // 86400 = 1 día
                setcookie('adminChecker', $fila['isAdmin'], time() + (86400 * 30), "/");

                // La contraseña es correcta, proceder con el inicio de sesión
                $_SESSION['user'] = $account_email;
                $_SESSION['adminChecker'] = $fila['isAdmin'];

                if ($fila['isAdmin'] == 1) {
                    header("Location: ../admin/register.php");
                    exit();
                } else {
                    header("Location: ./select.php");
                    exit();
                }
            } else {
                echo '<span class="text-center text-danger">La contraseña no es correcta.</span>';
            }
        } else {
            echo '<span class="text-center text-danger">El usuario no existe.</span>';
        }
    } else {
        echo '<span class="text-center text-danger">Rellena los campos, por favor.</span>';
    }
}
?>
