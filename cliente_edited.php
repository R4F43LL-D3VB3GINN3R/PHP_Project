<!DOCTYPE html>
<html lang="en">
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

                $nick = isset($_GET['nick']) ? $_GET['nick'] : '';

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

                //Consulta a linha referente ao número do cliente...

                $sql = "SELECT * FROM TAB_CLIENTE WHERE N_CLIENTE = '$numCli'";
                $result = $conn->query($sql);

                if ($result->num_rows <= 0) {

                    echo "<div>
                                <h2>Cliente $numCli não existe em nosso sistema</h2>
                                <button type='button' onclick='redirect()'>Ok</button>
                        </div>";

                } else { //Se tudo correr bem com a consulta...

                    $dadosCli = $result->fetch_assoc(); //Insere o cliente no vetor...

                    $sql = "SELECT ID FROM TAB_LOCALIDADE WHERE NOME = '$localCli'"; //Consulta o id da localidade do cliente...
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) {

                            $localCli = $row['ID']; //Converte a variável no id...

                        }

                        //Se o cliente tiver um contrato e quiser alterá-lo...
                        if ($dadosCli['ID_CONTRATO'] == $nifCli && $contratoCli == "Sim") {

                            $tipoContratoCli = $_GET['dd_tipoContratoCliente'];
                            $tempoTotalCli = $_GET['txt_tempoTotalCliente'];
                            $tempoExtraCli = $_GET['txt_tempoExtraCliente'];
                            $deslocacaoCli = $_GET['dd_deslocacaoCliente'];
                            $modalidadeCli = $_GET['dd_tipoModalidadeCliente'];

                            $stmt = $conn->prepare("UPDATE TAB_CONTRATO
                                                    SET ID = ?, TIPO_CONTRATO = ?, TEMPO_TOTAL = ?, TEMPO_EXTRA = ?, DESLOCACAO = ?, MODALIDADE = ? 
                                                    WHERE ID = ?");
                            $stmt->bind_param('isiisis', $nifCli, $tipoContratoCli, $tempoTotalCli, $tempoExtraCli, $deslocacaoCli, $modalidadeCli, $nifCli);
                            $resultContrato = $stmt->execute();

                            $stmt = $conn->prepare("UPDATE TAB_CLIENTE
                                                SET N_CLIENTE = ?, NIF = ?, NOME = ?, MORADA = ?, CODIGO_POSTAL = ?, ID_LOCALIDADE = ?, CONTACTO_F = ?, CONTACTO_M = ?, ID_CONTRATO = ?, EMAIL = ?, STATUS = ?, OBSERVACOES = ? WHERE N_CLIENTE = ?");
                            $stmt->bind_param('iisssississsi', $numCli, $nifCli, $nomeCli, $moradaCli, $codPostalCli, $localCli, $telFoneCli, $telMovelCli, $nifCli, $emailCli, $statusCli, $obsCli, $numCli);
                            $resultCadastro = $stmt->execute(); 
    
                            if ($resultCadastro && $resultContrato) {
    
                                echo "<div>
                                        <h2>Dados do Cliente $numCli Alterados</h2>
                                        <button type='button' onclick='redirect()'>Ok</button>
                                    </div>";
    
                            } else {
                            
                                throw new Exception("[Erro] Ao modificar dados do Cliente");
    
                            }

                        //Se o cliente tiver um contrato e não o quiser mais...
                        } else if ($dadosCli['ID_CONTRATO'] == $nifCli && $contratoCli == "Não") {            

                            //Removemos as duas tabelas, mas a do cliente tem de ir primeiro...
                            $sql = "DELETE FROM TAB_CLIENTE WHERE NIF = '$nifCli'";
                            $resultDelete = $conn->query($sql); 

                            $sql = "DELETE FROM TAB_CONTRATO WHERE ID = '$nifCli'";
                            $result = $conn->query($sql); 

                            if ($resultDelete) {

                                //Recadastramos o cliente no sistema...
                                $stmt = $conn->prepare("INSERT INTO TAB_CLIENTE (N_CLIENTE, NIF, NOME, MORADA, CODIGO_POSTAL, ID_LOCALIDADE, CONTACTO_F, CONTACTO_M, CRIADO_DATA, EMAIL, STATUS, OBSERVACOES)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                $stmt->bind_param('iisssissssss', $numCli, $nifCli, $nomeCli, $moradaCli, $codPostalCli, $localCli, $telFoneCli, $telMovelCli, $dadosCli['ATUALIZACAO'], $emailCli, $statusCli, $obsCli);
                                $resultCadastro = $stmt->execute(); 

                                if ($resultCadastro) {

                                    echo "<div>
                                            <h2>Dados do Cliente $numCli Alterados e Contrato Removido</h2>
                                            <button type='button' onclick='redirect()'>Ok</button>
                                        </div>";

                                } else {

                                    throw new Exception("[Erro] Ao modificar dados do Cliente");

                                }

                            } else {

                                throw new Exception("[Erro] Ao Remover dados do Cliente e Contrato");

                            }
                        
                        //Se o cliente não tiver um contrato, mas agora quer ter...
                        } else if ($dadosCli['ID_CONTRATO'] == NULL && $contratoCli == "Sim") {

                            $tipoContratoCli = $_GET['dd_tipoContratoCliente'];
                            $tempoTotalCli = $_GET['txt_tempoTotalCliente'];
                            $tempoExtraCli = $_GET['txt_tempoExtraCliente'];
                            $deslocacaoCli = $_GET['dd_deslocacaoCliente'];
                            $modalidadeCli = $_GET['dd_tipoModalidadeCliente'];

                            //Inserimos seu contrato primeiro...
                            $stmt = $conn->prepare("INSERT INTO TAB_CONTRATO (ID, TIPO_CONTRATO, TEMPO_TOTAL, TEMPO_EXTRA, DESLOCACAO, MODALIDADE)
                            VALUES (?, ?, ?, ?, ?)");
                            $stmt->bind_param('isiis', $nifCli, $tipoContratoCli, $tempoTotalCli, $tempoExtraCli, $deslocacaoCli, $modalidadeCli);
                            $resultContrato = $stmt->execute(); 

                            //Atualizamos o cliente para receber o contrato...
                            $stmt = $conn->prepare("UPDATE TAB_CLIENTE
                                                    SET N_CLIENTE = ?, NIF = ?, NOME = ?, MORADA = ?, CODIGO_POSTAL = ?, ID_LOCALIDADE = ?, CONTACTO_F = ?, CONTACTO_M = ?, ID_CONTRATO = ?, EMAIL = ?, STATUS = ?, OBSERVACOES = ? WHERE N_CLIENTE = ?");
                            $stmt->bind_param('iisssississsi', $numCli, $nifCli, $nomeCli, $moradaCli, $codPostalCli, $localCli, $telFoneCli, $telMovelCli, $nifCli, $emailCli, $statusCli, $obsCli, $numCli);
                            $resultCadastro = $stmt->execute(); 

                            if ($resultCadastro && $resultContrato) {
    
                                echo "<div>
                                        <h2>Dados do Cliente $numCli Alterados e Contrato Criado</h2>
                                        <button type='button' onclick='redirect()'>Ok</button>
                                    </div>";
    
                            } else {
                            
                                throw new Exception("[Erro] ao modificar Dados do Cliente");
    
                            }
                        
                        //Se o cliente não tinha um contrato e quer apenas atualizar as suas informações...
                        } else if ($dadosCli['ID_CONTRATO'] == NULL && $contratoCli == "Não") { 

                            //Atualiza o cliente deixando de fora seu ID...
                            $stmt = $conn->prepare("UPDATE TAB_CLIENTE
                                                    SET N_CLIENTE = ?, NIF = ?, NOME = ?, MORADA = ?, CODIGO_POSTAL = ?, ID_LOCALIDADE = ?, CONTACTO_F = ?, CONTACTO_M = ?, EMAIL = ?, STATUS = ?, OBSERVACOES = ? WHERE N_CLIENTE = ?");
                            $stmt->bind_param('iisssisssssi', $numCli, $nifCli, $nomeCli, $moradaCli, $codPostalCli, $localCli, $telFoneCli, $telMovelCli, $emailCli, $statusCli, $obsCli, $numCli);
                            $resultCadastro = $stmt->execute(); 
    
                            if ($resultCadastro) {
    
                                echo "<div>
                                        <h2>Dados do Cliente $numCli Alterados</h2>
                                        <button type='button' onclick='redirect()'>Ok</button>
                                    </div>";
    
                            } else {
                            
                                throw new Exception("[Erro 402] ao modificar dados do Cliente");
    
                            }

                        } else {

                            throw new Exception("[Erro] Ao Atualizar Dados de Clientes");

                        }

                    } else {

                        throw new Exception("[Erro] Ao acessar as Localidades");

                    }

                }

            } else {

                throw new Exception("[Erro] No envio de formulário Web.");

            }     

        } catch (Exception $e) {

            throw new Exception("[Erro 400]" . $e);

        }

    $conn->close();
    
    ?>

<script>

    var nick = '<?php echo $nick; ?>';

    function redirect() {

        window.location.href = 'cliente.php?nick=' + nick;
        
    }
        
</script>
</body>
</html>
