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

                //Informações da FO...
                $id_fo = $_GET['txt_ticket']; //ID da fo...

                //Informações do Admin...
                $nick = $_GET['nick'];
                $cliente = $_GET['txt_cli'];

                //Informações do Cliente...

                $nome_cliente = $_GET['txt_cli'];             //Nome do cliente... 
                $soma_horas = $_GET['txt_tot_hrs'];           //Horas consumidas...
                $horas_contrato = $_GET['txt_contr_horas'];   //Horas em contrato...
                $horas_disponiveis = $_GET['txt_debt_horas']; //Horas disponíveis em contrato...
                $horas_extras = $_GET['txt_tot_extras'];      //Horas extras...

                $sql = ("SELECT ID_FO FROM TAB_PRODUCAO WHERE ID_FO = '$id_fo'");
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    echo "<div>
                            <h2>Dados da FO $id_fo existentes no sistema.</h2>
                            <button type='button' onclick='redirect()'>Ok</button>
                        </div>";

                } else {

                    //Soma de km de todos os técnicos em atendimento na fo...

                    $quant_km1 = $_GET['num_km1']; //Quantidade de km percorrida pelo técnico em atendimento remoto...
                    $quant_km2 = $_GET['num_km2'];
                    $quant_km3 = $_GET['num_km3'];
                    $quant_km4 = $_GET['num_km4'];
                    $quant_km5 = $_GET['num_km5'];
                    $quant_km6 = $_GET['num_km6'];

                    $km_total = $quant_km1 + $quant_km2 + $quant_km3 + $quant_km4 + $quant_km5 + $quant_km6;

                    //Trabalhos efectuados...
                    $trabalhos_efectuados = $_GET['textarea_trabEfetuados'];

                    //Consulta para inserir dados à tabela de produção...
                    $stmt = $conn->prepare("INSERT INTO TAB_PRODUCAO (ID_FO, KM_TOTAL, TRABALHOS_FEITOS)
                    VALUES (?, ?, ?)");
                    $stmt->bind_param('iis', $id_fo, $km_total, $trabalhos_efectuados);
                    $result = $stmt->execute();

                    //Se a query funcionar...
                    if ($result) {

                        //Pegar a chave da Produção relacionada à FO...
                        $sql = "SELECT ID FROM TAB_PRODUCAO WHERE ID_FO = '$id_fo'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {

                            $id_prod = $result->fetch_assoc(); //Passar o ID da produção para o vetor...

                        }

                        // Pegamos os dados dos técnicos 1 ao 6...
                        for ($i = 1; $i <= 6; $i++) {

                            ${'tecnico' . $i} = $_GET['dd_tecnico' . $i];
                            ${'data' . $i} = $_GET['dt_tecnico' . $i];
                            ${'hora_inicio' . $i} = $_GET['time_hora_ini' . $i];
                            ${'hora_fim' . $i} = $_GET['time_hora_fim' . $i];
                            ${'horas_trabalhadas' . $i} = $_GET['time_hrs_trab' . $i];

                            // Seleciona o id do técnico relacionado ao nome...
                            $sql = "SELECT ID FROM TAB_TECNICO WHERE NICK = '${'tecnico' . $i}'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) { // Se houver um técnico selecionado na dropdown... 
                                
                                $id_tec = $result->fetch_assoc(); // Passa o id para o array...

                                // Insere os dados de trabalho do técnico na tabela de produção...
                                $stmt = $conn->prepare("INSERT INTO TAB_PROD_TEC_LINHAS (ID_PROD, ID_TEC, DATA_DIA, HORA_INICIO, HORA_FIM, TOTAL_KM, TEMPO_TRABALHADO)
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
                                $stmt->bind_param("iisssis", $id_prod['ID'], $id_tec['ID'], ${'data' . $i}, ${'hora_inicio' . $i}, ${'hora_fim' . $i}, ${'quant_km' . $i}, ${'horas_trabalhadas' . $i});
                                $result = $stmt->execute();

                                if ($result->num_rows > 0) {

                                    $stmt = $conn->prepare("INSERT INTO TAB_CONTRATO");

                                }

                            }

                        }

                    }

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
