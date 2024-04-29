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
        <input type="text" name="procura_fo">
        <button type="button">Procurar Nº</button>
        <button type="button" id="listar_fo" onclick='redirect_listar()'>Listar</button>
        <h2>Menu</h2>
        <button id="bt_dashboard">Dashboard</button>
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
            <select name="dd_orcamento" id="dd_orcamento">
                <option value="orcamento">Orçamento</option>
            </select>    
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
            <textarea name="area_avaria_servicos" id="area_avaria_servicos" cols="30" rows="5"></textarea>
            <label for="area_acessorios" id="label_acessorios">Acessórios Usados:</label>
            <textarea name="area_acessorios" id="area_acessorios" cols="30" rows="5"></textarea>
        </form>
    </div>
         
    <div class="subdiv4">
        <form action="fo2.php" method="post" id="form_subdiv4">
            <label for="area_observacoes" id="label_observacoes">Observações:</label>
            <textarea name="area_observacoes" id="area_observacoes" cols="30" rows="5"></textarea>
            <label for="area_estado" id="label_estado">Avaliação Equip:</label>
            <textarea name="area_estado" id="area_estado" cols="30" rows="5"></textarea>
        </form>
    </div>
            
    <div class="subdiv5">
        <form action="fo2.php" method="post" id="form_subdiv5">
            <label for="txt_ticket">Nº Ticket:</label>
            <input type="text" name="txt_ticket">
            <label for="txt_requerimento">Nº Requisição:</label>
            <input type="number" name="txt_requerimento">
            <label for="txt_numero_serie">Nº Série:</label>
            <input type="text" name="txt_numero_serie" id="txt_numero_serie">
            <button type="button" id="bt_gen" onclick='generatenum()'>Gerar</button>
        </form>
    </div> 

    <div class="subdiv5">
        <button id="enviarTodos">Inserir</button>       
    </div> 

</div>
</section>

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

    document.getElementById('txt_numero_serie').value = serialNumber;

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
        window.location.href = 'cliente_listar.php?nick=' + nick;
    }

    function redirect_equipamento() {
        window.location.href = 'equipamentos.php?nick=' + nick;
    }

    function redirect_tecnicos() {
        window.location.href = 'tecnicos.php?nick=' + nick;
    }

</script>

</body>
</html>
