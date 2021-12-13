<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pessoa - LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $('#erro').fadeOut(1500);
            }, 4000);
        });
    </script>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 20px;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        
    </style>
</head>

<body>
    <h2 class="text-center">Formulário de login</h2>
    <form action="login.php" method="post">
        <div class="container">
            <label for="user">Usuário:</label>
            <input name="txtUser" id="txtUser" type="text" required autofocus>

            <label for="password">Senha:</label>
            <input type="password" name="txtPassword" id="password" required>
            <?php
            //verifica se foi inciada a session erro
            if (isset($_SESSION["erro"])) {
                if ($_SESSION["erro"] == "Erro") { //verifica o valor da session
            ?>
                    <script>
                        document.getElementById('txtUser').focus();
                    </script>
                    <div id="erro" class="text-center text-warning">
                        Usuário ou senha inválidos. Tente novamente.
                    </div>
            <?php
                    //deleta o valor da session erro
                    unset($_SESSION["erro"]);
                }
            }

            ?>
            <br>
            <input class="btn btn-primary" type="submit" value="Login">
            <input class="btn btn-warning" type="reset" value="Cancelar">
        </div>
    </form>
</body>

</html>