<?php
include_once("conexao.php");
session_start();

if (isset($_SESSION["usuario"])) {

    $pesquisa = $conn->real_escape_string($_POST['pesquisa']);
    $pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $qtd_result_pg = filter_input(INPUT_POST, 'qtd_result_pg', FILTER_SANITIZE_NUMBER_INT);

    //echo $qtd_result_pg;
    //calcula o inicio da visualização
    $inicio = ($pagina * $qtd_result_pg) - $qtd_result_pg;
    //echo $pagina;
    //comando sql para selecionar as pessoas cadastradas

    $sql =  "SELECT * 
                FROM tbuser 
                where user like '%$pesquisa%' 
                or name like '%$pesquisa%'
                order by iduser
                LIMIT $inicio, $qtd_result_pg";
    //echo $sql;
    //executar o comando sql
    $dadosUsuarios = $conn->query($sql);
    if ($dadosUsuarios->num_rows > 0) {
?>
        <br><br>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>User</th>
                <th>E-mail</th>
                <th>Tipo</th>
                <th>Obs</th>

                <?php
                if ($_SESSION["tipo"] == 'A') {
                ?>
                    <th>Editar</th>
                    <th>Excluir</th>
                <?php
                }
                ?>
            </tr>
            </thead>
            <tbody>

            <?php

            while ($exibir = $dadosUsuarios->fetch_assoc()) { //fetch_assoc() retorna cada linha da matriz
            ?>
                <tr>
                    <td><?php echo $exibir["iduser"] ?></td>
                    <td><?php echo $exibir["name"] ?> </td>
                    <td><?php echo $exibir["user"] ?> </td>
                    <td><?php echo $exibir["email"] ?> </td>
                    <td><?php echo $exibir["type"] ?> </td>
                    <td><?php echo $exibir["obsuser"] ?> </td>
                    <?php
                    if ($_SESSION["tipo"] == 'A') {
                    ?>

                        <td><a href="editarUsuario.php?idUser=<?php echo $exibir["iduser"] ?>" title="Editar registro"><i class="fa fa-edit"></i></a></td>

                        <td>
                            <a href="#" title="Excluir registro" onclick="confirmarExclusao('<?php echo $exibir["iduser"] ?>',
                        '<?php echo $exibir["name"] ?>',
                        '<?php echo $exibir["user"] ?>')"><i class="fa fa-trash"></i></a>
                        </td>

                    <?php
                    }
                    ?>
                </tr>

            <?php
            }

            ?>
            </tbody>
        </table>
<?php

        //criando os links de paginação
        //conta quantos registros tem na tabela de pessoa
        $sql_qtd_registros = "SELECT COUNT(iduser) as num_registros
                FROM tbuser 
                where name like '%$pesquisa%' 
                or user like '%$pesquisa%'";

        $result_registros = $conn->query($sql_qtd_registros);
        $qtd_registros = $result_registros->fetch_assoc();

        //echo $qtd_registros["num_registros"];

        //quantidade de página
        //a função ceil() pega o número maior
        $qtd_paginas = ceil($qtd_registros["num_registros"] / $qtd_result_pg);

        //limitar a quantidade de links
        $max_links = 2;

        //echo "<br>$qtd_paginas<br>";
        //link para a primeira página
        echo "<nav aria-label='Paginação de registros'>";
        echo "<ul class='pagination'>";

        echo " <li class='page-item'><a href='#'  class='page-link' onclick='listar_registros(1, $qtd_result_pg)'>Primeira</a></li>";


        for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
            if ($pag_ant >= 1) {
                echo "<li class='page-item'><a href='#'  class='page-link' onclick='listar_registros($pag_ant, $qtd_result_pg)'> $pag_ant </a></li>";
            }
        }

        echo "<li class='page-link text-dark'> $pagina </li> "; //escreve a página atual

        for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
            if ($pag_dep <= $qtd_paginas) {
                echo "<li class='page-item'><a href='#'  class='page-link' onclick='listar_registros($pag_dep, $qtd_result_pg)'> $pag_dep </a></li>";
            }
        }

        //link para a última página
        echo "<li class='page-item'><a href='#'  class='page-link' onclick='listar_registros($qtd_paginas, $qtd_result_pg)'>Última</a></li>";
        echo "</ul></nav>";
    } else {
        echo "Nenhum registro cadastrado!";
    }
}

?>