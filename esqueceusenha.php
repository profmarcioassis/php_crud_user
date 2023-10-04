<?php
include_once("conexao.php");
if (isset($_POST['txtEmail'])) {
    $msg = array();
    $email = $conn->real_escape_string($_POST['txtEmail']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg[] = "E-mail informado é inválido. ";
    } else {
        $sql_code = "SELECT * from tbuser where email = '$email'";
        //echo $sql_code;
        $sql_query = $conn->query($sql_code) or die($conn->error);
        $qtde = $sql_query->num_rows;

        if ($qtde == 0) {
            $msg[] = "E-mail informado não existe no banco de dados.";
        }

        if (count($msg) == 0 && $qtde > 0) {
            $dados = $sql_query->fetch_assoc(); 
            $novaSenha = substr(md5(time()), 0, 6);
            $novaSenhaCriptografada = md5(md5($novaSenha));
            $assunto = "Nova senha de acesso";
            $mensagem = "Olá <b>". $dados['name']. "</b>!<br><br>";
            $mensagem .= "Segue a sua nova senha de acesso: $novaSenha";
            $mensagem .= "<br><br>Obrigado";
            echo $mensagem;
            $headers = "From: assismiranda@gmail.com";
            //if (true) {
            if (mail($email, $assunto, $mensagem, $headers)) {
                $sql = "UPDATE tbuser 
                    SET password = '$novaSenhaCriptografada'
                    WHERE email = '$email'";
                $sql_query = $conn->query($sql) or die($conn->error);
                if ($sql_query) {
                    $msg[] = "Uma nova senha foi enviada ao seu e-mail.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <h2 class="text-center mt-5">Recuperar senha</h2>

    <?php
    if (isset($msg) && $msg != '') {
    ?>
        <div id="msg" class="text-center alert-warning p-md-3">
            <?php
            foreach ($msg as $value) {
                echo $value;
            }
            ?>
        </div>
        <script>
            document.getElementById('txtUser').select();
        </script>
    <?php
        //deleta o valor da session erro
        $msg = '';
    }
    ?>
    <div class="container">
        <form action="" method="post" name="frmRecuperarSenha">
            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
                <label class="form-label" for="txtEmail">E-mail</label>
                <input type="text" id="txtEmail" name="txtEmail" class="form-control" autofocus required placeholder="Informe o e-mail" />
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $('#msg').fadeOut(1500);
            }, 2000);
        });
    </script>

</body>

</html>