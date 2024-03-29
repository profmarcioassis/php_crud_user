<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

//inclui o arquivo de conexão
include_once("conexao.php");

if (isset($_POST['txtEmail'])) {

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '86eb807dc63e39';
        $mail->Password = '**************';

        $msg = array();
        $enviou = false;
        $email = $conn->real_escape_string($_POST['txtEmail']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg[] = "E-mail informado é inválido. ";
        } else {
            $sql_code = "SELECT * from tbuser where email = '$email'";
            $sql_query = $conn->query($sql_code) or die($conn->error);
            $qtde = $sql_query->num_rows;

            if ($qtde == 0) {
                $msg[] = "E-mail informado não existe no banco de dados.";
            }

            if (count($msg) == 0 && $qtde > 0) {
                $dados = $sql_query->fetch_assoc();
                $novaSenha = substr(md5(time()), 0, 6);
                $novaSenhaCriptografada = md5($novaSenha);
                //Recipients
                $mail->setFrom('profmarcio.web@gmail.com', 'Prof. Márcio Assis');
                $mail->addAddress($email, $dados['name']);     //Add a recipient

                //Content
                $assunto = "Nova senha de acesso";
                $mensagem = "Olá <b>" . $dados['name'] . "</b>!<br><br>";
                $mensagem .= "Segue a sua nova senha de acesso: $novaSenha";
                $mensagem .= "<br><br>Obrigado!<br>";
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $assunto;
                $mail->Body    = $mensagem;
                $mail->send();

                if ($mail->send()) {
                    $sql = "UPDATE tbuser 
                        SET password = '$novaSenhaCriptografada'
                        WHERE email = '$email'";
                    $sql_query = $conn->query($sql) or die($conn->error);
                    if ($sql_query) {
                        $msg[] = "Uma nova senha foi enviada ao seu e-mail.<br>Efetue o login e troque a senha!";
                        $enviou = true;
                    }
                }
            }
        }
    } catch (Exception $e) {
        $msg[] = "Erro ao enviar o e-mail. Erro PHPMailer: {$mail->ErrorInfo}";
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
    if (isset($msg)) {
    ?>
        <div id="msg" class="text-center alert-warning p-md-3">
            <?php
            foreach ($msg as $value) {
                echo $value;
            }


            ?>
        </div>
        <?php
        $msg = array();
        if ($enviou == true) {
        ?>
        <script>
            setTimeout(function() {
                window.close(); //fecha a janela depois de 6 segundos
            }, 6000);
        </script>";
    <?php
        }
}
    ?>
    <div class="container">
        <form action="" method="post" name="frmRecuperarSenha">
            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
                <label class="form-label" for="txtEmail">E-mail</label>
                <input type="text" id="txtEmail" name="txtEmail" class="form-control" autofocus required placeholder="Informe o e-mail" />
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-4">Enviar</button>
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $('#msg').fadeOut(1500);
            }, 6000);
        });
    </script>
</body>

</html>