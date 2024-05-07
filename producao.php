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
                            <td><input type="date" name="dt_tecnico3" id="dt_tecnico3"></td>
                        </tr>
                        <tr>
                        <td><select name="dd_tecnico3" id="dd_tecnico3">

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
                            <td><input type="date" name="dt_tecnico3" id="tecnico3"></td>
                        </tr>
                        <tr>
                        <td><select name="dd_tecnico4" id="dd_tecnico4">

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
                            <td><input type="date" name="dt_tecnico4" id="tecnico4"></td>
                        </tr>
                        <tr>
                        <td><select name="dd_tecnico5" id="dd_tecnico5">

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
                            <td><input type="date" name="dt_tecnico5" id="tecnico5"></td>
                        </tr>
                        <tr>
                        <td><select name="dd_tecnico6" id="dd_tecnico6">

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
                            <td><input type="date" name="dd_tecnico6" id="dd_tecnico6"></td>
                        </tr>
                    </tbody>
                </table>

                <table class="tab2"> <?php //Tabela 2?>
                    <thead>
                        <tr>
                            <th>Horas</th>
                            <th>Tempo Dis.</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Início/Término.</th>
                            <th>Viagem/Trabalho</th>
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini1" id="hora_ini1"><input type="time" name="time_hora_fim1" id="hora_fim1"></td>
                            <td><input type="time" name="time_viag_ini1" id="ini_viag1" value="0"><input type="time" name="time_viag_fim11" id="fim_viag1"></td>
                            <td><input type="time" name="time_hrs_trab1" id="hrs_trab1"></td>
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini2" id="hora_ini2"><input type="time" name="time_hora_fim2" id="hora_fim2"></td>
                            <td><input type="time" name="time_viag_ini2" id="ini_viag2" value="0"><input type="time" name="time_viag_fim12" id="fim_viag2" value="0"></td>
                            <td><input type="time" name="time_hrs_trab2" id="hrs_trab2"></td>
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini3" id="hora_ini3"><input type="time" name="time_hora_fim3" id="hora_fim3"></td>
                            <td><input type="time" name="time_viag_ini3" id="ini_viag1" value="0"><input type="time" name="time_viag_fim13" id="fim_viag3" value="0"></td>
                            <td><input type="time" name="time_hrs_trab3" id="hrs_trab3"></td>
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini4" id="hora_ini4"><input type="time" name="time_hora_fim4" id="hora_fim4"></td>
                            <td><input type="time" name="time_viag_ini4" id="ini_viag4" value="0"><input type="time" name="time_viag_fim14" id="fim_viag4" value="0"></td>
                            <td><input type="time" name="time_hrs_trab4" id="hrs_trab4"></td>
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini5" id="hora_ini5"><input type="time" name="time_hora_fim5" id="hora_fim5"></td>
                            <td><input type="time" name="time_viag_ini5" id="ini_viag5" value="0"><input type="time" name="time_viag_fim15" id="fim_viag5" value="0"></td>
                            <td><input type="time" name="time_hrs_trab5" id="hrs_trab5"></td>
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini6" id="hora_ini6"><input type="time" name="time_hora_fim6" id="hora_fim6"></td>
                            <td><input type="time" name="time_viag_ini6" id="ini_viag6" value="0"><input type="time" name="time_viag_fim16" id="fim_viag6" value="0"></td>
                            <td><input type="time" name="time_hrs_trab6" id="hrs_trab6"></td>
                        </tr>
                    </tbody>
                </table>

            </div> <?php //Encerra da div_tempo?>

            <div class="time_footer"> <?php //Footer das Tabelas 1 e 2?>

                <label for="txt_tot_hrs">Tot.Hrs</label>
                <input type="text" name="txt_tot_hrs" id="tot1_hrs" readonly="true">
                <label for="txt_tot_viagens">Tot.Hrs.Viagens</label>
                <input type="text" name="txt_tot_viagens" id="tot_viagens" readonly="true">
                <label for="txt_contr_horas">Tot.Hrs.Contr</label>
                <input type="text" name="txt_contr_horas" id="contr_horas" readonly="true">
                <label for="txt_tot_extras">Tot.Hrs.Extras</label>
                <input type="text" name="txt_tot_extras" id="tot_extras" readonly="true">
                
            </div>

            <?php //Deslocação KM?>

            <div class="div_km"> 
                <label for="txt_desl_km">Deslocação KM:</label>
                <input type="number" name="txt_desl_km" id="desl_km" >
                <button type="button" onclick='gerenciar_horas()'>Gerar</button>
            </div>

            <div class="div_mat"> <?php //Tabela de materiais?>

                <table class="tab3"> 
                    <thead>
                        <tr>
                            <th>Quantidade</th>
                            <th>Catálogo</th>
                            <th>Descrição</th>
                            <th>P.Unit</th>
                            <th>P.Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="number" name="txt_quantMat1" id="quantMat1" value="0"></td>        
                            <td><input type="text" name="txt_catalogo1" id="catalogo1"></td> 
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
                <textarea name="trabEfetuados" id="trabEfetuados" cols="70" rows="5"></textarea>
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

        }

    } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
        
        if(isset($_GET['nick'])){

            $nick = $_GET['nick'];
            $num_serie = $_GET['txt_numero_serie'];
            $cliente = $_GET['dd_cliente'];
            $id = $_GET['procura_fo'];

            echo "<script>document.getElementById('ticket').value = '$id';</script>";
            echo "<script>document.getElementById('cli').value = '$cliente';</script>";

        }

    }

    ?>

        <?php

            include 'conexao.php';

            $sql = "SELECT c.TEMPO_TOTAL AS tempo_contrato
                    FROM TAB_CONTRATO c
                    JOIN TAB_CLIENTE a ON a.NIF = c.ID
                    WHERE NOME = '$cliente'";
                    
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $cliente = $result->fetch_assoc();
                
                // Formatando o tempo total em horas no formato de horas:minutos
                $tempo_contrato = sprintf("%02d:00", $cliente['tempo_contrato']);

                echo "<script>document.getElementById('contr_horas').value = '" . $tempo_contrato . "';</script>";
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
                
            // Calcular o total de horas trabalhadas...
            var total_horas_trabalhadas = sumarizarHoras('hrs_trab1', 'hrs_trab2', 'hrs_trab3', 'hrs_trab4', 'hrs_trab5', 'hrs_trab6');
            
            // Atualizar o campo 'tot1_hrs' com o total de horas trabalhadas...
            document.getElementById('tot1_hrs').value = total_horas_trabalhadas;
            
            // Calcular as horas extras...
            var horas_extras = 0; 

            if (total_horas_trabalhadas > tempo_contrato) { //Se o tempo total de tabalho exceder o contrato...

                //Exibe o alerta ao técnico...
                alert("O tempo de contrado do cliente expirou, qualquer serviço após isso será contabilizado nas horas extras.")

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

</body>
</html>
