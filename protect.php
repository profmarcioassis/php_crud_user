<?php
    if (!function_exists('protect')) {
        function protect(){
            if (!isset($_SESSION)) {
                session_start();
            }

            if (!isset($_SESSION['usuario']) || !is_numeric($_SESSION['iduser'])) {
                $_SESSION['erro'][] = "Usuário não autenticado! Faça o login.";
                header("Location: index.php");
            }
        }

    }
?>