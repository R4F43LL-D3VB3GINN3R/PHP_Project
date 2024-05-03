<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/fo.css">
    <title>Folhas de Obras</title>
</head>
<body>

<?php 

$nick = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o nick foi enviado por POST
    if(isset($_POST['nick'])){
        $nick = $_POST['nick'];
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Verifica se o nick foi enviado por GET
    if(isset($_GET['nick'])){
        $nick = $_GET['nick'];
    }
}

?>

<section class="layout">

<?php //Menu de barra lateral...?>

<div class="name2">
    <form action="" id="form_name2">
        <h2>Procurar</h2>
        <input type="text" name="procura_fo" id="procura_fo">
        <input type="hidden" name="nick" value="<?php echo $nick; ?>">
        <input type="submit" value="Procurar Nº Série" id="submit">
        <button type="button" id="listar_fo" onclick='redirect_listar()'>Listar</button>
        <h2>Menu</h2>
        <button type="button" onclick='redirect_dashboard()' id="bt_dashboard">Dashboard</button>
        <button type="button" onclick='redirect_cliente()' id="bt_cliente">Cliente</button>
        <button type="button" onclick='redirect_fo()' id="bt_fo">Folhas de Obras</button>
        <button type="button" onclick='redirect_tecnicos()' id="bt_tecnicos">Técnicos</button>
        <h2>Equipamento</h2>
        <button type="button" onclick='redirect_equipamento()' id="bt_gerenciar">Gerenciar</button>
        <button id="bt_catalogo">Catálogo</button>
    </form>
</div>

<div class="name3">
    <div class="subdiv1">
        <form action="fo2.php" method="get" id="form_subdiv1">
            <label for="txt_cliente">Cliente: </label>
            
            <?php 
                
                echo '<select name="dd_cliente" id="cliente">';

                include 'conexao.php';

                $sql = "SELECT NOME FROM TAB_CLIENTE";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        echo '<option value="' . $row['NOME'] . '">' . $row['NOME'] . '</option>';

                    }

                }
                
                echo '</select>';
                

                $conn->close();

            ?>

            <label for="dd_tecnico">Atribuir: </label>
            
            <?php 
                
                echo '<select name="dd_tecnico" id="tecnico">';

                include 'conexao.php';

                $sql = "SELECT NICK FROM TAB_TECNICO";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        echo '<option value="' . $row['NICK'] . '">' . $row['NICK'] . '</option>';

                    }

                }
                
                echo '</select>';

                $conn->close();

            ?>

            <label for="dd_orcamento">Orçamento:</label>
            <input type="text" id="dd_orcamento" name="dd_orcamento" value="0.00">

            <label for="dd_estado">Estado FO:</label>
            
            <?php 
                
                echo '<select name="dd_estado" id="estado">';

                include 'conexao.php';

                $sql = "SELECT NOME FROM TAB_ESTADO";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        echo '<option value="' . $row['NOME'] . '">' . $row['NOME'] . '</option>';

                    }

                }
                
                echo '</select>';

                $conn->close();

                ?>

        </form>
    </div>   
       
    <div class="subdiv2">
        <form action="fo2.php" method="post" id="form_subdiv2">
            <label for="dd_equipamento">Tipo Equip:</label>
            
            <?php 
                
                echo '<select name="dd_tipo" id="tipo">';

                include 'conexao.php';

                $sql = "SELECT NOME FROM TAB_TIPO";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        echo '<option value="' . $row['NOME'] . '">' . $row['NOME'] . '</option>';

                    }

                }
                
                echo '</select>';

                $conn->close();

                ?>

            <label for="dd_marca">Marca Equip:</label>
            
            <?php 
                
                echo '<select name="dd_marca" id="marca">';

                include 'conexao.php';

                $sql = "SELECT NOME FROM TAB_MARCA";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        echo '<option value="' . $row['NOME'] . '">' . $row['NOME'] . '</option>';

                    }

                }
                
                echo '</select>';

                $conn->close();

                ?>

            <label for="dd_modelo">Modelo Equip:</label>
            
            <?php 
                
                echo '<select name="dd_modelo" id="modelo">';

                include 'conexao.php';

                $sql = "SELECT NOME FROM TAB_MODELO";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        echo '<option value="' . $row['NOME'] . '">' . $row['NOME'] . '</option>';

                    }

                }
                
                echo '</select>';

                $conn->close();

                ?>

        </form>
    </div>
          
    <div class="subdiv3">
        <form action="fo2.php" method="post" id="form_subdiv3">
            <label for="area_avaria_servicos" id="label_avaria">Avaria/Serviços:</label>
            <textarea name="area_avaria_servicos" id="avaria_servicos" cols="30" rows="5"></textarea>
            <label for="area_acessorios" id="label_acessorios">Acessórios Usados:</label>
            <textarea name="area_acessorios" id="acessorios" cols="30" rows="5"></textarea>
        </form>
    </div>
         
    <div class="subdiv4">
        <form action="fo2.php" method="post" id="form_subdiv4">
            <label for="area_observacoes" id="label_observacoes">Observações:</label>
            <textarea name="area_observacoes" id="observacoes" cols="30" rows="5"></textarea>
            <label for="area_estado" id="label_estado">Avaliação Equip:</label>
            <textarea name="area_estado" id="equip_estado" cols="30" rows="5"></textarea>
        </form>
    </div>
            
    <div class="subdiv5">
        <form action="fo2.php" method="post" id="form_subdiv5">
            <label for="txt_ticket">Nº Ticket:</label>
            <input type="text" name="txt_ticket" id="ticket">
            <label for="txt_requerimento">Nº Requisição:</label>
            <input type="number" name="txt_requerimento" id="requerimento">
            <label for="txt_numero_serie">Nº Série:</label>
            <input type="text" name="txt_numero_serie" id="numero_serie">
            <button type="button" id="bt_gen" onclick='generatenum()'>Gerar</button>
        </form>
    </div> 

    <div class="subdiv5">
        <button id="enviarTodos">Inserir</button>   
        <button id="enviarTodos_editar">Alterar</button>  
        <button id="enviarTodos_producao">Produção</button>       
    </div> 

