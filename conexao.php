<?php
    //parãmetros de conexão com BD
    define('HOST', 'localhost');//define o nome do servidor
    define('USER', 'root');; //nome do usuário
    define('PASSWORD', ''); //define a senha de acesso ao BD
    define('DB', 'bdpessoa'); //define o nome do Bando de Dados

    //criar um objeto de conexão
    $conn = new mysqli(HOST, USER, PASSWORD, DB);

    //checar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
?>