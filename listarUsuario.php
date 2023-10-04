<?php
include_once("conexao.php");
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user'])) { //SE EXISTIR AUTENTICAÇÃO
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            //Função para quando digitar algo
            $('document').ready(function() {
                $('#buscar').keyup(function() {//Quando usuário digitar
                    $.post('pesquisarUsuario.php', { //necessário indicar qual aquivo fará a busca dos dados
                            busca: $('#buscar').val()
                        },
                        function(data) {
                            $('#conteudopesquisa').show();
                            $('#conteudopesquisa').empty().html(data);
                        }
                    );
                });
            });

            //Função para exibir quando o usuário clicar no botão de Pesquisar ou quando á página recarregar
            $('document').ready(function() {
                $.post('pesquisarUsuario.php', {//necessário indicar qual aquivo fará a busca dos dados
                        busca: $('#buscar').val()
                    },
                    function(data) {
                        $('#conteudopesquisa').show();
                        $('#conteudopesquisa').empty().html(data);
                    }
                );
            });

            function apagar(id, desc) {
                if (window.confirm("Deseja realmente apagar este registro:\n" + id + " - " + desc + "\n\n???")) {
                    window.location = 'excluirUsuario.php?idUsuario=' + id;
                }
            }
        </script>
        <style>
            a, p{
                font-size: medium;
            }
        </style>
    </head>

    <body style="margin: 10px 10px 10px 10px;">
        <div id="tudo">
            <div id="cadastro">
                <?php
                if ($_SESSION['tipo'] == 'A') {
                ?>
                    <a href="novoProduto.php">Cadastrar Produto</a><br />
                    <a href="novoUsuario.php">Cadastrar Usuário</a><br />
                    <a href="novoCat.php">Cadastrar Categoria</a><br />
                <?php
                }
                ?>
                <br />
                <div id="main">
                    <div id="busca">
                        <form>
                            <h3>Pesquisar usuário</h3>
                            <input type="text" id="buscar" value="" size="50" class="form-control" style="width: 50%"><br><br>
                            <div id="conteudopesquisa">
                            </div>
                        </form>
                    </div> <!-- busca -->
                </div> <!-- main -->
            </div>
        </div>
    </body>

    </html>
<?php
}
?>