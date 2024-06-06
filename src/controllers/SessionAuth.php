<?php
class SessionAuth
{
    public function check()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
    }
}