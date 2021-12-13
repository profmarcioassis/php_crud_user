<?php
//inclui o script de conexão
include_once('conexao.php');
//incia a session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Lista de Usuários Cadastrados</title>

    <script text="text/javascript">
        var pagina = 1,
            qtd_result_pg = 5,
            origem = null;

        $(document).ready(function() {
            listar_usuario(pagina, qtd_result_pg);
        });

        function listar_usuario(pagina, qtd_result_pg) {
            var dados = {
                pesquisa: "",
                pagina: pagina,
                qtd_result_pg: qtd_result_pg
            }

            $.post('buscarUsuario.php', dados, function(retorna) {
                $(".resultados").html(retorna);
            });
        }

        function confirmarExclusao(id, nm, user) {
            if (window.confirm("Deseja realmente apagar o registro:\n" + id + " - " + nm + " " + user)) {
                window.location = "excluirUsuario.php?iduser=" + id;
            }
        }
    </script>
</head>

<body style="margin: 20px;">
    <?php
    //verifica se foi iniciada a seção do usuário
    if (isset($_SESSION["usuario"])) {
        include_once("menu.php");
    ?>

        <h2 class="text-center">PESSOAS CADASTRADAS</h2>
        <hr>
        <form id="form-pesquisa" action="" method="post">
            <label for="pesquisa">Texto da pesquisa</label>
            <input type="text" name="pesquisa" id="pesquisa">
            <br>
            <input type="submit" name="enviar" value="Pesquisar">
        </form>
        <div class="resultados">
            <!--Os dados da busca efetuada pelo aquivo buscaPessoa.php, serão exibidos aqui-->
        </div>

    <?php
    } else {
        echo "Usuário não autenticado!";
    ?>
        <a href="index.php">Se identifique aqui</a>
    <?php

    }

    ?>
</body>

</html>