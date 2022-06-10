<?php
//inclui o script de conexão
include_once('conexao.php');
//incia a session
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pessoas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable(
                [
                    ['Sexo', 'Quantidade'],
                    <?php
                    $sql = "SELECT Sexo as Sexo, count(Sexo) as Qtde 
                    FROM tbpessoa
                    group by Sexo";

                    $consulta_executada = $conn->query($sql);
                    while ($row_dados = $consulta_executada->fetch_assoc()) {
                    ?>['<?php echo $row_dados["Sexo"] ?>', <?php echo $row_dados["Qtde"] ?>],
                    <?php
                    }
                    ?>
                ]
            );

            var options = {
                //'title': 'Quantidade de pessoas por sexo',
                'width': 900,
                'height': 500,
                is3D: true
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>
</head>

<body style="margin: 20px;">
    
    <?php
    //verifica se foi iniciada a seção do usuário
    if (isset($_SESSION["usuario"])) {
    ?>
        <?php
        //inclui o script de boas-vindas e menu
        include_once("menu.php");
        ?>
        <h2 class="text-center">GRÁFICO DE QUANTIDADE PESSOAS POR GÊNERO</h2>
        <div id="chart_div"></div>
    <?php
    } else {
        echo "Usuário não autenticado!";
    ?>
        <a href="index.php">Se identifique aqui</a>
    <?php

    }

    ?>
</body>

</html>