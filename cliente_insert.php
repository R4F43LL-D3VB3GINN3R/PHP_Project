<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/messagebox.css">
    <title>Clientes</title>
</head>
<body>

    <?php

        try {

            include 'conexao.php';

            if ($_SERVER["REQUEST_METHOD"] === "GET") {

                $numCli = $_GET['txt_n_cliente'];
                $nomeCli = $_GET['txt_nomeCliente'];
                $moradaCli = $_GET['txt_moradaCliente'];
                $codPostalCli = $_GET['txt_codPostalCliente'];
                $localCli = $_GET['dd_localidadeCliente'];
                $telMovelCli = $_GET['txt_telemovelCliente'];
                $telFoneCli = $_GET['txt_telefoneCliente'];
                $emailCli = $_GET['txt_emailCliente'];
                $nifCli = $_GET['txt_nifCliente'];
                $statusCli = $_GET['dd_statusCliente'];
                $contratoCli = $_GET['dd_contratoCliente'];
                $obsCli = $_GET['area_observacoes'];

                $sql = "SELECT ID FROM TAB_LOCALIDADE WHERE NOME = '$localCli'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) {

                            $localCli = $row['ID'];

                        }

                    } else {

                        throw new Exception("[Erro 401] ao Buscar Informações de Localidade");

                    }

                if ($contratoCli == "Sim") {

                    $tipoContratoCli = $_GET['dd_tipoContratoCliente'];
                    $tempoTotalCli = $_GET['txt_tempoTotalCliente'];
                    $tempoExtraCli = $_GET['txt_tempoExtraCliente'];
                    $deslocacaoCli = $_GET['dd_deslocacaoCliente'];

                    $stmt = $conn->prepare("INSERT INTO TAB_CONTRATO (ID, TIPO_CONTRATO, TEMPO_TOTAL, TEMPO_EXTRA, DESLOCACAO)
                    VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param('isiis', $nifCli, $tipoContratoCli, $tempoTotalCli, $tempoExtraCli, $deslocacaoCli);
                    $resultContrato = $stmt->execute(); 

                    $stmt = $conn->prepare("INSERT INTO TAB_CLIENTE (N_CLIENTE, NIF, NOME, MORADA, CODIGO_POSTAL, ID_LOCALIDADE, CONTACTO_F, CONTACTO_M, CRIADO_DATA, ID_CONTRATO, EMAIL, STATUS, OBSERVACOES)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?)");
                    $stmt->bind_param('iisssississs', $numCli, $nifCli, $nomeCli, $moradaCli, $codPostalCli, $localCli, $telFoneCli, $telMovelCli, $nifCli, $emailCli, $statusCli, $obsCli);
                    $resultCadastro = $stmt->execute(); 

                    if ($resultCadastro && $resultContrato) {

                        echo "<div>
                                <h2>Cliente $numCli Cadastrado</h2>
                                <button type='button' onclick='redirect()'>Ok</button>
                            </div>";

                    } else {
                    
                        throw new Exception("[Erro 402] ao Cadastrar Cliente");

                    }

                } else {

                    $stmt = $conn->prepare("INSERT INTO TAB_CLIENTE (N_CLIENTE, NIF, NOME, MORADA, CODIGO_POSTAL, ID_LOCALIDADE, CONTACTO_F, CONTACTO_M, CRIADO_DATA, EMAIL, STATUS, OBSERVACOES)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?)");
                    $stmt->bind_param('iisssisssss', $numCli, $nifCli, $nomeCli, $moradaCli, $codPostalCli, $localCli, $telFoneCli, $telMovelCli, $emailCli, $statusCli, $obsCli);
                    $resultCadastro = $stmt->execute(); 

                    if ($resultCadastro) {
                        
                        echo "<div>
                                <h2>Cliente $numCli Cadastrado</h2>
                                <button type='button' onclick='redirect()'>Ok</button>
                            </div>";

                    } else {
                        
                        throw new Exception("[Erro 402] ao Cadastrar Cliente");

                    }

                }
                
            } else {

                echo "<div>
                        <h2>[Erro 401] na Transmissão de Informações</h2>
                        <button type='button' onclick='redirect()'>Ok</button>
                    </div>";

            }

        } catch (Exception $e) {

            throw new Exception("[Erro 400] na Transmissão de Informações Web ");
        }
       
    ?>
</body>
</html>
