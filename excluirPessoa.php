<?php
//inlcui o arquivo de conexão
include_once('conexao.php');
//receber o código do registro do registro a excluir
if (isset($_GET["idPessoa"])) {
    //criar o comando de exclusão
    $sql = "DELETE FROM tbPessoa WHERE idPessoa = " . $_GET["idPessoa"];
    //$sql = "DELETE FROM tbPessoa WHERE idPessoa = 17";
    //executar comando
    if ($conn->query($sql) === TRUE) {
?>
        <script>
            alert("Registro excluído com sucesso.");
            window.location = "selecionarPessoa.php";
        </script>

<?php
    }
    else{ //caso de erro
        ?>
        <script>
            alert("Erro ao excluir o registro.");
            window.location = "selecionarPessoa.php";
        </script>
        <?php
    }
}

?>