<?php
//inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

//recebe os dados vindos do formulário (ainda não coloquei input_filter)
$nome = $_POST["txtNome"];
$usuario = $_POST["txtUsuario"];
$email = $_POST["txtEmail"];
$senha = $_POST["txtSenha"];
$tipo = 'O';
$obsUsuario = $_POST["txtObs"];
$status = 'A';

//define o sql de inserção
$SQL = "INSERT INTO tbuser (name, user, email, password, type, status, obsuser )";
$SQL .= " VALUES('$nome', '$usuario','$email', '" . md5($senha) . "', '$tipo', '$status', '$obsUsuario')";

//echo $SQL;

try {
    $conn->query($SQL);
    echo "<script>alert('Registro inserido com sucesso.');</script>";
    echo "<script>window.location = 'index.php';</script>";
} catch (\Throwable $th) {
    echo '<script>alert("Erro ao inserir o registro: ' . $conn->error . '");</script>';
    echo "<script>window.history.back();</script>";
}
/*
// se a consulta foi realizada com sucesso
if ($conn->query($SQL) === TRUE) {
    echo "<script>alert('Registro inserido com sucesso.');</script>";
    echo "<script>window.location = 'index.php';</script>";
} else {
    echo '<script>alert("Erro ao inserir o registro: ' . $conn->error . '");</script>';
    echo '<script>alert("Erro ao inserir o registro: ' . $conn->error . '");</script>';
    //echo $con->error;
    //volta a página mantendo o histórico do usuário
    echo "<script>window.history.back();</script>";
}*/

?>
