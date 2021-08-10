<?php

include_once('conexao.php');

session_start();

if (isset($_SESSION["usuario"])) {
    //receber os dados do form
    if (isset($_POST['txtNome'])) {
        $nome = $_POST["txtNome"];
        $sobrenome = $_POST["txtSobreNome"];
        $idade = $_POST["txtIdade"];
        $estadocivil = $_POST["ddlEstCivil"];
        $sexo = $_POST["radioSexo"];
        //criar o comando update
        $sql = "UPDATE tbPessoa
            SET nomePessoa = '$nome',
            sobrenomePessoa = '$sobrenome',     
            idadePessoa = $idade,
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <title>CRUD Pessoa</title>
    </head>

    <body>
   
        <?php include_once("menu.php"); ?>

        <h1>EDITAR REGISTRO</h1>

        <?php
        if (isset($_GET['idPessoa'])) {
            $sql = "SELECT * from tbPessoa where idPessoa = " . $_GET['idPessoa'];
            //echo $sql;
            $consulta = $conn->query($sql);
            $pessoa = $consulta->fetch_assoc();
        }

        ?>
        <form method="post" action="editarPessoa.php?idPessoa=<?php echo $_GET['idPessoa'] ?>">
            <label for="txtNome">Nome</label>
            <input type="text" name="txtNome" required placeholder="Digite o nome" autofocus value="<?php echo $pessoa['nomePessoa'] ?>">
            <br><br>
            <label for="txtSobreNome">Sobrenome</label>
            <input type="text" name="txtSobreNome" required placeholder="Digite o sobrenome" value="<?php echo $pessoa['sobrenomePessoa'] ?>">
            <br><br>
            <label for="txtIdade">Idade</label>
            <input type="number" min="0" name="txtIdade" required placeholder="Digite a idade" value="<?php echo $pessoa['idadePessoa'] ?>">
            <br><br>
            <label for="">Estado Civil</label>
            <select name="ddlEstCivil" id="ddlEstCivil">
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
            <br><br>
            <label for="radioSexo">Sexo</label>
            <input type="radio" name="radioSexo" value="Feminino" <?php echo ("Feminino" == $pessoa["Sexo"]) ? "checked" : "" ?>>Feminino
            <input type="radio" name="radioSexo" value="Masculino" <?php echo ("Masculino" == $pessoa["Sexo"]) ? "checked" : "" ?>>Masculino
            <br><br>
            <input type="submit" name="btnSalvar" value="Salvar">
            <input type="reset" name="btnCancelar" value="Cancelar">
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