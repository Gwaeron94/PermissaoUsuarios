<?php
    session_start();
    require 'config.php';
    require 'class/usuarios.class.php';
    require 'class/documentos.class.php';

    if(!isset($_SESSION['logado'])) {
        header("Location: login.php");
        exit;
    }

    $usuarios = new Usuarios($pdo);
    $usuarios->setUsuarios($_SESSION['logado']);

    if($usuarios->temPermissao("SECRET") == false) {
        header("Location: index.php");
        exit;
    }
?>
<meta charset="utf-8" />
<h1>Página Secreta</h1>