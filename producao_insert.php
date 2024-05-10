<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/messagebox.css">
    <title>Produção</title>
</head>
<body>

    <?php

        include 'conexao.php';

        try {

            if ($_SERVER["REQUEST_METHOD"] === "GET") {

                //Informações do Admin...
                $nick = $_GET['nick'];
                $cliente = $_GET['txt_cli'];

                //Informações da FO...

                $id_fo = $_GET['txt_ticket']; //ID da fo...

                //Informações do Cliente...

                $nome_cliente = $_GET['txt_cli'];             //Nome do cliente... 
                $soma_horas = $_GET['txt_tot_hrs'];           //Horas consumidas...
                $horas_contrato = $_GET['txt_contr_horas'];   //Horas em contrato...
                $horas_disponiveis = $_GET['txt_debt_horas']; //Horas disponíveis em contrato...
                $horas_extras = $_GET['txt_tot_extras'];      //Horas extras...

                //Informações dos Técnicos...

                $tecnico1 = $_GET['dd_tecnico1']; //nickname dos técnicos...
                $tecnico2 = $_GET['dd_tecnico2'];
                $tecnico3 = $_GET['dd_tecnico3'];
                $tecnico4 = $_GET['dd_tecnico4'];
                $tecnico5 = $_GET['dd_tecnico5'];
                $tecnico6 = $_GET['dd_tecnico6'];

                $data1 = $_GET['dt_tecnico1']; //data do atendimento...
                $data2 = $_GET['dt_tecnico2'];
                $data3 = $_GET['dt_tecnico3'];
                $data4 = $_GET['dt_tecnico4'];
                $data5 = $_GET['dt_tecnico5'];
                $data6 = $_GET['dt_tecnico6'];

                $hora_inicio1 = $_GET['time_hora_ini1']; //hora de início do atendimento...
                $hora_inicio2 = $_GET['time_hora_ini2'];
                $hora_inicio3 = $_GET['time_hora_ini3'];
                $hora_inicio4 = $_GET['time_hora_ini4'];
                $hora_inicio5 = $_GET['time_hora_ini5'];
                $hora_inicio6 = $_GET['time_hora_ini6'];

                $hora_fim1 = $_GET['time_hora_fim1']; //hora em que foi encerrado o atendimento...
                $hora_fim2 = $_GET['time_hora_fim2'];
                $hora_fim3 = $_GET['time_hora_fim3'];
                $hora_fim4 = $_GET['time_hora_fim4'];
                $hora_fim5 = $_GET['time_hora_fim5'];
                $hora_fim6 = $_GET['time_hora_fim6'];

                $horas_trabalhadas1 = $_GET['time_hrs_trab1']; //duração do atendimento...
                $horas_trabalhadas2 = $_GET['time_hrs_trab2'];
                $horas_trabalhadas3 = $_GET['time_hrs_trab3'];
                $horas_trabalhadas4 = $_GET['time_hrs_trab4'];
                $horas_trabalhadas5 = $_GET['time_hrs_trab5'];
                $horas_trabalhadas6 = $_GET['time_hrs_trab6'];

                $viagem1 = $_GET['dd_viag1']; //possibilidade de viagem ou não...
                $viagem2 = $_GET['dd_viag2'];
                $viagem3 = $_GET['dd_viag3'];
                $viagem4 = $_GET['dd_viag4'];
                $viagem5 = $_GET['dd_viag5'];
                $viagem6 = $_GET['dd_viag6'];

                $quant_km1 = $_GET['num_km1']; //Quantidade de km percorrida pelo técnico em atendimento remoto...
                $quant_km2 = $_GET['num_km2'];
                $quant_km3 = $_GET['num_km3'];
                $quant_km4 = $_GET['num_km4'];
                $quant_km5 = $_GET['num_km5'];
                $quant_km6 = $_GET['num_km6'];

                $sql = ("SELECT ID_FO FROM TAB_PRODUCAO WHERE ID_FO = '$id_fo'");
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    echo "<div>
                            <h2>Dados da FO $id_fo existentes no sistema.</h2>
                            <button type='button' onclick='redirect()'>Ok</button>
                        </div>";

                } else {

                    //Soma de km de todos os técnicos em atendimento na fo...
                    $km_total = $quant_km1 + $quant_km2 + $quant_km3 + $quant_km4 + $quant_km5 + $quant_km6;

                    //Trabalhos efectuados...
                    $trabalhos_efectuados = $_GET['textarea_trabEfetuados'];

                    $stmt = $conn->prepare("INSERT INTO TAB_PRODUCAO (ID_FO, KM_TOTAL, TRABALHOS_FEITOS)
                    VALUES (?, ?, ?)");
                    $stmt->bind_param('iis', $id_fo, $km_total, $trabalhos_efectuados);
                    $result = $stmt->execute();

                }

            }

        } catch (Exception $e) {

            throw new Exception("[Erro 400] na Transmissão de Informações Web ");

        $conn->close();

        }
       
    ?>

    <script>

    var nick = '<?php echo $nick; ?>';
    var id_fo = '<?php echo $id_fo; ?>';
    var cliente = '<?php echo $cliente; ?>';

    function redirect() {

        window.location.href = 'producao.php?nick=' + nick + '&procura_fo=' + id_fo + '&dd_cliente=' + cliente;

    }
        
    </script>
</body>
</html>
