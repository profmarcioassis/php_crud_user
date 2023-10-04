<?php
require_once('conexao.php');
//iniciar a sessão
if (!isset($_SESSION)) {
    session_start();
}
//recebe os dados do form login

if (isset($_POST['txtUser']) && strlen($_POST['txtUser'] > 0)) {
    $_SESSION['usuario'] = $conn->real_escape_string($_POST['txtUser']);
    $_SESSION['senha'] = md5($_POST['txtPassword']);
    //cria o comando sql para buscar e validar o usuário

    $sql_code = "SELECT * from tbuser where user = '$_SESSION[usuario]'";
    $sql_query = $conn->query($sql_code) or die($conn->error);
    $qtde = $sql_query->num_rows;
    if ($qtde > 0) {//se retornar algum usuário
        $dados = $sql_query->fetch_assoc();
        if ($_SESSION['senha'] != $dados['password']) {
            $_SESSION['erro'][] = "Senha inválida.";
            ?>
                <script>
                    window.history.back();
                    </script>
                <?php
            
        }else if ($dados['status'] == 'I') { //se usuário Inativo
            $_SESSION['erro'][] = "Usuário inativo. Entre em contato com o administrador ou aguarde a aprovação.";
            ?>
                <script>
                    window.history.back();
                    </script>
                <?php
            } else { //se senha correta e se status Ativo
                //preencher a session com os dados do usuário
                $_SESSION['iduser'] = $dados['iduser'];
                $_SESSION['usuario'] = $dados['user'];
                $_SESSION['nome'] = $dados['name'];
                $_SESSION['tipo'] = $dados['type'];
                header("location: selecionarUsuario.php");
            }
        }else {
        $_SESSION['erro'][] = "Usuário não encontrado. Verifique seus dados e tente novamente!";
        ?>
            <script>
                window.history.back();
            </script>
            <?php
        }
} else {
    $_SESSION['erro'][] = "Infome o usuário e a senha para acesso.";
    ?>
    <script>
        window.history.back();
    </script>
    <?php
}
?>