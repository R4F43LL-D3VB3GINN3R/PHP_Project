<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/producao.css">
    <title>Folhas de Obras</title>
</head>
<body>

    <?php //Main left principal?>

    <div class="left">
        <form action="" id="form_left">

            <div class="div_procura">
                <label for="txt_ticket">FO Nº / Cliente</label>
                <input type="txt_ticket" name="txt_ticket" id="ticket" readonly="true">
                <input type="text" name="txt_cli" id="cli" readonly="true">
            </div>

            <?php //Controlador de Tempo?>

            <div class="div_tempo"> <?php //Tabela 1?>

                <table class="tab1">
                    <thead>
                        <tr>
                            <th id="th">Nome</th>
                            <th id="th">Data</th>
                        </tr>
                        <tr>
                            <th>Técnico</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><select name="dd_tecnico1" id="tecnico1">          

                                <?php 
                                
                                    include 'conexao.php';

                                    $sql = ("SELECT NICK FROM TAB_TECNICO");
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {

                                        echo '<option value="' . " " . '">' . " " . '</option>';

                                        while ($row = $result->fetch_assoc()) {

                                            echo '<option value="' . $row['NICK'] . '">' . $row['NICK'] . '</option>';

                                        }

                                    }

                                    $conn->close();
                                
                                ?>

                            </select></td>
                            <td><input type="date" name="dt_tecnico1" id="dt_tecnico1"></td>
                        </tr>
                        <tr>
                        <td><select name="dd_tecnico2" id="tecnico2">

                            <?php 

                                include 'conexao.php';

                                $sql = ("SELECT NICK FROM TAB_TECNICO");
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {

                                    echo '<option value="' . " " . '">' . " " . '</option>';

                                    while ($row = $result->fetch_assoc()) {

                                        echo '<option value="' . $row['NICK'] . '">' . $row['NICK'] . '</option>';

                                    }

                                }

                                $conn->close();

                            ?>

                            </select></td>
                            <td><input type="date" name="dt_tecnico2" id="dt_tecnico2"></td>
                        </tr>
                        <tr>
                        <td><select name="dd_tecnico3" id="tecnico3">

                            <?php 

                                include 'conexao.php';

                                $sql = ("SELECT NICK FROM TAB_TECNICO");
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {

                                    echo '<option value="' . " " . '">' . " " . '</option>';

                                    while ($row = $result->fetch_assoc()) {

                                        echo '<option value="' . $row['NICK'] . '">' . $row['NICK'] . '</option>';

                                    }

                                }

                                $conn->close();

                            ?>

                            </select></td>
                            <td><input type="date" name="dt_tecnico3" id="dt_tecnico3"></td>
                        </tr>
                        <tr>
                        <td><select name="dd_tecnico4" id="tecnico4">

                            <?php 

                                include 'conexao.php';

                                $sql = ("SELECT NICK FROM TAB_TECNICO");
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {

                                    echo '<option value="' . " " . '">' . " " . '</option>';

                                    while ($row = $result->fetch_assoc()) {

                                        echo '<option value="' . $row['NICK'] . '">' . $row['NICK'] . '</option>';

                                    }

                                }

                                $conn->close();

                            ?>

                            </select></td>
                            <td><input type="date" name="dt_tecnico4" id="dt_tecnico4"></td>
                        </tr>
                        <tr>
                        <td><select name="dd_tecnico5" id="tecnico5">

                            <?php 

                                include 'conexao.php';

                                $sql = ("SELECT NICK FROM TAB_TECNICO");
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {

                                    echo '<option value="' . " " . '">' . " " . '</option>';

                                    while ($row = $result->fetch_assoc()) {

                                        echo '<option value="' . $row['NICK'] . '">' . $row['NICK'] . '</option>';

                                    }

                                }

                                $conn->close();

                            ?>

                            </select></td>
                            <td><input type="date" name="dt_tecnico5" id="dt_tecnico5"></td>
                        </tr>
                        <tr>
                        <td><select name="dd_tecnico6" id="tecnico6">

                            <?php 

                                include 'conexao.php';

                                $sql = ("SELECT NICK FROM TAB_TECNICO");
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {

                                    echo '<option value="' . " " . '">' . " " . '</option>';

                                    while ($row = $result->fetch_assoc()) {

                                        echo '<option value="' . $row['NICK'] . '">' . $row['NICK'] . '</option>';

                                    }

                                }

                                $conn->close();

                            ?>

                            </select></td>
                            <td><input type="date" name="dt_tecnico6" id="dt_tecnico6"></td>
                        </tr>
                    </tbody>
                </table>

                <table class="tab2"> <?php //Tabela 2?>
                    <thead>
                        <tr>
                            <th>Horas</th>
                            <th>Horas</th>
                            <th>Viagem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Início/Término.</th>
                            <th>Trabalhadas</th>
                            <th>Km</th>
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini1" id="hora_ini1"><input type="time" name="time_hora_fim1" id="hora_fim1"></td>
                            <td><input type="text" name="time_hrs_trab1" id="hrs_trab1"></td>
                            <td><input type="number" name="num_km1" id="km1" value="0"><td>                           
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini2" id="hora_ini2"><input type="time" name="time_hora_fim2" id="hora_fim2"></td>
                            <td><input type="text" name="time_hrs_trab2" id="hrs_trab2"></td>
                            <td><input type="number" name="num_km2" id="km2" value="0"><td>                           
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini3" id="hora_ini3"><input type="time" name="time_hora_fim3" id="hora_fim3"></td>
                            <td><input type="text" name="time_hrs_trab3" id="hrs_trab3"></td>
                            <td><input type="number" name="num_km3" id="km3" value="0"><td>                           
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini4" id="hora_ini4"><input type="time" name="time_hora_fim4" id="hora_fim4"></td>
                            <td><input type="text" name="time_hrs_trab4" id="hrs_trab4"></td>
                            <td><input type="number" name="num_km4" id="km4" value="0"><td>                            
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini5" id="hora_ini5"><input type="time" name="time_hora_fim5" id="hora_fim5"></td>
                            <td><input type="text" name="time_hrs_trab5" id="hrs_trab5"></td>
                            <td><input type="number" name="num_km5" id="km5" value="0"><td>                           
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini6" id="hora_ini6"><input type="time" name="time_hora_fim6" id="hora_fim6"></td>
                            <td><input type="text" name="time_hrs_trab6" id="hrs_trab6"></td>
                            <td><input type="number" name="num_km6" id="km6" value="0"><td>
                        </tr>
                    </tbody>
                </table>

                <div class="div_tempo_cliente">
                    <h3>Horas Cliente</h3>
                    <label for="txt_tot_hrs">TOTAIS</label>
                    <input type="text" name="txt_tot_hrs" id="tot1_hrs" value="00-00"readonly="true">
                    <label for="txt_contr_horas">CONTRATO</label>
                    <input type="text" name="txt_contr_horas" id="contr_horas" value="00-00" readonly="true">
                    <label for="txt_debt_horas">DISPONÍVEIS</label>
                    <input type="text" name="txt_debt_horas" id="debt_horas" value="00-00" readonly="true">
                    <label for="txt_tot_extras">EXTRAS</label>
                    <input type="text" name="txt_tot_extras" id="tot_extras" value="00-00" readonly="true">
                </div>

            </div> <?php //Encerra da div_tempo?>

            <?php //Deslocação KM?>

            <div class="div_gen_hrs"> 
                <button type="button" onclick='gerenciar_horas()'>Gerar</button>
            </div>

            <div class="div_mat"> <?php //Tabela de materiais?>

                <table class="tab3"> 
                    <thead>
                        <tr>
                            <th>Quantidade</th>
                            <th>Nome</th>
                            <th>Descrição do Material</th>
                            <th>P.Unit</th>
                            <th>P.Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="number" name="txt_quantMat1" id="quantMat1" value="0"></td>        
                            <td><input type="text" name="txt_catalogo1" id="catalogo1" onclick='redirect_cat()'></td> 
                            <td><input type="text" name="txt_descricao1" id="descricao1"></td>
                            <td><input type="number" name="txt_precUnit1" id="precUnit1" value="0"></td> 
                            <td><input type="number" name="txt_precTot1" id="precTot1" value="0"></td>        
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat2" id="quantMat2" value="0"></td>   
                            <td><input type="text" name="txt_catalogo2" id="catalogo2"></td>  
                            <td><input type="text" name="txt_descricao2" id="descricao2"></td>
                            <td><input type="number" name="txt_precUnit2" id="precUnit2" value="0"></td> 
                            <td><input type="number" name="txt_precTot2" id="precTot2" value="0"></td>  
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat3" id="quantMat3" value="0"></td> 
                            <td><input type="text" name="txt_catalogo3" id="catalogo3"></td> 
                            <td><input type="text" name="txt_descricao3" id="descricao3"></td>  
                            <td><input type="number" name="txt_precUnit3" id="precUnit3" value="0"></td>  
                            <td><input type="number" name="txt_precTot3" id="precTot3" value="0"></td>  
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat4" id="quantMat4" value="0"></td> 
                            <td><input type="text" name="txt_catalogo4" id="catalogo4"></td> 
                            <td><input type="text" name="txt_descricao4" id="descricao4"></td>
                            <td><input type="number" name="txt_precUnit4" id="precUnit4" value="0"></td> 
                            <td><input type="number" name="txt_precTot4" id="precTot4" value="0"></td>     
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat5" id="quantMat5" value="0"></td> 
                            <td><input type="text" name="txt_catalogo5" id="catalogo5"></td>  
                            <td><input type="text" name="txt_descricao5" id="descricao5"></td>  
                            <td><input type="number" name="txt_precUnit5" id="precUnit5" value="0"></td> 
                            <td><input type="number" name="txt_precTot5" id="precTot5" value="0"></td>  
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat6" id="quantMat6" value="0"></td> 
                            <td><input type="text" name="txt_catalogo6" id="catalogo6"></td>  
                            <td><input type="text" name="txt_descricao6" id="descricao6"></td> 
                            <td><input type="number" name="txt_precUnit6" id="precUnit6" value="0"></td> 
                            <td><input type="number" name="txt_precTot6" id="precTot6" value="0"></td>   
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat7" id="quantMat7" value="0"></td> 
                            <td><input type="text" name="txt_catalogo7" id="catalogo7"></td>  
                            <td><input type="text" name="txt_descricao7" id="descricao7"></td>  
                            <td><input type="number" name="txt_precUnit7" id="precUnit7" value="0"></td> 
                            <td><input type="number" name="txt_precTot7" id="precTot7" value="0"></td>  
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat8" id="quantMat8" value="0"></td>  
                            <td><input type="text" name="txt_catalogo8" id="catalogo8"></td>  
                            <td><input type="text" name="txt_descricao8" id="descricao8"></td> 
                            <td><input type="number" name="txt_precUnit8" id="precUnit8" value="0"></td>  
                            <td><input type="number" name="txt_precTot8" id="precTot8" value="0"></td> 
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat9" id="quantMat9" value="0"></td>  
                            <td><input type="text" name="txt_catalogo9" id="catalogo9"></td>  
                            <td><input type="text" name="txt_descricao9" id="descricao9"></td> 
                            <td><input type="number" name="txt_precUnit9" id="precUnit9" value="0"></td>  
                            <td><input type="number" name="txt_precTot9" id="precTot9" value="0"></td> 
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat10" id="quantMat10" value="0"></td> 
                            <td><input type="text" name="txt_catalogo10" id="catalogo10"></td> 
                            <td><input type="text" name="txt_descricao10" id="descricao10"></td>  
                            <td><input type="number" name="txt_precUnit10" id="precUnit10" value="0"></td>  
                            <td><input type="number" name="txt_precTot10" id="precTot10" value="0"></td>  
                        </tr>
                    </tbody>
                </table>

            </div> <?php //Encerra a tabela de materiais?>  

            <?php //Trabalhos Efetuados?>

            <div class="div_trabEfetuados">
                <label for="">Trabalhos Efectuados</label>
                <textarea name="textarea_trabEfetuados" id="trabEfetuados" cols="70" rows="5"></textarea>
            </div>

        </form> <?php //Encerra o Formulário?>
    </div> <?php //Encerra a div .left?>

  <?php //Main right principal?>
    
    <div class="right">

        <form action="" class="form_menu">

            <div class="div_menuright0"> <?php //Menu botões.?>

                <button type="button" id="bt_cat">Catálogo</button>
                <button type="button" id="bt_voltar">Voltar</button>
                <button type="button" id="bt_imprimir">Imprimir</button>
                <button type="button" id="bt_salvar">Salvar</button>

            </div>

            <div class="div_title"> <?php //TX.?>
                <h2>SQG Rádio</h2>
            </div>
            <div class="div_menuright1">
                
                <h3>TX(Transmissão)</h3>
                <label for="txt_pot">Potência(W)</label>
                <input type="text" name="txt_pot" id="pot">
                <label for="txt_pot">Modelação(KHZ)</label>
                <input type="text" name="txt_mod" id="mod">
                <label for="txt_pot">Descarga Frequência</label>
                <input type="text" name="txt_freq" id="freq">

            </div>

            <div class="div_menuright2_3">

                <div class="div_menuright2">
                    
                    <h3>TX(Alimentação)</h3>
                    <label for="dd_bat">Est. Bateria</label>
                    <select name="dd_bat" id="bat">
                        <option value="N">N/A</option>
                        <option value="S">Sim</option>
                    </select>
                    <label for="dd_alimentacao">Alimentação (12V)</label>
                    <select name="dd_alimentacao" id="alimentacao">
                        <option value="N">N/A</option>
                        <option value="S">Sim</option>
                    </select>

                </div>

                <div class="div_menuright3">
                    
                    <h3>TX(Recepção)</h3>
                    <label for="txt_sens">Sensibilidade (μV)</label>
                    <input type="text" name="txt_sens" id="sens">
                    <label for="dd_audio">Áudio</label>
                    <select name="dd_audio" id="audio">
                        <option value="N">N/A</option>
                        <option value="S">Sim</option>
                    </select>

                </div>

            </div> <?php //Fim TX.?>

            <div class="div_title">
                <h2>SQG Informática</h2>
            </div>

            <div class="div_menuright4_5"> <?php //Hardware e Software?>

                <div class="div_menuright4">

                    <h3>Hardware</h3>
                    <label for="dd_teste_funcional">Teste Funcional</label>
                    <select name="dd_teste_funcional" id="teste_funcional">
                        <option value="N">N/A</option>
                        <option value="S">Sim</option>
                    </select>
                    <label for="dd_aval_funcionamento">Aval. de Funcionamento</label>
                    <select name="dd_aval_funcionamento" id="aval_funcionamento">
                        <option value="N">N/A</option>
                        <option value="S">Sim</option>
                    </select>
                    <label for="dd_circuito_de_alimentacao">Circuito de Alimentação</label>
                    <select name="dd_circuito_de_alimentacao" id="circuito_de_alimentacao">
                        <option value="N">N/A</option>
                        <option value="S">Sim</option>
                    </select>

                </div>

                <div class="div_menuright5">

                    <h3>Software</h3>
                    <label for="dd_inicia_corretamente">Inicia Corretamente</label>
                    <select name="dd_inicia_Corretamente" id="inicia_corretamente">
                        <option value="N">N/A</option>
                        <option value="S">Sim</option>
                    </select>
                    <label for="dd_HWSW">Interactividade (HW/SW)</label>
                    <select name="dd_HWSW" id="HWSW">
                        <option value="N">N/A</option>
                        <option value="S">Sim</option>
                    </select>
                    <label for="dd_actualizacaoSW">Actualização(SW)</label>
                    <select name="dd_actualizacaoSW" id="actualizacaoSW">
                        <option value="N">N/A</option>
                        <option value="S">Sim</option>
                    </select>
                    <label for="dd_resultado_esperado">Resultado Esperado</label>
                    <select name="dd_resultado_esperado" id="resultado_esperado">
                        <option value="N">N/A</option>
                        <option value="S">Sim</option>
                    </select>

                </div>

            </div> <?php // Final da div Hardware Software?>

            <div class="div_title"> <?php //TX.?>
                <h2>Debitar</h2>
            </div>
            <div class="div_menuright6">

                <select name="dd_tipo" id="dd_tipo">
                    <option value=""></option>
                    <option value="Garantia">Garantia</option>
                    <option value="Encomenda">Encomenda</option>
                    <option value="Manutenção">Manutenção</option>
                    <option value="Aluguer">Aluguer</option>
                    <option value="Avença">Avença</option>
                </select>
                <label for="dd_facturar">Facturar</label>
                <select name="dd_avenca" id="avenca">
                    <option value="N">Não</option>
                    <option value="S">Sim</option>
                </select>
                <label for="dd_deslocacao">Deslocação</label>
                <select name="dd_deslocacao" id="deslocacao">
                    <option value="N">Não</option>
                    <option value="S">Sim</option>
                </select>

            </div>

        </form>

    </div>

    <?php 

    $nick = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if(isset($_POST['nick'])){

            $nick = $_POST['nick'];
            $id_fo = $_POST['procura_fo'];
            $cliente = $_POST['dd_cliente'];
            $id_material = $_POST['id_material'];

            // Exemplo de uso dos dados (você pode substituir por sua lógica de processamento)
            echo "Nick: " . $nick . "<br>";
            echo "ID FO: " . $id_fo . "<br>";
            echo "Cliente: " . $cliente . "<br>";
            echo "ID Material: " . $id_material . "<br>";

        }

    } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
        
        if(isset($_GET['nick'])){

            $nick = $_GET['nick'];          //Recebe o nick do user...
            $cliente = $_GET['dd_cliente']; //Recebe o nome do cliente...
            $cliente_nome = $cliente;       //Quero guardar o nome do cliente aqui para usar depois...
            $id = $_GET['procura_fo'];      //Recebe o id da fo...

            echo "<script>document.getElementById('ticket').value = '$id';</script>";   //Campo recebe o número do id...
            echo "<script>document.getElementById('cli').value = '$cliente';</script>"; //Campo recebe o nome do cliente...

            include 'conexao.php';

            $sql = "SELECT NIF FROM TAB_CLIENTE WHERE NOME = '$cliente'"; //Seleciona o nif do cliente...
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                $nifcliente_array = $result->fetch_assoc();
                $nif_cliente = $nifcliente_array['NIF'];

                //Seleciona os dados do contrato relacionados ao cliente...
                $sql = "SELECT TEMPO_CONSUMIDO, TEMPO_EXTRA FROM TAB_CONTRATO WHERE ID = '$nif_cliente'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    $array_contrato = $result->fetch_assoc();
                    $tempo_consumido = $array_contrato['TEMPO_CONSUMIDO'];
                    $tempo_extra = $array_contrato['TEMPO_EXTRA'];

                    echo "<script>document.getElementById('debt_horas').value = '$tempo_consumido';</script>"; //Campo recebe o tempo restante de contrato...
                    echo "<script>document.getElementById('tot_extras').value = '$tempo_extra';</script>"; //Campo recebe as horas extras do cliente...

                } else {

                    echo "<script>document.getElementById('debt_horas').value = '00:00';</script>"; //Campo recebe o tempo restante de contrato...
                    echo "<script>document.getElementById('tot_extras').value = '00:00';</script>"; //Campo recebe as horas extras do cliente...

                }

            }
            
            //Seleciona os dados da tabela de produção relacionado a fo...
            $sql = "SELECT * FROM TAB_PRODUCAO WHERE ID_FO = '$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                $idprod = $result->fetch_assoc();
                $id_prod = $idprod['ID'];
                $total_horas = $idprod['HORAS_TOTAIS'];
                $trabalhos_feitos = $idprod['TRABALHOS_FEITOS'];

                //insere os dados nos campos...
                echo "<script>document.getElementById('tot1_hrs').value = '$total_horas';</script>";
                echo "<script>document.getElementById('trabEfetuados').value = '$trabalhos_feitos';</script>";

                //seleciona os dados dos técnicos que trabalharam na fo...
                $sql = "SELECT TAB_PROD_TEC_LINHAS.*, TAB_TECNICO.NICK AS nick_tecnico
                        FROM TAB_PROD_TEC_LINHAS 
                        JOIN TAB_TECNICO ON TAB_TECNICO.ID = TAB_PROD_TEC_LINHAS.ID_TEC 
                        WHERE ID_PROD = '$id_prod';";
                $result = $conn->query($sql);

                $contador = 1;

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        echo "<script>document.getElementById('tecnico" . $contador . "').value = '" . $row['nick_tecnico'] . "';</script>";
                        echo "<script>document.getElementById('dt_tecnico" . $contador . "').value = '" . $row['DATA_DIA'] . "';</script>";
                        echo "<script>document.getElementById('hora_ini" . $contador . "').value = '" . $row['HORA_INICIO'] . "';</script>";
                        echo "<script>document.getElementById('hora_fim" . $contador . "').value = '" . $row['HORA_FIM'] . "';</script>";
                        echo "<script>document.getElementById('hrs_trab" . $contador . "').value = '" . $row['TEMPO_TRABALHADO'] . "';</script>";
                        echo "<script>document.getElementById('km" . $contador . "').value = '" . $row['TOTAL_KM'] . "';</script>";

                        $contador = $contador + 1;

                    }

                    if(isset($_GET['id_material'])) {
                        $id_material = $_GET['id_material'];
                        echo "ID do Material: " . $id_material . "<br>";
                    } else {
                        echo "ID do Material não foi passado.";
                    }


                }

            }

        }

    }

    ?>

        <?php

            include 'conexao.php';

            //Inicia a consulta procurando o valor total de tempo de contrato do cliente...

            $sql = "SELECT c.TEMPO_TOTAL AS tempo_contrato
                    FROM TAB_CONTRATO c
                    JOIN TAB_CLIENTE a ON a.NIF = c.ID
                    WHERE NOME = '$cliente'";
                    
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                $cliente = $result->fetch_assoc();
                
                // Formatando o tempo total em horas no formato de horas:minutos...
                $tempo_contrato = sprintf("%02d:00", $cliente['tempo_contrato']);

                echo "<script>document.getElementById('contr_horas').value = '" . $tempo_contrato . "';</script>";

                $timerun = true; //Variável que permite a contabilidade do tempo...

            } else { //Caso não haja tempo de contrato, significa que não há contrato...

                $tempo_contrato = "00:00"; //Redefine a variável do cronômetro...

                echo "<script>document.getElementById('contr_horas').value = '" . $tempo_contrato . "';</script>";

                //Desativa os selects relacionados às viagens...
                echo '
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var divTempo = document.querySelector(".tab2");
                        
                            var selectsDivTempo = divTempo.querySelectorAll("select");

                            selectsDivTempo.forEach(function(select) {
                                select.setAttribute("disabled", "true");
                            });
                        });
                    </script>
                    ';

                $timerun = false; //Redefine a variável para permitir que o relógio se mova...

            }

            $conn->close();

        ?>

    <script>

        //Função para contabilizar as horas trabalhadas pelo técnico durante o dia.

        function processarTecnico(id_ini, id_fim, id_hrs_trab) {

            var hora_ini = document.getElementById(id_ini).value;
            var hora_fim = document.getElementById(id_fim).value;

            if (hora_ini && hora_fim) {

                var ini = new Date("01/01/2000 " + hora_ini);
                var fim = new Date("01/01/2000 " + hora_fim);

                var diferenca = fim - ini;

                var horas = Math.floor(diferenca / 1000 / 60 / 60);
                diferenca -= horas * 1000 * 60 * 60;
                var minutos = Math.floor(diferenca / 1000 / 60);

                var total_horas = pad(horas, 2) + ":" + pad(minutos, 2);

                document.getElementById(id_hrs_trab).value = total_horas;

            }

        }

        function gerenciar_horas() { 

            //Chama a função que calcula a diferença entre a hora inicial e a hora final do serviço... 
            processarTecnico('hora_ini1', 'hora_fim1', 'hrs_trab1');
            processarTecnico('hora_ini2', 'hora_fim2', 'hrs_trab2');
            processarTecnico('hora_ini3', 'hora_fim3', 'hrs_trab3');
            processarTecnico('hora_ini4', 'hora_fim4', 'hrs_trab4');
            processarTecnico('hora_ini5', 'hora_fim5', 'hrs_trab5');
            processarTecnico('hora_ini6', 'hora_fim6', 'hrs_trab6');

            var tempo_contrato = "<?php echo $tempo_contrato; ?>"; // Recebe o tempo de contrato do cliente...
            var timerun = "<?php echo $timerun; ?>"; //Recebe a validação do contrato...

            if (timerun) { //Variável que verifica se há contrato...
                
                // Calcular o total de horas trabalhadas...
                var total_horas_trabalhadas = sumarizarHoras('hrs_trab1', 'hrs_trab2', 'hrs_trab3', 'hrs_trab4', 'hrs_trab5', 'hrs_trab6');

                // Atualizar o campo 'tot1_hrs' com o total de horas trabalhadas...
                document.getElementById('tot1_hrs').value = total_horas_trabalhadas;

                // Calcular o total de horas debitadas...
                total_horas_debitadas = 0; //Iniciada como zero para ser redefinida para cada clique do botão...

                var total_horas_debitadas = sumarizarHoras2('contr_horas', 'tot1_hrs'); //Calculo do débito das horas.

                document.getElementById('debt_horas').value = total_horas_debitadas; //Inserir ao campo do débito...

                if (total_horas_trabalhadas > tempo_contrato) { //Se o tempo total de tabalho exceder o contrato...

                    total_horas_debitadas = 0; //Nova redefinição da variável...

                    //Exibe o alerta ao técnico...
                    alert("O tempo de contrado do cliente expirou, qualquer serviço subsequente será contabilizado nas horas extras.")

                    //Redefine o campo de horas totais trabalhadas...
                    document.getElementById('tot1_hrs').value = total_horas_trabalhadas;

                    //Chama a função para calcular as horas extras...
                    var total_horas_extras = sumarizarHoras2('tot1_hrs', 'contr_horas');

                    //Insere finalmente ao campo...
                    document.getElementById('tot_extras').value = total_horas_extras;


            } else { // Se não houver horas extras, defina o campo 'tot_extras' como 0...
                
                document.getElementById('tot_extras').value = "00:00";
                
            }

        }

        }

        function pad(num, size) { //Funcao para ajutar os valores de horas...

            var s = num + "";
            while (s.length < size) s = "0" + s;

            return s;

        }

        //As operações aritméticas com horas consistem em separá-las do caractere ":", realizar a conta e depois unir novamente...

        function sumarizarHoras(id1, id2, id3, id4, id5, id6) { //Função para somar as horas...

            var horas1 = document.getElementById(id1).value.split(':');
            var horas2 = document.getElementById(id2).value.split(':');
            var horas3 = document.getElementById(id3).value.split(':');
            var horas4 = document.getElementById(id4).value.split(':');
            var horas5 = document.getElementById(id5).value.split(':');
            var horas6 = document.getElementById(id6).value.split(':');

            var totalHoras, totalMinutos;

            if (horas1[0] && horas1[1]) {

                totalHoras = parseInt(horas1[0]);
                totalMinutos = parseInt(horas1[1]);

            } else {

                totalHoras = 0;
                totalMinutos = 0;

            }

            if (horas2[0] && horas2[1]) {

                totalHoras += parseInt(horas2[0]);
                totalMinutos += parseInt(horas2[1]);

            }

            if (horas3[0] && horas3[1]) {

                totalHoras += parseInt(horas3[0]);
                totalMinutos += parseInt(horas3[1]);

            }

            if (horas4[0] && horas4[1]) {

                totalHoras += parseInt(horas4[0]);
                totalMinutos += parseInt(horas4[1]);

            }

            if (horas5[0] && horas5[1]) {

                totalHoras += parseInt(horas5[0]);
                totalMinutos += parseInt(horas5[1]);

            }

            if (horas6[0] && horas6[1]) {

                totalHoras += parseInt(horas6[0]);
                totalMinutos += parseInt(horas6[1]);

            }

            // Se os minutos passarem de 60, adicionamos uma hora e ajustamos os minutos
            if (totalMinutos >= 60) {

                totalHoras += Math.floor(totalMinutos / 60);
                totalMinutos %= 60;

            }

            // Retornar o total formatado
            return pad(totalHoras, 2) + ':' + pad(totalMinutos, 2);

        }

        function sumarizarHoras2(id1, id2) { //Função para calcular horas extras...

            var horas1 = document.getElementById(id1).value.split(':');
            var horas2 = document.getElementById(id2).value.split(':');

            var totalHoras, totalMinutos;

            if (horas1[0] && horas1[1]) {

                totalHoras = parseInt(horas1[0]);
                totalMinutos = parseInt(horas1[1]);

            } else {

                totalHoras = 0;
                totalMinutos = 0;

            }

            if (horas2[0] && horas2[1]) {

                totalHoras -= parseInt(horas2[0]);
                totalMinutos -= parseInt(horas2[1]);

            }

            // Se os minutos passarem de 60, adicionamos uma hora e ajustamos os minutos
            if (totalMinutos >= 60) {

                totalHoras += Math.floor(totalMinutos / 60);
                totalMinutos %= 60;

            }

            // Retornar o total formatado
            return pad(totalHoras, 2) + ':' + pad(totalMinutos, 2);

        }

    </script>

    <script>

        //Envio de formulários para inserir clientes...

        var nick = '<?php echo $nick; ?>';
        var cliente = '<?php echo $nick; ?>';

        document.getElementById("bt_salvar").addEventListener("click", function() {

        var forms = document.querySelectorAll("form"); 
        var formData = new FormData(); 

        forms.forEach(function(form) {

            var inputs = form.querySelectorAll("input, select, textarea"); 

            inputs.forEach(function(input) {

                formData.append(input.name, input.value); 
    
            });

        });

        var serializedFormData = new URLSearchParams(formData).toString();

        var url = "producao_insert.php?" + serializedFormData + "&nick=" + nick;

        window.location.href = url;

        });

    </script>

<script>

    // Definindo as variáveis PHP como variáveis JavaScript
    var nick = '<?php echo $nick; ?>';
    var cliente = '<?php echo $cliente_nome; ?>';
    var id_fo = '<?php echo $id; ?>';

    // Função para redirecionar para 'catalogo_producao.php' com os parâmetros
    function redirect_cat() {
 
        window.location.href = 'catalogo_producao.php?nick=' + encodeURIComponent(nick) + '&id_fo=' + encodeURIComponent(id_fo) + '&cliente=' + encodeURIComponent(cliente);

    }
    
</script>

</body>
</html>
