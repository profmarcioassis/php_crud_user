<div class="align-middle" style="height: 50px; width: 100%; margin-top: 10px; padding-right: 10px; padding-top: 10px; background-color: silver; text-align: right;">
    Bem-vindo(a): <b> <?php echo $_SESSION["nome"]; ?></b>
    &nbsp;&nbsp;<a href="sair.php" title="Logout" style="text-decoration: none;">Sair <i class="fa fa-sign-out"></i></a>
</div>

<nav class="nav navbar-expand-lg bg-dark navbar-dark pt-3">
    <ul class="navbar-nav">
        <?php
        //verifica se o usuário é do tipo administrador
        if ($_SESSION["tipo"] == 'A') {
        ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cadastros</a>
                <div class="dropdown-menu">

                    <a class="dropdown-item" href="cadPessoa.php">Cadastrar Pessoa</a>
                    <a class="dropdown-item" href="cadUsuario.php">Cadastrar Usuário</a>
                    <!--qualquer coisa-->

                </div>
            </li>
        <?php } ?>

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

