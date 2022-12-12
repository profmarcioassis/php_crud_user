<?php
//inclui o script de conexão
include_once('conexao.php');
//incia a session
session_start();
    //verifica se foi iniciada a seção do usuário
    if (isset($_SESSION["usuario"])) {
        $pesquisa 	= $conn->real_escape_string($_POST['pesquisa']);
        //comando sql para selecionar as pessoas cadastradas
        $sql =  "SELECT * 
                FROM tbpessoa 
                where nomePessoa like '%$pesquisa%' 
                or sobrenomePessoa like '%$pesquisa%' 
                order by nomePessoa";
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
                    <th>Idade</th>
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
                        <td><?php echo $exibir["idadePessoa"] ?> </td>
                        <?php
                            //busca o estado civil de acordo com o código da tabela tbpessoa
                            $sqlEstCivil = "SELECT * FROM tbestcivil WHERE idEstCivil = ". $exibir["idEstCivil"];
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
        } else {
            echo "Nenhum registro cadastrado!";
        }
    } 
    
    ?>
