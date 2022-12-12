<?php
include 'conexao.php';

//echo $_GET['iduser'];
if(is_numeric($_GET["iduser"])){
    $SQL = "DELETE FROM tbuser WHERE iduser = ".$_GET["iduser"];
    //echo $SQL;
    if ($conn->query($SQL) === TRUE) {
        echo "<script>alert('Registro excluído com sucesso!');</script>";
        echo "<script>window.location = 'selecionarUsuario.php';</script>";
    }
    else{
    	echo "<script>('Erro: '". $con->error."');</script>";
        echo "<script>window.location = 'selecionarUsuario.php';</script>";	
    }
}
?>