</div>

<?php 

    // Ao clicar no botão procurar, enviamos os dados do formulário para esta mesma página por método GET...

    include 'conexao.php';

    // Verifica o método e se algum número foi enviado...

    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['procura_fo']) && !empty($_GET['procura_fo'])) {

        $num_serie = $_GET['procura_fo']; // Variável para receber o número enviado...

        if ($num_serie == "Não Encontrado") { //Se no input tiver escrito Não encontrado...

            //Inserimos o valor de Não encontrado no input...

            echo "<script>document.getElementById('procura_fo').value = 'Não Encontrado';</script>";

            //Se for escrito qualquer coisa que não seja um número...

        } else if ($num_serie != "Não Encontrado" && is_numeric($num_serie)) {

            //Inserimos o valor de Não encontrado no input...

            echo "<script>document.getElementById('procura_fo').value = 'Não Encontrado';</script>";

            //Se for enviado um valor numérico podemos iniciar a consulta...

        } else {

            //Consulta se o número do cliente existe na tabela...

            $sql2 = "SELECT * FROM TAB_FO WHERE N_SERIE = '$num_serie'";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) { //Se o número for encontrado...

                $dados = $result2->fetch_assoc(); //Insere a linha da consulta no vetor...

                //Insere valores nos campos...

                echo "<script>document.getElementById('procura_fo').value = '$num_serie';</script>";
                echo "<script>document.getElementById('numero_serie').value = '$num_serie';</script>";
                echo "<script>document.getElementById('requerimento').value = '" . $dados['REQUISICAO'] . "';</script>";
                echo "<script>document.getElementById('ticket').value = '" . $dados['TICKET'] . "';</script>";
                echo "<script>document.getElementById('avaria_servicos').value = '" . $dados['AVARIA_SERVICOS'] . "';</script>";
                echo "<script>document.getElementById('acessorios').value = '" . $dados['ACESSORIOS'] . "';</script>";
                echo "<script>document.getElementById('observacoes').value = '" . $dados['OBSERVACOES'] . "';</script>";
                echo "<script>document.getElementById('equip_estado').value = '" . $dados['ESTADO_AVALIACAO'] . "';</script>";              

                $sql = "SELECT c.NOME AS cliente_nome, t.NICK AS tecnico_nome, tipo.NOME AS tipo_nome, marca.NOME AS marca_nome, modelo.NOME AS modelo_nome, estado.NOME AS estado_nome
                FROM TAB_CLIENTE c
                JOIN TAB_TECNICO t ON t.ID = '" . $dados['ID_TECNICO'] . "'
                JOIN TAB_TIPO tipo ON tipo.ID = '" . $dados['ID_TIPO'] . "'
                JOIN TAB_MARCA marca ON marca.ID = '" . $dados['ID_MARCA'] . "'
                JOIN TAB_MODELO modelo ON modelo.ID = '" . $dados['ID_MODELO'] . "'
                JOIN TAB_ESTADO estado ON estado.ID = '" . $dados['ID_ESTADO'] . "'
                WHERE c.ID = '" . $dados['ID_CLIENTE'] . "'";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {

                        $nome_cliente = $row['cliente_nome'];
                        $nome_tecnico = $row['tecnico_nome'];
                        $nome_tipo = $row['tipo_nome'];
                        $nome_marca = $row['marca_nome'];
                        $nome_modelo = $row['modelo_nome'];
                        $nome_estado = $row['estado_nome'];

                    }                   

                    echo "<script>document.getElementById('cliente').value = '" . $nome_cliente . "';</script>";
                    echo "<script>document.getElementById('tecnico').value = '$nome_tecnico';</script>";
                    echo "<script>document.getElementById('tipo').value = '$nome_tipo';</script>";
                    echo "<script>document.getElementById('marca').value = '$nome_marca';</script>";
                    echo "<script>document.getElementById('modelo').value = '$nome_modelo';</script>";
                    echo "<script>document.getElementById('estado').value = '$nome_estado';</script>";

                } else {

                    echo 'erro';

                }

            } else {

                echo "<script>document.getElementById('procura_fo').value = 'Não Encontrado';</script>";

            }

        }

    }

    $conn->close();

