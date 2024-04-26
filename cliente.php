<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/cliente.css">
    <title>Clientes</title>
</head>
<body>
<section class="layout">

<div class="name2">
    <form action="" id="form_name2">
        <h2>Procurar</h2>
        <input type="text" name="procuraCli" id="procuraCli">
        <input type="submit" value="Procurar Nº" id="submit">
        <button id="listar_fo">Listar</button>
        <h2>Menu</h2>
        <button id="bt_dashboard">Dashboard</button>
        <button type="button" onclick='redirect_cliente()' id="bt_cliente">Cliente</button>
        <button type="button" onclick='redirect_fo()' id="bt_fo">Folhas de Obras</button>
        <h2>Equipamento</h2>
        <button id="bt_tipo">Tipo</button>
        <button id="bt_marca">Marca</button>
        <button id="bt_modelo">Modelo</button>
        <button id="bt_catalogo">Catálogo</button>
    </form>
</div>

<div class="name3">
    <div class="subdiv1">
        <form action="fo2.php" method="post" id="form_subdiv1">
            <label for="txt_n_cliente">Nº Cliente: </label>
            <input type="number" name="txt_n_cliente"id="nCliente" maxlength="10">
            <label for="txt_nomeCliente">Nome: </label>
            <input type="text" name="txt_nomeCliente" id="nomeCliente">
            <label for="txt_moradaCliente">Morada:</label>
            <input type="text" name="txt_moradaCliente" id="moradaCliente">  
            <label for="txt_codPostalCliente">Cod Postal:</label>
            <input type="text" name="txt_codPostalCliente" id="codPostalCliente" maxlength="7">  
        </form>
    </div>   
       
    <div class="subdiv2">
        <form action="fo2.php" method="post" id="form_subdiv2">

            <label for="dd_localidadeCliente">Localidade: </label>

            <?php 
            
            include 'conexao.php';

            try {

                $sql = "SELECT NOME FROM TAB_LOCALIDADE";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    $localidades = array();

                    while($row = $result->fetch_assoc()) {

                        $localidades[$row['NOME']] = $row;

                    }

                    echo '<select name="dd_localidadeCliente" id="localidadeCliente">';

                    foreach ($localidades as $localidade => $row) {

                        echo '<option value="' . $localidade . '">' . $localidade . '</option>';

                    }

                    echo '</select>';

                } else {

                    throw new Exception("[Erro 401] ao Buscar Informações de Localidade");

                }

            } catch (Exception $e) {

                throw new Exception("[Erro 400] na Transmissão de Informações Web ");
    
            }

            $conn->close();
            
            ?>

            <label for="txt_telemovelCliente">Telemóvel:</label>
            <input type="text" name="txt_telemovelCliente" id="telemovelCliente"> 
            <label for="txt_telefoneCliente">Telefone:</label>
            <input type="text" name="txt_telefoneCliente" id="telefoneCliente">   
            <label for="txt_emailCliente">Email:</label>
            <input type="email" name="txt_emailCliente" id="emailCliente">   

        </form>
    </div>
          
    <div class="subdiv2">
        <form action="fo2.php" method="post" id="form_subdiv2">
            <label for="txt_nifCliente">Nif:</label>
            <input type="text" name="txt_nifCliente" id="nifCliente" maxlength="9">   
            <label for="dd_statusCliente">Status:</label>
            <select name="dd_statusCliente" id="statusCliente">
                <option value="Normal">Normal</option>
                <option value="Aguarda">Aguarda</option>
                <option value="Urgente">Urgente</option>
                <option value="Retorno">Retorno</option>
            </select>
            <label for="dd_contratoCliente">Contrato:</label>
            <select name="dd_contratoCliente" id="dd_contratoCliente" onchange="showContratoFields()">
                <option value="Não">Não</option>
                <option value="Sim">Sim</option>
            </select>
        </form>
    </div>
         
    <div class="subdiv4">
        <form action="fo2.php" method="post" id="form_subdiv4">
            <label for="area_observacoes" id="label_observacoes">Observações:</label>
            <textarea name="area_observacoes" id="area_observacoes" cols="30" rows="5" maxlength="500"></textarea>
        </form>
    </div>
            
    <div class="subdiv5" id="contratoFields">
        <form action="fo2.php" method="post" id="form_subdiv5">
            <label for="dd_tipoContratoCliente">Tipo Contrato: </label>
            <select name="dd_tipoContratoCliente" id="dd_tipoContratoCliente" disabled>
                <option value="Tipo1">Tipo1</option>
                <option value="Tipo2">Tipo2</option>
            </select>
            <label for="txt_tempoTotalCliente">Tempo Total: </label>
            <input type="text" name="txt_tempoTotalCliente" id="tempoTotalCliente" readonly="true">
            <label for="txt_tempoExtraCliente">Tempo Extra:</label>
            <input type="text" name="txt_tempoExtraCliente" id="tempoExtraCliente" readonly="true">  
            <label for="dd_deslocacaoCliente" id="deslocacaoCliente">Deslocação:</label>
            <select name="dd_deslocacaoCliente" id="dd_deslocacaoCliente" disabled>
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
            </select>
        </form>
    </div> 

    <div class="subdiv6">
        <button id="enviarTodos">Salvar</button> 
        <button id="enviarTodos">Editar</button>       
        <button id="enviarTodos">Remover</button>       
    </div> 
</div>

