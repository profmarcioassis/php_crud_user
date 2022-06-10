<!-- <script>
    $(document).ready(function() {
        $(".nav-item").click(function(event) {
            event.preventDefault();
            $(this).addClass("active").siblings().removeClass("active");
        });
    });
</script> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<div class="align-middle" style="height: 50px; width: 100%; margin-top: 10px; padding-right: 10px; background-color: silver; text-align: right;">
    Bem-vindo(a): <b> <?php echo $_SESSION["nome"]; ?></b>
    <br><a href="sair.php" title="Logout" style="text-decoration: none;">Sair <i class="fa fa-sign-out"></i></a>
</div>

<nav class="nav navbar-expand-lg bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cadastros</a>
            <div class="dropdown-menu">
                <?php
                //verifica se o usuário é do tipo administrador
                if ($_SESSION["tipo"] == 'A') {
                ?>
                    <a class="dropdown-item" href="cadPessoa.php">Cadastrar Pessoa</a>
                    <a class="dropdown-item" href="cadUsuario.php">Cadastrar Usuário</a>
                <?php } ?>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="selecionarPessoa.php">Listar Pessoas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="selecionarUsuario.php">Listar Usuários</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="grafico_Genero.php">Pessoas por Gênero</a><br />
        </li>
    </ul>
</nav>