<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <title>Registrar usuário</title>

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

<body style="margin: 20px;">
    <h2 class="text-center mb-1 mt-2">Informe seus dados</h2>
    <hr>
    <form name="frmCadUsuario" method="POST" action="inserirNovoUsuario.php">
        <div class="form-group row">
            <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtNome">Nome: </label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="txtNome" id="txtNome" size="80" required placeholder="Informe o nome" autofocus />
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtUsuario">Usuário: </label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="txtUsuario" id="txtUsuario" size="80" required placeholder="Informe o usuário" />
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtEmail">Email: </label>
            <div class="col-sm-10">
                <input class="form-control" type="email" name="txtEmail" id="txtEmail" size="80" required placeholder="Informe o Email" />
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
            <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtObs">Observação: </label>
            <div class="col-sm-10">
                <textarea class="form-control" name="txtObs" id="txtObs" rows="5" cols="60" placeholder="Observação"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2"></label>

            <div class="col-sm-10">
                <input class="btn btn-primary " type="submit" value="Cadastrar" onclick="validarSenha()">
                <input class="btn btn-warning" type="reset" value="Cancelar">
            </div>
        </div>
    </form>
    </div>
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