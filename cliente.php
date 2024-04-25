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
        <input type="text" name="procura_fo" value="Nº Cliente">
        <input type="submit" value="Procurar" id="submit">
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
            <input type="number" name="txt_n_cliente" maxlength="10">
            <label for="txt_nomeCliente">Nome: </label>
            <input type="text" name="txt_nomeCliente">
            <label for="txt_moradaCliente">Morada:</label>
            <input type="text" name="txt_moradaCliente">  
            <label for="txt_codPostalCliente">Cod Postal:</label>
            <input type="text" name="txt_codPostalCliente" maxlength="8">  
        </form>
    </div>   
       
    <div class="subdiv2">
        <form action="fo2.php" method="post" id="form_subdiv2">

            <label for="dd_localidadeCliente">Localidade: </label>

            <?php 
            
            include 'conexao.php';

            $sql = "SELECT NOME FROM TAB_LOCALIDADE";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                $localidades = array();

                while($row = $result->fetch_assoc()) {

                    $localidades[$row['NOME']] = $row;

                }

                echo '<select name="dd_localidadeCliente" id="dd_tecnico">';

                foreach ($localidades as $localidade => $row) {

                    echo '<option value="' . $localidade . '">' . $localidade . '</option>';

                }

                echo '</select>';

            } else {

                throw new Exception("[Erro 401] ao Buscar Informações de Localidade");

            }

            $conn->close();
            
            ?>

            <label for="txt_telemovelCliente">Telemóvel:</label>
            <input type="text" name="txt_telemovelCliente"> 
            <label for="txt_telefoneCliente">Telefone:</label>
            <input type="text" name="txt_telefoneCliente">   
            <label for="txt_emailCliente">Email:</label>
            <input type="email" name="txt_emailCliente">   
        </form>
    </div>
          
    <div class="subdiv2">
        <form action="fo2.php" method="post" id="form_subdiv2">
            <label for="txt_nifCliente">Nif:</label>
            <input type="text" name="txt_nifCliente" maxlength="9">   
            <label for="dd_statusCliente">Status:</label>
            <select name="dd_statusCliente" id="dd_statusCliente">
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
            <input type="text" name="txt_tempoTotalCliente" readonly="true">
            <label for="txt_tempoExtraCliente">Tempo Extra:</label>
            <input type="text" name="txt_tempoExtraCliente" readonly="true">  
            <label for="dd_deslocacaoCliente">Deslocação:</label>
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

</section>

<script>
    // Adiciona um evento de clique para o botão "Enviar Todos"
    document.getElementById("enviarTodos").addEventListener("click", function() {
        var forms = document.querySelectorAll("form"); // Seleciona todos os formulários na página
        var formData = new FormData(); // Cria um objeto FormData para armazenar os dados

        // Loop através de todos os formulários
        forms.forEach(function(form) {
            var inputs = form.querySelectorAll("input, select, textarea"); // Seleciona todos os campos de entrada no formulário

            // Loop através de todos os campos de entrada no formulário atual
            inputs.forEach(function(input) {
                formData.append(input.name, input.value); // Adiciona o nome e o valor de cada campo de entrada ao objeto FormData
            });
        });

        // Redireciona para a página fo2.php com os dados passados via URL
        window.location.href = "cliente_insert.php?" + new URLSearchParams(formData).toString();
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

        // Se o contrato estiver selecionado
        if (contratoSelect.value === "Sim") {
            // Habilita os campos
            inputs.forEach(function(input) {
                input.removeAttribute("readonly");
            });
            selects.forEach(function(select) {
                select.removeAttribute("disabled");
            });
        } else {
            // Desabilita os campos
            inputs.forEach(function(input) {
                input.setAttribute("readonly", "true");
            });
            selects.forEach(function(select) {
                select.setAttribute("disabled", "true");
            });
        }
    }
</script>

</body>
</html>
