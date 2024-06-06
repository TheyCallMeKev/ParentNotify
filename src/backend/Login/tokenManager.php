<?php
function generateRandomToken($length = 32) {
    return bin2hex(random_bytes($length));
}

$session_token = generateRandomToken();
                
// Almacenar el token de sesión en la base de datos
$update_session_token = $connect_db->prepare('UPDATE student_info SET session_token = ? WHERE email = ?');
$update_session_token->bind_param("ss", $session_token, $account_email);
?>