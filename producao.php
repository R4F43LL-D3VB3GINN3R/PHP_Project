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
                            <th>Nome</th>
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
                            <th>Tempo Deb.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Início/Término.</th>
                            <th>Viagem/Trabalho</th>
                            <th>Normal/Extra</th>
                            <th>Cód MT</th>
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini1" id="hora_ini1"><input type="time" name="time_hora_fim1" id="hora_fim1"></td>
                            <td><input type="number" name="num_viag1" id="viag1" value="0"><input type="number" name="num_trab1" id="trab1" value="0"></td>
                            <td><input type="number" name="num_normal1" id="normal1" value="0"><input type="number" name="num_extra1" id="extra1" value="0"></td>
                            <td><select type="number" name="num_codmat1" id="codmat1" value="0">
                                <option value="">0</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini2" id="hora_ini2"><input type="time" name="time_hora_fim2" id="hora_fim2"></td>
                            <td><input type="number" name="num_viag2" id="viag2" value="0"><input type="number" name="num_trab2" id="trab2" value="0"></td>
                            <td><input type="number" name="num_normal2" id="normal2" value="0"><input type="number" name="num_extra2" id="extra2" value="0"></td>
                            <td><select type="number" name="num_codmat2" id="codmat2">
                                <option value="">0</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini3" id="hora_ini3"><input type="time" name="time_hora_fim3" id="hora_fim3"></td>
                            <td><input type="number" name="num_viag3" id="viag3" value="0"><input type="number" name="num_trab3" id="trab3" value="0"></td>
                            <td><input type="number" name="num_normal3" id="normal3" value="0"><input type="number" name="num_extra3" id="extra3" value="0"></td>
                            <td><select type="number" name="num_codmat3" id="codmat3">
                                <option value="">0</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini4" id="hora_ini4"><input type="time" name="time_hora_fim4" id="hora_fim4"></td>
                            <td><input type="number" name="num_viag4" id="viag4" value="0"><input type="number" name="num_trab4" id="trab4" value="0"></td>
                            <td><input type="number" name="num_normal4" id="normal4" value="0"><input type="number" name="num_extra4" id="extra4" value="0"></td>
                            <td><select type="number" name="num_codmat4" id="codmat4">
                                <option value="">0</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini5" id="hora_ini5"><input type="time" name="time_hora_fim5" id="hora_fim5"></td>
                            <td><input type="number" name="num_viag5" id="viag5" value="0"><input type="number" name="num_trab5" id="trab5" value="0"></td>
                            <td><input type="number" name="num_normal5" id="normal5" value="0"><input type="number" name="num_extra5" id="extra5" value="0"></td>
                            <td><select type="number" name="num_codmat5" id="codmat5">
                                <option value="">0</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td><input type="time" name="time_hora_ini6" id="hora_ini6"><input type="time" name="time_hora_fim6" id="hora_fim6"></td>
                            <td><input type="number" name="num_viag6" id="viag6" value="0"><input type="number" name="num_trab6" id="trab6" value="0"></td>
                            <td><input type="number" name="num_normal6" id="normal6" value="0"><input type="number" name="num_extra6" id="extra6" value="0"></td>
                            <td><select type="number" name="num_codmat6" id="codmat6">
                                <option value="">0</option>
                            </select></td>
                        </tr>
                    </tbody>
                </table>

            </div> <?php //Encerra da div_tempo?>

            <div class="time_footer"> <?php //Footer das Tabelas 1 e 2?>

                <h2>Totais:</h2>
                <input type="text" name="txt_tot1" id="tot1" value="0">
                <input type="text" name="txt_tot2" id="tot2" value="0">
                <input type="text" name="txt_tot3" id="tot3" value="0">
                <input type="text" name="txt_tot4" id="tot4" value="0">
                
            </div>

            <?php //Deslocação KM?>

            <div class="div_km"> 
                <label for="txt_desl_km">Deslocação KM:</label>
                <input type="number" name="txt_desl_km" id="desl_km" >
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
                <label for="">Trabalhos Efetuados</label>
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

                <label for="dd_facturar">Facturar</label>
                <select name="dd_avenca" id="avenca">
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
                <label for="dd_deslocacao">Deslocação</label>
                <select name="dd_deslocacao" id="deslocacao">
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
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

</body>
</html>
