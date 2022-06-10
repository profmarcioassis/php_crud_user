<?php

include_once('conexao.php');

session_start();

if (isset($_SESSION["usuario"])) {
    //receber os dados do form
    if (isset($_POST['txtNome'])) {
        $nome = $_POST["txtNome"];
        $sobrenome = $_POST["txtSobreNome"];
        $datanasc = $_POST["dataNasc"];
        $estadocivil = $_POST["ddlEstCivil"];
        $sexo = $_POST["radioSexo"];
        //criar o comando update
        $sql = "UPDATE tbPessoa
            SET nomePessoa = '$nome',
            sobrenomePessoa = '$sobrenome', 
            dataNasc = '$datanasc',    
            idEstCivil = $estadocivil,
            Sexo = '$sexo'
            WHERE idPessoa = " . $_GET['idPessoa'];
        //echo $sql;
        //executar o comando sql
        if ($conn->query($sql) === TRUE) {
?>
            <script>
                alert("Registro atualizado com sucesso!");
                window.location = "selecionarPessoa.php";
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

        <title>CRUD Pessoa</title>
        <style>
            body {
                margin: 10px;
            }
        </style>
    </head>

    <body>

        <?php include_once("menu.php"); ?>
        <h1 class="text-center mb-1 mt-2">EDITAR REGISTRO</h1>
        <?php
        if (isset($_GET['idPessoa'])) {
            $sql = "SELECT * from tbPessoa where idPessoa = " . $_GET['idPessoa'];
            //echo $sql;
            $consulta = $conn->query($sql);
            $pessoa = $consulta->fetch_assoc();
        }

        ?>
        <form method="post" action="editarPessoa.php?idPessoa=<?php echo $_GET['idPessoa'] ?>">
            <div class="form-group row">
                <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtNome">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="txtNome" required placeholder="Digite o nome" autofocus value="<?php echo $pessoa['nomePessoa'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtSobreNome">Sobrenome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="txtSobreNome" required placeholder="Digite o sobrenome" value="<?php echo $pessoa['sobrenomePessoa'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 font-weight-bold col-form-label text-right" for="dataNasc">Data de Nascimento</label>
                <div class="col-sm-2">
                    <input class="form-control" type="date" max="2021-12-13" name="dataNasc" required value="<?php echo $pessoa['dataNasc'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 font-weight-bold col-form-label text-right" for="ddlEstCivil">Estado Civil</label>
                <div class="col-sm-2">
                    <select class="form-control" name="ddlEstCivil" id="ddlEstCivil">
                        <?php
                        //buscar dados do dropdown no BD (tbestcivil)
                        //criar o comando sql
                        $sql = "SELECT idEstCivil, estadoCivil
                        FROM tbestcivil
                        ORDER BY estadoCivil";
                        //executa o comando sql
                        $estadocivil = $conn->query($sql);

                        while ($rowEstCivil = $estadocivil->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $rowEstCivil["idEstCivil"]; ?>" <?php echo ($rowEstCivil['idEstCivil'] == $pessoa['idEstCivil']) ? "selected" : "" ?>>
                                <?php echo $rowEstCivil["estadoCivil"]; ?>

                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 font-weight-bold col-form-label text-right" for="radioSexo">Sexo</label>
                <div class="col-sm-10">
                    <input type="radio" class="radio-inline" name="radioSexo" value="Feminino" <?php echo ("Feminino" == $pessoa["Sexo"]) ? "checked" : "" ?>>Feminino
                    <input type="radio" class="radio-inline" name="radioSexo" value="Masculino" <?php echo ("Masculino" == $pessoa["Sexo"]) ? "checked" : "" ?>>Masculino
                </div>
            </div>

            <div class="form-group row">
                    <label class="col-sm-2"></label>

                    <div class="col-sm-10">
                        <input class="btn btn-primary " type="submit" value="Salvar" onclick="validarSenha()">
                        <input class="btn btn-warning" type="reset" value="Limpar">
                    </div>
                </div>
        </form>

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