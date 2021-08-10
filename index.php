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
</head>

<body style="padding-top: 20px;">
    <form action="login.php" method="post">
        <div style="text-align: center; margin-top: 30px;">
            <label class="" for="user">Usuário:</label>
            <input name="txtUser" id="user" type="text" maxlength="20" value="" style="width: 30%;" required autofocus />
            <br><br>
            <label for="password">Senha:</label>
            <input type="password" name="txtPassword" id="password" style="width: 30%;" required /><br>
            <br>
            <?php
            //verifica se foi inciada a session erro
            if (isset($_SESSION["erro"])) {
                if ($_SESSION["erro"] == "Erro") { //verifica o valor da session
            ?>
                    <script>document.getElementById('txtUser').focus();</script>
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
            <input type="submit" value="Login" />
        </div>
    </form>
</body>
</html>