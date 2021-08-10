<div style="height: 50px; width: 100%; margin-top: 10px; background-color: silver; text-align: right;">
    Bem-vindo(a): <b> <?php echo $_SESSION["nome"]; ?></b>
    <br><a href="sair.php" title="Logout">Sair</i></a>
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
        <?php
        //verifica se o usuário é do tipo administrador
        if ($_SESSION["tipo"] == 'A') {
        ?>
            <li class="nav-item">
                <a class="nav-link" href="cadPessoa.php">Cadastrar Pessoa</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="cadUsuario.php">Cadastrar Usuário</a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" href="selecionarPessoa.php">Listar Pessoas</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="grafico_Genero.php">Pessoas por Gênero</a><br />
        </li>

    </ul>
</nav>