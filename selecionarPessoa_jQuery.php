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


    <title>Lista de Pessoas</title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

    <script text="text/javascript">
        $(document).ready(function() {
            //quando preferir a pesquisa digitando na caixa de texto
            //$("#pesquisa").keyup(function(e) {
            //PESQUISA DE FORMULÀRIO POR SUBMIT
            $("#form-pesquisa").submit(function(e) {
                //Cancela a ação padrao o formulário, impedindo que ele atualize a página
                e.preventDefault();

                //Recupera oque está sendo digitado no input de pesquisa
                var pesquisa = $("#pesquisa").val();

                //alert(pesquisa);

                //Se não for digitado nada, então ele mostra um alert
                //Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa e na propriedade campo o campo a ser pesquisado
                var dados = {
                    pesquisa: pesquisa
                }

                //Envia por AJAX pelo metodo post, a pequisa para o arquivo 'busca.php'
                //O paremetro 'retorna' é responsável por recuperar o que vem do arquivo 'busca.php' e exibir os resultados na tela
                $.post('buscarPessoa_jQuery.php', dados, function(retorna) {
                    $(".resultados").html(retorna);
                });

            });
        });
    </script>


    <script>
        function confirmarExclusao(id, nm, sn) {
            if (window.confirm("Deseja realmente apagar o registro:\n" + id + " - " + nm + " " + sn)) {
                window.location = "excluirPessoa.php?idPessoa=" + id;
            }
        }
    </script>
</head>

<body>
    <?php
    //verifica se foi iniciada a seção do usuário
    if (isset($_SESSION["usuario"])) {
    ?>
        <?php
        //inclui o script de boas-vindas e menu
        include_once("menu.php");
        ?>

        <h1>PESSOAS CADASTRADAS</h1>

        <form id="form-pesquisa" action="" method="post">
            <label for="pesquisa">Texto da pesquisa</label>
            <input type="text" name="pesquisa" id="pesquisa">
            <br>
            <input type="submit" name="enviar" value="Pesquisar">
        </form>

        <div class="resultados">
            <!--Os dados da busca efetuada pelo aquivo buscarPessoa.php, serão exibidos aqui-->
        </div>
        }else {
        ?>
        <div class="alert alert-warning">
            <p>Usuário não autenticado!</p>
            <a href="index.php">Se identifique aqui</a>
        </div>
    <?php } ?>
</body>

</html>