<?php 

    include 'conexao.php';

        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['procuraCli']) && !empty($_GET['procuraCli'])) {

            $numCli = $_GET['procuraCli'];

            if ($numCli == "Não Encontrado") {

                echo "<script>document.getElementById('procuraCli').value = 'Não Encontrado';</script>";

            } else if ($numCli != "Não Encontrado" && !is_numeric($numCli)) {

                echo "<script>document.getElementById('procuraCli').value = 'Não Encontrado';</script>";

            } else {

                $sql2 = "SELECT * FROM TAB_CLIENTE WHERE N_CLIENTE = $numCli";
                $result2 = $conn->query($sql2);

                if ($result2->num_rows > 0) {

                    $dados = $result2->fetch_assoc();

                    echo "<script>document.getElementById('procuraCli').value = '$numCli';</script>";
                    echo "<script>document.getElementById('nCliente').value = '$numCli';</script>";
                    echo "<script>document.getElementById('nomeCliente').value = '" . $dados['NOME'] . "';</script>";
                    echo "<script>document.getElementById('moradaCliente').value = '" . $dados['MORADA'] . "';</script>";
                    echo "<script>document.getElementById('codPostalCliente').value = '" . $dados['CODIGO_POSTAL'] . "';</script>";

                    $sql3 = "SELECT NOME FROM TAB_LOCALIDADE WHERE ID = " . $dados['ID_LOCALIDADE'];
                    $result3 = $conn->query($sql3);

                    if ($result3->num_rows > 0) {

                        while ($row = $result3->fetch_assoc()) {

                            $dados['ID_LOCALIDADE'] = $row['NOME'];

                        }                      

                        echo "<script>document.getElementById('localidadeCliente').value = '" . $dados['ID_LOCALIDADE'] . "';</script>";
                        echo "<script>document.getElementById('telemovelCliente').value = '" . $dados['CONTACTO_M'] . "';</script>";
                        echo "<script>document.getElementById('telefoneCliente').value = '" . $dados['CONTACTO_F'] . "';</script>";
                        echo "<script>document.getElementById('emailCliente').value = '" . $dados['EMAIL'] . "';</script>";
                        echo "<script>document.getElementById('nifCliente').value = '" . $dados['NIF'] . "';</script>";
                        echo "<script>document.getElementById('statusCliente').value = '" . $dados['STATUS'] . "';</script>";
                        echo "<script>document.getElementById('area_observacoes').value = '" . $dados['OBSERVACOES'] . "';</script>";
                        
                        $sql4 = "SELECT * FROM TAB_CONTRATO WHERE ID = '" . $dados['ID_CONTRATO'] . "'";

                        $result4 = $conn->query($sql4);

                        if ($result4->num_rows > 0) {

                            echo "<script>document.getElementById('dd_contratoCliente').value = 'Sim';</script>";

                            echo "<script>
                                    var contratoSelect = document.getElementById('dd_contratoCliente');
                                    var contratoFields = document.getElementById('contratoFields');
                                    var inputs = contratoFields.querySelectorAll('input');
                                    var selects = contratoFields.querySelectorAll('select');

                                    if (contratoSelect.value === 'Sim') {
                                        inputs.forEach(function(input) {
                                            input.removeAttribute('readonly');
                                        });

                                        selects.forEach(function(select) {
                                            select.removeAttribute('disabled');
                                        });
                                    }
                                </script>";   
                                
                                while($row = $result4->fetch_assoc()) {

                                    echo "<script>document.getElementById('dd_tipoContratoCliente').value = '" . $row['TIPO_CONTRATO'] . "';</script>";
                                    echo "<script>document.getElementById('tempoTotalCliente').value = '" . $row['TEMPO_TOTAL'] . "';</script>";
                                    echo "<script>document.getElementById('tempoExtraCliente').value = '" . $row['TEMPO_EXTRA'] . "';</script>";
                                    echo "<script>document.getElementById('dd_deslocacaoCliente').value = '" . $row['DESLOCACAO'] . "';</script>";

                                }

                        } else {
      
                            echo "<script>document.getElementById('dd_contratoCliente').value = 'Não';</script>";

                        }

                    } 

                } else {

                    echo "<script>document.getElementById('procuraCli').value = 'Não Encontrado';</script>";

                }

            }

        }

    $conn->close();

?>

</section>

<script>

    document.getElementById("enviarTodos").addEventListener("click", function() {

        var forms = document.querySelectorAll("form"); 
        var formData = new FormData(); 

        forms.forEach(function(form) {

            var inputs = form.querySelectorAll("input, select, textarea"); 

            inputs.forEach(function(input) {

                formData.append(input.name, input.value); 

            });

        });

        window.location.href = "cliente_insert.php?" + new URLSearchParams(formData).toString();

    });

</script>

<script>

    document.getElementById("submit").addEventListener("click", function() {

        var forms = document.querySelectorAll("form"); 
        var formData = new FormData(); 

        forms.forEach(function(form) {

            var inputs = form.querySelectorAll("input"); 

            inputs.forEach(function(input) {

                formData.append(input.name, input.value); 

            });

        });

        window.location.href = "cliente.php?" + new URLSearchParams(formData).toString();

    });

</script>

<script>

    function redirect_cliente() {

        window.location.href = 'cliente.php';

    }

    function redirect_fo() {

        window.location.href = 'fo.php';

    }

    function showContratoFields() {

        var contratoSelect = document.getElementById("dd_contratoCliente");
        var contratoFields = document.getElementById("contratoFields");
        var inputs = contratoFields.querySelectorAll("input");
        var selects = contratoFields.querySelectorAll("select");

        if (contratoSelect.value === "Sim") {

            inputs.forEach(function(input) 
            {
                input.removeAttribute("readonly");

            });

            selects.forEach(function(select) 
            {
                select.removeAttribute("disabled");

            });

        } else {

            inputs.forEach(function(input) {

                input.setAttribute("readonly", "true");

            });

            selects.forEach(function(select) 
            {
                select.setAttribute("disabled", "true");

            });

        }

    }

</script>
</body>
</html>
