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

                //Verifica se a fo já existe...
                $sql = ("SELECT ID_FO FROM TAB_PRODUCAO WHERE ID_FO = '$id_fo'");
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    //----------------------------------------------------------------------------------------------
                    //INÍCIO DA ATUALIZAÇÃO DOS DOS TÉCNICOS
                    //----------------------------------------------------------------------------------------------

                    $stmt = $conn->prepare("UPDATE TAB_PRODUCAO
                                            SET KM_TOTAL = ?, HORAS_TOTAIS = ?, TRABALHOS_FEITOS = ?
                                            WHERE ID_FO = ?");
                    $stmt->bind_param('issi', $km_total, $soma_horas, $trabalhos_efectuados, $id_fo);
                    $result = $stmt->execute();

                    if ($result) {

                        //Pegar a chave da Produção relacionada à FO...
                        $sql = "SELECT ID FROM TAB_PRODUCAO WHERE ID_FO = '$id_fo'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {

                            $id_prod = $result->fetch_assoc(); //Passar o ID da produção para o vetor...
                            $prod_id = $id_prod['ID'];

                            //Removemos os dados dos antigos técnicos...
                            $sql = "DELETE FROM TAB_PROD_TEC_LINHAS WHERE ID_PROD = '$prod_id'";
                            $result = $conn->query($sql);

                            if ($result) {

                                //Agora vamos atualizar os dados inserindo os dados dos técnicos novos...
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

                                        if ($result) { //Se a Query for bem sucedida...

                                            //Selecionamos o nif...
                                            $sql = "SELECT NIF FROM TAB_CLIENTE WHERE NOME = '$cliente'";
                                            $result = $conn->query("$sql");

                                            if ($result->num_rows > 0) { //Se ele encontrar o nif...

                                                $nif_cliente = $result->fetch_assoc(); //Insere o nif ao array...
                                                $nifcli = $nif_cliente['NIF'];         //Insere o nif na variável...
        
                                                //Selecionamos as informacoesdo contrato relacionado ao nif do cliente...
                                                $sql = "SELECT ID, QUANT_DESLOCACOES FROM TAB_CONTRATO WHERE ID = '$nifcli'";
                                                $result = $conn->query($sql);
        
                                                if ($result->num_rows > 0) { //Se encontrar um contrato...

                                                    $info_contrato = $result->fetch_assoc();                  //Passa o id para o array...
                                                    $idcontrato = $info_contrato['ID'];                       //Passa o id para a variável...
                                                    $quant_deslocacoes = $info_contrato['QUANT_DESLOCACOES']; //Passa a quantidade de deslocacoes...

                                                    $horas_disponiveis = $_GET['txt_debt_horas']; //Horas disponíveis em contrato...
                                                    $horas_extras = $_GET['txt_tot_extras'];      //Horas extras...

                                                    if ($quant_deslocacoes != 0) { //Se o cliente tiver direito a dislocações...

                                                        $quant_deslocacoes = $quant_deslocacoes - 1; //Decrementamos o valor da deslocação...
        
                                                    } else { 
        
                                                        $quant_deslocacoes = 0; //Definimos como zero e sempre vamos inserir este número...
        
                                                    }     

                                                    //Altera na tabela de contratos o tempo consumido de horas e as horas extras...
                                                    $stmt = $conn->prepare("UPDATE TAB_CONTRATO
                                                    SET TEMPO_CONSUMIDO = ?, TEMPO_EXTRA = ?, QUANT_DESLOCACOES = ?
                                                    WHERE ID = ?");
                                                    $stmt->bind_param('ssii', $horas_disponiveis, $horas_extras, $quant_deslocacoes, $idcontrato);
                                                    $result = $stmt->execute();

                                                    //------------------------------------------------------------------------------------------
                                                    //FIM DA ATUALIZAÇÃO DOS TÉCNICOS
                                                    //------------------------------------------------------------------------------------------

                                                    //------------------------------------------------------------------------------------------
                                                    //INÍCIO DA ATUALIZAÇÃO DOS DADOS INFORMÁTICOS
                                                    //------------------------------------------------------------------------------------------

                                                    $potencia = $_GET['txt_pot'];
                                                    $modelacao = $_GET['txt_mod'];
                                                    $frequencia = $_GET['txt_freq'];
                                                    $sensibilidade = $_GET['txt_sens'];
                                                    $audio = $_GET['dd_audio'];
                                                    $bateria = $_GET['dd_bat'];
                                                    $alimentacao = $_GET['dd_alimentacao'];

                                                    $stmt = $conn->prepare("UPDATE TAB_PROD_RADIO
                                                                            SET POTENCIA = ?, MODELACAO = ?, FREQUENCIA = ?, SENSIBILIDADE = ?, AUDIO = ?, BATERIA = ?, ALIMENTACAO = ?
                                                                            WHERE ID_PROD = ?");
                                                    $stmt->bind_param('sssssssi', $potencia, $modelacao, $frequencia, $sensibilidade, $audio, $bateria, $alimentacao, $prod_id);
                                                    $result = $stmt->execute();

                                                    if ($result) {

                                                        

                                                    }

                                                }

                                            }

                                        }
                                        
                                    }    

                                }

                            }

                        }   

                    }

                    echo "<div>
                                <h2>Dados da FO $id_fo registados no sistema.</h2>
                                <button type='button' onclick='redirect()'>Ok</button>
                            </div>";


                } else {

                    //----------------------------------------------------------------------------------------------
                    //INÍCIO DA INSERÇÃO DOS DOS TÉCNICOS
                    //----------------------------------------------------------------------------------------------

                    //Consulta para inserir dados à tabela de produção...
                    $stmt = $conn->prepare("INSERT INTO TAB_PRODUCAO (ID_FO, KM_TOTAL, HORAS_TOTAIS, TRABALHOS_FEITOS)
                    VALUES (?, ?, ?, ?)");
                    $stmt->bind_param('iiss', $id_fo, $km_total, $soma_horas, $trabalhos_efectuados);
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

                                if ($result) { //Se a Query for bem sucedida...

                                    //Selecionamos o nif...
                                    $sql = "SELECT NIF FROM TAB_CLIENTE WHERE NOME = '$cliente'";
                                    $result = $conn->query("$sql");

                                    if ($result->num_rows > 0) { //Se ele encontrar o nif...

                                        $nif_cliente = $result->fetch_assoc(); //Insere o nif ao array...
                                        $nifcli = $nif_cliente['NIF'];         //Insere o nif na variável...

                                        //Selecionamos as informacoesdo contrato relacionado ao nif do cliente...
                                        $sql = "SELECT ID, QUANT_DESLOCACOES FROM TAB_CONTRATO WHERE ID = '$nifcli'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) { //Se encontrar um contrato...

                                            $info_contrato = $result->fetch_assoc();                  //Passa o id para o array...
                                            $idcontrato = $info_contrato['ID'];                       //Passa o id para a variável...
                                            $quant_deslocacoes = $info_contrato['QUANT_DESLOCACOES']; //Passa a quantidade de deslocacoes...

                                            $horas_disponiveis = $_GET['txt_debt_horas']; //Horas disponíveis em contrato...
                                            $horas_extras = $_GET['txt_tot_extras'];      //Horas extras...

                                            if ($quant_deslocacoes != 0) { //Se o cliente tiver direito a dislocações...

                                                $quant_deslocacoes = $quant_deslocacoes - 1; //Decrementamos o valor da deslocação...

                                            } else { 

                                                $quant_deslocacoes = 0; //Definimos como zero e sempre vamos inserir este número...

                                            }                                           
                                            
                                            //Altera na tabela de contratos o tempo consumido de horas e as horas extras...
                                            $stmt = $conn->prepare("UPDATE TAB_CONTRATO
                                                                    SET TEMPO_CONSUMIDO = ?, TEMPO_EXTRA = ?, QUANT_DESLOCACOES = ?
                                                                    WHERE ID = ?");
                                            $stmt->bind_param('ssii', $horas_disponiveis, $horas_extras, $quant_deslocacoes, $idcontrato);
                                            $result = $stmt->execute();

                                            //----------------------------------------------------------------------------------------------
                                            //FIM DA INSERÇÃO DOS DADOS TÉCNICOS
                                            //----------------------------------------------------------------------------------------------

                                            //----------------------------------------------------------------------------------------------
                                            //INÍCIO DA INSERÇÃO DOS DADOS INFORMÁTICOS
                                            //----------------------------------------------------------------------------------------------

                                            $potencia = $_GET['txt_pot'];
                                            $modelacao = $_GET['txt_mod'];
                                            $frequencia = $_GET['txt_freq'];
                                            $sensibilidade = $_GET['txt_sens'];
                                            $audio = $_GET['dd_audio'];
                                            $bateria = $_GET['dd_bat'];
                                            $alimentacao = $_GET['dd_alimentacao'];

                                            $stmt = $conn->prepare("INSERT INTO TAB_PROD_RADIO (ID_PROD, POTENCIA, MODELACAO, FREQUENCIA, SENSIBILIDADE, AUDIO, BATERIA, ALIMENTACAO)
                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                                            $stmt->bind_param('isssssss', $id_prod['ID'], $potencia, $modelacao, $frequencia, $sensibilidade, $audio, $bateria, $alimentacao);
                                            $result = $stmt->execute();
                                            
                                            if ($result) {

                                                echo "sucesso";

                                            } else {

                                                echo "falha;";

                                            }

                                        }   

                                    }

                                }

                            }

                        } 

                        if ($result) {

                            echo "<div>
                                    <h2>Dados da FO $id_fo registados no sistema.</h2>
                                    <button type='button' onclick='redirect()'>Ok</button>
                                </div>";

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
