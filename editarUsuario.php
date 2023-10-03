<?php

include_once('conexao.php');

session_start();

if (isset($_SESSION["usuario"])) {
    //receber os dados do form
    if (isset($_POST['txtNome'])) {
        $name = $_POST["txtNome"];
        $user = $_POST["txtUsuario"];
        $email = $_POST["txtEmail"];
        $password = $_POST["txtSenha"];
        $type = $_POST["radioUsuario"];
        $obsuser = $_POST["txtObs"];
        $status = $_POST["radioStatus"];

        //criar o comando update
        $sql = "UPDATE tbuser
            SET email = '$email',
            password = '" . md5($password) . "', 
            user = '$user',    
            name = '$name',
            obsuser = '$obsuser',
            status = '$status'
            WHERE iduser = " . $_GET['iduser'];
        //echo $sql;
        //executar o comando sql
        if ($conn->query($sql) === TRUE) {
?>
            <script>
                alert("Registro atualizado com sucesso!");
                window.location = "selecionarUsuario.php";
            </script>

        <?php
        } else {
        ?>
            <script>
                alert("Erro ao atualizar o registro");
                window.history.back();
            </script>

    <?php
        }
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <title>CRUD Usuario</title>
        <style>
            body {
                margin: 10px;
            }
        </style>
        <script>
            //função para confirmar senha
            function validarSenha() {
                //declara as variáveis e recebe os elementos
                var txtSenha = document.getElementById("txtSenha"),
                    txtConfirmaSenha = document.getElementById("txtConfirmaSenha");
                //compara as duas senhas
                if (txtSenha.value != txtConfirmaSenha.value) {
                    //emite o alerta para a caixa de texto
                    txtConfirmaSenha.setCustomValidity("Senhas diferentes!");
                    //alert (txtSenha.value + " - " + txtConfirmaSenha.value)
                    //retona false e não submete o form
                    return false;
                } else {
                    //limpa o alerta da caixa de texto
                    txtConfirmaSenha.setCustomValidity("");
                    //retorna true e submete o form
                    return true;
                }
            }
        </script>
    </head>

    <body>
        <?php include_once("menu.php"); ?>
        <h1 class="text-center mb-1 mt-2">EDITAR REGISTRO</h1>
        <?php
        if (isset($_GET['iduser'])) {
            $sql = "SELECT * from tbuser where iduser = " . $_GET['iduser'];
            //echo $sql;
            $consulta = $conn->query($sql);
            $dadosUser = $consulta->fetch_assoc();
        }

        ?>
        <form method="post" action="editarUsuario.php?iduser=<?php echo $_GET['iduser'] ?>">
            <div class="form-group row">
                <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtNome">Nome: </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="txtNome" id="txtNome" size="80" required placeholder="Informe o nome" value="<?php echo $dadosUser['name'] ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtUsuario">Usuário: </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="txtUsuario" id="txtUsuario" size="80" required placeholder="Informe o usuário" value="<?php echo $dadosUser['user'] ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtEmail">Email: </label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="txtEmail" id="txtEmail" size="80" required placeholder="Informe o Email" value="<?php echo $dadosUser['email'] ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtSenha">Senha: </label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" name="txtSenha" id="txtSenha" required placeholder="Informe a senha" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtConfirmaSenha">Confirme a Senha: </label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" name="txtConfirmaSenha" id="txtConfirmaSenha" size="80" required placeholder="Confirme a senha" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 font-weight-bold col-form-label text-right" for="radioUsuario">Tipo:</label>
                <div class="col-sm-10">
                    <input type="radio" name="radioUsuario" id="radioUsuario" value="A" <?php echo ("A" == $dadosUser["type"]) ? "checked" : "" ?>>Administrador
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="radioUsuario" id="radioUsuario" value="O" <?php echo ("O" == $dadosUser["type"]) ? "checked" : "" ?>>Outro
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 font-weight-bold col-form-label text-right" for="radioStatus">Status:</label>
                <div class="col-sm-10">
                    <input type="radio" name="radioStatus" id="radioStatus" value="A" <?php echo ("A" == $dadosUser["status"]) ? "checked" : "" ?>>Ativo
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="radioStatus" id="radioStatus" value="I" <?php echo ("I" == $dadosUser["status"]) ? "checked" : "" ?>>Inativo
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtObs">Observação: </label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="txtObs" id="txtObs" rows="5" cols="60" placeholder="Observação"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                    <input class="btn btn-primary " type="submit" value="Cadastrar" onclick="validarSenha()">
                    <input class="btn btn-warning" type="reset" value="Cancelar" onclick="window.history.back();">
                </div>
            </div>
        </form>
        <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(function() {
                nicEditors.allTextAreas()
            }); // convert all text areas to rich text editor on that page

            bkLib.onDomLoaded(function() {
                new nicEditor().panelInstance('txtObs');
            }); // convert text area with id area1 to rich text editor.

            bkLib.onDomLoaded(function() {
                //new nicEditor({fullPanel : true}).panelInstance('txtObs');
            }); // convert text area with id area2 to rich text editor with full panel.
        </script>
    </body>

    </html>
<?php
} else {
    echo "Usuário não autenticado!";
?>
    <a href="index.php">Se identifique aqui</a>
<?php
}
?>