<?php
session_start();
$default_path = __DIR__ . '/';

include $default_path . '../DatabaseConnection/connection.php';
include $default_path . '../CookieCheck/CookieChecker.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_email = filter_input(INPUT_POST, 'account_email', FILTER_SANITIZE_EMAIL);
    $account_password = htmlspecialchars($_POST['account_password']);

    if (!empty($account_email) && !empty($account_password)) {

        $consult = $connect_db->prepare('SELECT isAdmin, nombre, apellido, ponchadorUserID, email, contraseña FROM student_info WHERE email=?');
        $consult->bind_param("s", $account_email);
        $consult->execute();

        $result = $consult->get_result();
        $resultRows = $result->num_rows;
        
        if ($resultRows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($account_password, $user['contraseña'])) {
                include 'tokenManager.php'; 
                $update_session_token->execute();

                $cookie_expire = time() + (86400 * 5); // 5 días

                $cookie_name = "session_token";
                $cookie_value = $session_token;
                setcookie($cookie_name, $cookie_value, $cookie_expire, '/', '', false, true);

                $_SESSION['logged_in_name'] = $user['nombre'];
                $_SESSION['logged_in_lastName'] = $user['apellido'];
                $_SESSION['logged_in_email'] = $user['email'];
                $_SESSION['logged_in_ID'] = $user['ponchadorUserID'];
                $_SESSION['logged_in_isAdmin'] = (int)$user['isAdmin']; // Asegúrate de que es un entero


                if ($_SESSION['logged_in_isAdmin'] === 1) {
                    header("Location: ../../../public/views/admin/registerUser.php");
                    exit();
                } else {
                    header("Location: ../../../public/views/selectSon.php");
                    exit();
                }

            } else {
                echo '<span class="login-alert">La contraseña no es correcta.</span>';
            }

        } elseif ($resultRows > 1) { // Debería ser > 1, no > 2
            echo '<span class="login-alert">Se encontraron múltiples usuarios con esa dirección de correo electrónico. Por favor, contacta al administrador.</span>';
        } else {
            echo '<span class="login-alert">El usuario no existe.</span>';
        }

    } else {
        echo '<span class="login-alert">Rellena los campos, por favor.</span>';
    }
    $consult->close(); // Mover close() después de fetch_assoc()
}
?>
