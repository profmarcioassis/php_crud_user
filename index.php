<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pessoa - LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   

</head>

<body>
    <h2 class="text-center mt-5">Tela de Login</h2>
    <div class="container">
        <?php
        if (isset($_SESSION["erro"])) {
        ?>

            <div id="erro" class="text-center alert-warning p-md-3">
                <?php
                foreach ($_SESSION['erro'] as $erro) {
                    echo $erro;
                }
                ?>
            </div>
            <script>
                document.getElementById('txtUser').select();
            </script>
        <?php
            //deleta o valor da session erro
            unset($_SESSION["erro"]);
        }

        ?>
        <form action="login.php" method="post" name="formLogin">
            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
                <label class="form-label" for="txtUser">Usuário</label>
                <input type="text" id="txtUser" name="txtUser" class="form-control" autofocus required />

            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Senha</label>
                <input type="password" id="txtPassword" name="txtPassword" class="form-control" required />

            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>

            <!-- Register buttons -->
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">

                <!--
                <div class="col d-flex justify-content-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                            <label class="form-check-label" for="form2Example31"> Lembrar-me </label>
                        </div>
                    </div> -->

                <div class="col text-center">
                    <!-- Simple link -->
                    <a href="esqueceusenha.php" target="_blank">Esqueceu a senha?</a>
                </div>
            </div>
            <div class="text-center">
                <p>Ainda não está cadastrado? <a href="cadNovoUsuario.php">Registrar</a></p>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $('#erro').fadeOut(1500);
            }, 2000);
        });
    </script>
    
</body>

</html>