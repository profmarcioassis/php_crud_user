<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pr-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Cadastro de Pessoa</title>

    <script>

        function dataMax() {
            let dataAtual = new Date(); //pega a data atual
            let dia = String(dataAtual.getDate()).padStart(2, '0'); //pega o dia
            let mes = String(dataAtual.getMonth() + 1).padStart(2, '0'); //pega o mês do ano (0-11)
            let ano = dataAtual.getFullYear(); //pega o ano
            let data = ano + "-" + mes + "-" + dia; //formato 2021-12-13           
            document.getElementById("dataNasc").max = data; //altera o atributo max da input date
        }
    </script>


</head>

<body style="margin: 20px;" onload="dataMax();">
    <?php
    //verifica se a sessão foi iniciada
    if (isset($_SESSION["usuario"])) {
        include_once("menu.php");
        //verifica se o usuário é do tipo admin
        if ($_SESSION["tipo"] == 'A') {
    ?>
            <h2 class="text-center mb-1 mt-2">CADASTRO DE PESSOA</h2>
            <hr>
            <form action="inserirPessoa.php" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtNome">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txtNome" required placeholder="Digite o nome" autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtSobreNome">Sobrenome</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="txtSobreNome" required placeholder="Digite o sobrenome">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 font-weight-bold col-form-label text-right" for="dataNasc">Data de Nascimento</label>
                    <div class="col-sm-2">
                        <input class="form-control" type="date" name="dataNasc" id="dataNasc" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 font-weight-bold col-form-label text-right" for="ddlEstCivil">Estado Civil</label>
                    <div class="col-sm-2">
                        <select class="form-control" name="ddlEstCivil" id="ddlEstCivil">
                            <?php
                            //incluir o arquivo de conexão
                            include_once('conexao.php');

                            //buscar dados do dropdown no BD (tbestcivil)
                            //criar o comando sql
                            $sql = "SELECT idEstCivil, estadoCivil
                        FROM tbestcivil
                        ORDER BY estadoCivil";
                            //executa o comando sql
                            $estadocivil = $conn->query($sql);

                            while ($rowEstCivil = $estadocivil->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $rowEstCivil["idEstCivil"]; ?>"><?php echo $rowEstCivil["estadoCivil"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 font-weight-bold col-form-label text-right" for="radioSexo">Sexo</label>
                    <div class="col-sm-10">
                        <input class="radio-inline" type="radio" name="radioSexo" value="Feminino">Feminino
                        <input class="radio-inline" type="radio" name="radioSexo" value="Masculino">Masculino
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2"></label>

                    <div class="col-sm-10">
                        <input class="btn btn-primary " type="submit" value="Cadastrar">
                        <input class="btn btn-warning" type="reset" value="Limpar">
                    </div>
                </div>
            </form>

        <?php
        } else {
        ?>
            <div class="alert alert-warning">
                <p>Usuário não autorizado!</p>
                <p>Entre em contato com o administrador do sistema.</p>
            </div>

        <?php
        }
    } else {
        ?>
        <div class="alert alert-warning">
            <p>Usuário não autenticado!</p>
            <a href="index.php">Se identifique aqui</a>
        </div>
    <?php } ?>
</body>

</html>