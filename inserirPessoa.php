<?php
    //incluir o arquivo de conexão
    include_once('conexao.php');

    //receber os dados que veio do form via POST
    $nome = $_POST["txtNome"];
    $sobrenome = $_POST["txtSobreNome"];
    $datanasc = $_POST["dataNasc"];
    $idestcivil = $_POST["ddlEstCivil"];
    $sexo = $_POST["radioSexo"];
        
    //criar o comando sql do insert
    $sql = "INSERT INTO tbpessoa (nomePessoa, sobrenomePessoa, dataNasc, idEstCivil, Sexo)
            VALUES ('$nome', '$sobrenome', '$datanasc', $idestcivil, '$sexo')";
    
    //echo $sql;

    //executar o comando sql
    if ($conn->query($sql) === TRUE) {
        ?>
        <script>
            alert("Registro salvo com sucesso!");
            window.location = "selecionarPessoa.php";
        </script>
        
        <?php
    }
    else{
        ?>
            <script>
                alert("Erro ao inserir o registro");
                window.history.back();
            </script>

        <?php
    }
    
?>