?>

</section>

<script>

    var nick = '<?php echo $nick; ?>';

    document.getElementById("enviarTodos_producao").addEventListener("click", function() {

        var forms = document.querySelectorAll("form"); 
        var formData = new FormData(); 

        forms.forEach(function(form) {

            var inputs = form.querySelectorAll("input, select, textarea");

            inputs.forEach(function(input) {

                formData.append(input.name, input.value); 

            });

        });

        var serializedFormData = new URLSearchParams(formData).toString();

        var url = "producao.php?" + serializedFormData + "&nick=" + nick;

        window.location.href = url;

    });

</script>

<script>

    var nick = '<?php echo $nick; ?>';

    document.getElementById("submit").addEventListener("click", function() {

        var forms = document.querySelectorAll("form"); 
        var formData = new FormData(); 

        forms.forEach(function(form) {

            var inputs = form.querySelectorAll("input, select, textarea");

            inputs.forEach(function(input) {

                formData.append(input.name, input.value); 

            });

        });

        var serializedFormData = new URLSearchParams(formData).toString();

        var url = "fo.php?" + serializedFormData + "&nick=" + nick;

        window.location.href = url;

    });

</script>

<script>

    var nick = '<?php echo $nick; ?>';

    document.getElementById("enviarTodos").addEventListener("click", function() {

        var forms = document.querySelectorAll("form"); 
        var formData = new FormData(); 

        forms.forEach(function(form) {

            var inputs = form.querySelectorAll("input, select, textarea");

            inputs.forEach(function(input) {

                formData.append(input.name, input.value); 

            });

        });

        var serializedFormData = new URLSearchParams(formData).toString();

        var url = "fo_insert.php?" + serializedFormData + "&nick=" + nick;

        window.location.href = url;

    });

</script>

<script>

    var nick = '<?php echo $nick; ?>';

    document.getElementById("enviarTodos_editar").addEventListener("click", function() {

        var forms = document.querySelectorAll("form"); 
        var formData = new FormData(); 

        forms.forEach(function(form) {

            var inputs = form.querySelectorAll("input, select, textarea");

            inputs.forEach(function(input) {

                formData.append(input.name, input.value); 

            });

        });

        var serializedFormData = new URLSearchParams(formData).toString();

        var url = "fo_edited.php?" + serializedFormData + "&nick=" + nick;

        window.location.href = url;

    });

</script>

<script>

function generateRandomNumber(min, max) {

    return Math.floor(Math.random() * (max - min + 1)) + min;

}

function generateSerialNumber(length) {

    var charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    var serialNumber = '';

    for (var i = 0; i < length; i++) {

        var randomIndex = generateRandomNumber(0, charset.length - 1);
        serialNumber += charset[randomIndex];

    }

    return serialNumber;

}

function generatenum() {

    var serialNumber = generateSerialNumber(10); 

    document.getElementById('numero_serie').value = serialNumber;

}

</script>

<script>

var nick = '<?php echo $nick; ?>';

    function redirect_cliente() {
        window.location.href = 'cliente.php?nick=' + nick;
    }

    function redirect_fo() {
        window.location.href = 'fo.php?nick=' + nick;
    }

    function redirect_listar() {
        window.location.href = 'fo_listar.php?nick=' + nick;
    }

    function redirect_equipamento() {
        window.location.href = 'equipamentos.php?nick=' + nick;
    }

    function redirect_tecnicos() {
        window.location.href = 'tecnicos.php?nick=' + nick;
    }

    function redirect_dashboard() {
        window.location.href = 'dashboard.php?nick=' + nick;
    }

</script>

</body>
</html>
