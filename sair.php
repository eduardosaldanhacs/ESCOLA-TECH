<?php
    require_once("templates/header.php");
    $_SESSION['token'] = '';
    
    $message = new Message($BASE_URL);
    $message->enviarMessage("Logout efetuado com sucesso!.", "success", "login.php");
?>