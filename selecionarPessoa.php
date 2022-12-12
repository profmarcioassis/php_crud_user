<?php
//inclui o script de conexão
include_once('conexao.php');
//incia a session
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Lista de Pessoas</title>

    <script text="text/javascript">
        $(document).ready(function() { //executa assim que carrega a página
            //define as variáveis com a página atua
            var pagina = 1; // define a página atual
            var qtd_result_pg = 10; //define a quantidade de páginas por página
            
            listar_registros(pagina, qtd_result_pg); //chama a função listar_registros

            //chama a função assim que carrega a página
            $("#form-pesquisa").submit(function(evento) {
                evento.preventDefault();
                listar_registros(pagina, qtd_result_pg); //chama a função listar_registros
            });
        });

        //define a função listar_registross()
        function listar_registros(pagina, qtd_result_pg) {
            var pesquisa = $("#pesquisa").val();
            var dados = { //define o objeto com os dados a serem enviados
                pesquisa: pesquisa,
                pagina: pagina,
                qtd_result_pg: qtd_result_pg
            }

            $.post('buscarPessoa.php', dados, function(retorna) { //envia os dados via post
                $(".resultados").html(retorna); //define onde o resultado será exibido
            });
        }

        function confirmarExclusao(id, nm, sn) {
            if (window.confirm("Deseja realmente apagar o registro:\n" + id + " - " + nm + " " + sn)) {
                window.location = "excluirPessoa.php?idPessoa=" + id;
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
            <input type="submit" name="btnEnviar" id="btnEnviar" value="Pesquisar">
        </form>
        <div class="resultados">
            <!--Os dados da busca efetuada pelo aquivo buscarPessoa.php, serão exibidos aqui-->
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