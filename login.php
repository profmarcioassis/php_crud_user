<?php
    include_once("conexao.php");
    //iniciar a sessão
    session_start();
    //recebe os dados do form login
    $usuario = $conn->real_escape_string($_POST["txtUser"]);
    $senha = $_POST["txtPassword"];
    //cria o comando sql para buscar e validar o usuário
    $sql = "SELECT * from tbuser where user = '$usuario' and password = '" . md5($senha) . "'";
    //echo $sql;
    //executa o comando sql
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) { //verifica se retornou algum registro
        $dados_usuario = $resultado->fetch_assoc();
        //preencher a session com os dados do usuário
        $_SESSION["usuario"] = $dados_usuario["user"];
        $_SESSION["nome"] = $dados_usuario["name"]; 
        $_SESSION["tipo"] = $dados_usuario["type"];
        header("location: cadUsuario.php");
    }else{ //se houver algum erro no login
        $_SESSION["erro"] = "Erro";
        ?>
        <!--script>alert("Usuário ou senha inválidos.");</script-->
        <script>window.history.back();</script>
        <?php
    }
?>
