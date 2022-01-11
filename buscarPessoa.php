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
                FROM tbpessoa 
                where nomePessoa like '%$pesquisa%' 
                or sobrenomePessoa like '%$pesquisa%'
                order by idpessoa
                LIMIT $inicio, $qtd_result_pg";
    //echo $sql;
    //executar o comando sql
    $dadosPessoas = $conn->query($sql);
    if ($dadosPessoas->num_rows > 0) {
?>
        <br><br>
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Data de Nascimento</th>
                <th>Estado Civil</th>
                <th>Sexo</th>
                <th>Editar</th>
                <?php
                if ($_SESSION["tipo"] == 'A') {
                ?>
                    <th>Excluir</th>
                <?php
                }
                ?>
            </tr>

            <?php

            while ($exibir = $dadosPessoas->fetch_assoc()) { //fetch_assoc() retorna cada linha da matriz
            ?>
                <tr>
                    <td><?php echo $exibir["idPessoa"] ?></td>
                    <td><?php echo $exibir["nomePessoa"] ?> </td>
                    <td><?php echo $exibir["sobrenomePessoa"] ?> </td>
                    <td><?php echo date("d/m/Y", strtotime($exibir["dataNasc"])) ?> </td>
                    <?php
                    //busca o estado civil de acordo com o código da tabela tbpessoa
                    $sqlEstCivil = "SELECT * FROM tbestcivil WHERE idEstCivil = " . $exibir["idEstCivil"];
                    $dadosEstCivil = $conn->query($sqlEstCivil);
                    $estCivil = $dadosEstCivil->fetch_assoc();
                    ?>
                    <td><?php echo $estCivil["estadoCivil"] ?> </td>
                    <td><?php echo $exibir["Sexo"] ?> </td>
                    <td><a href="editarPessoa.php?idPessoa=<?php echo $exibir["idPessoa"] ?>">Editar</a></td>
                    <?php
                    if ($_SESSION["tipo"] == 'A') {
                    ?>
                        <td>
                            <a href="#" onclick="confirmarExclusao('<?php echo $exibir["idPessoa"] ?>',
                        '<?php echo $exibir["nomePessoa"] ?>',
                        '<?php echo $exibir["sobrenomePessoa"] ?>')">Excluir</a>
                        </td>

                    <?php
                    }
                    ?>
                </tr>

            <?php
            }

            ?>
        </table>
<?php

        //criando os links de paginação
        //conta quantos registros tem na tabela de pessoa
        $sql_qtd_registros = "SELECT COUNT(idpessoa) as num_registros
                FROM tbpessoa 
                where nomePessoa like '%$pesquisa%' 
                or sobrenomePessoa like '%$pesquisa%'";

        //echo $sql_qtd_registros;

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

    
    }
     else {
        echo "Nenhum registro cadastrado!";
    }
}

?>
