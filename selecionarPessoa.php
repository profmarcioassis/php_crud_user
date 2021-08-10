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
        $(document).ready(function(){
            $("#form-pesquisa").submit(function(evento){
                evento.preventDefault();
                var pesquisa = $("#pesquisa").val();
                
                var dados = {
                    pesquisa : pesquisa
                }
                
                $.post('buscaPessoa.php', dados, function(retorna){
                    $(".resultados").html(retorna);
                });
                
            });

            // $("#pesquisa").keyup(function(evento){
            //     evento.preventDefault();
            //     var pesquisa = $("#pesquisa").val();
                
            //     var dados = {
            //         pesquisa : pesquisa
            //     }
                
            //     $.post('buscaPessoa.php', dados, function(retorna){
            //         $(".resultados").html(retorna);
            //     });
            // });
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

<body style="margin: 20px;">
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