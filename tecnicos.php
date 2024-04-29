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

include 'permissoes.php';
access($nick);

?>

<section class="layout">

<?php //Menu Lateral...?>

<div class="name2">
    <form action="" id="form_name2">
        <h2>Procurar</h2>
        <input type="text" name="procuraTec" id="procuraTec">
        <input type="hidden" name="nick" value="<?php echo $nick; ?>">
        <input type="submit" value="Procurar Login" id="submit">
        <button type="button" onclick='redirect_listar()'>Listar</button>
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

<?php //Formulários de preenchimento...?>

<div class="name3">
    <div class="subdiv1">
        <form action="fo2.php" method="post" id="form_subdiv1">
            <label for="txt_nome">Nome: </label>
            <input type="text" name="txt_nome"id="nome">
            <label for="txt_email">Email:</label>
            <input type="text" name="txt_email" id="email"> 
            <label for="txt_contacto">Telemóvel:</label>
            <input type="text" name="txt_telemovel" id="telemovel">
        </form>
    </div>   

    <div class="subdiv2">
        <form action="fo2.php" method="post" id="form_subdiv2">
            <label for="txt_login">Login:</label>
            <input type="text" name="txt_login" id="login">
            <label for="txt_senha">Senha: </label>
            <input type="text" name="txt_senha" id="senha">    
        </form>
    </div>

    <div class="subdiv3">
        <form action="fo2.php" method="post" id="form_subdiv2">
            <label for="dd_admin">Admin:</label>
            <select name="dd_admin" id="admin">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
            <label for="dd_status">Status:</label>
            <select name="dd_status" id="status">
                <option value="Ativo">Ativo</option>
                <option value="Inativo">Inativo</option>
            </select>
        </form>
    </div>

    <div class="subdiv6">
        <button id="enviarTodos">Cadastrar</button> 
        <button id="enviarTodos_edit">Editar</button>            
    </div> 
</div>

<?php 

    // Ao clicar no botão procurar, enviamos os dados do formulário para esta mesma página por método GET...

    include 'conexao.php';

    // Verifica o método e se algum número foi enviado...

    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['procuraTec']) && !empty($_GET['procuraTec'])) {

        $numTec = $_GET['procuraTec']; // Variável para receber o número enviado...

        if ($numTec == "Não Encontrado") { //Se no input tiver escrito Não encontrado...

            //Inserimos o valor de Não encontrado no input...

            echo "<script>document.getElementById('procuraTec').value = 'Não Encontrado';</script>";

            //Se for escrito qualquer coisa que não seja um número...

        } else if ($numTec != "Não Encontrado" && is_numeric($numTec)) {

            //Inserimos o valor de Não encontrado no input...

            echo "<script>document.getElementById('procuraTec').value = 'Não Encontrado';</script>";

            //Se for enviado um valor numérico podemos iniciar a consulta...

        } else {

            //Consulta se o número do cliente existe na tabela...

            $sql2 = "SELECT * FROM TAB_TECNICO WHERE NICK = '$numTec'";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) { //Se o número for encontrado...

                $dados = $result2->fetch_assoc(); //Insere a linha da consulta no vetor...

                //Insere valores nos campos...

                echo "<script>document.getElementById('procuraTec').value = '$numTec';</script>";
                echo "<script>document.getElementById('nome').value = '" . $dados['NOME'] . "';</script>";
                echo "<script>document.getElementById('email').value = '" . $dados['PASS'] . "';</script>";
                echo "<script>document.getElementById('telemovel').value = '" . $dados['CONTACTO'] . "';</script>";
                echo "<script>document.getElementById('login').value = '" . $dados['NICK'] . "';</script>";
                echo "<script>document.getElementById('senha').value = '" . $dados['PASS'] . "';</script>";
                echo "<script>document.getElementById('admin').value = '" . $dados['IS_ADMIN'] . "';</script>";
                echo "<script>document.getElementById('status').value = '" . $dados['APAGADO'] . "';</script>";

            } else {

                echo "<script>document.getElementById('procuraTec').value = 'Não Encontrado';</script>";

            }

        }

    }

    $conn->close();

?>

</section>

<script>

    //Envio de formulários para inserir clientes...

    var nick = '<?php echo $nick; ?>';

    document.getElementById("enviarTodos").addEventListener("click", function() {

        var forms = document.querySelectorAll("form"); 
        var formData = new FormData(); 

        forms.forEach(function(form) {

            var inputs = form.querySelectorAll("input, select"); 

            inputs.forEach(function(input) {

                formData.append(input.name, input.value); 

            });

        });

        var serializedFormData = new URLSearchParams(formData).toString();

        var url = "tecnicos_insert.php?" + serializedFormData + "&nick=" + nick;

        window.location.href = url;

    });

</script>

<script>

    //Envio de formulários para esta página...

    var nick = '<?php echo $nick; ?>';

    document.getElementById("submit").addEventListener("click", function() {

        var forms = document.querySelectorAll("form"); 
        var formData = new FormData(); 

        forms.forEach(function(form) {

            var inputs = form.querySelectorAll("input"); 

            inputs.forEach(function(input) {

                formData.append(input.name, input.value); 

            });

        });

        var serializedFormData = new URLSearchParams(formData).toString();

        var url = "tecnicos.php?" + serializedFormData + "&nick=" + nick;

        window.location.href = url;

    });

</script>

<script>

    //Envio de formulários para edição de clientes.

    var nick = '<?php echo $nick; ?>';

    document.getElementById("enviarTodos_edit").addEventListener("click", function() {

        var forms = document.querySelectorAll("form"); 
        var formData = new FormData(); 

        forms.forEach(function(form) {

            var inputs = form.querySelectorAll("input, select, textarea"); 

            inputs.forEach(function(input) {

                formData.append(input.name, input.value); 

            });

        });

        var serializedFormData = new URLSearchParams(formData).toString();

        var url = "tecnicos_edited.php?" + serializedFormData + "&nick=" + nick;

        window.location.href = url;

    });

</script>

<script>

    //Funções de redirecionamento...

    var nick = '<?php echo $nick; ?>';

    function redirect_cliente() {
        window.location.href = 'cliente.php?nick=' + nick;
    }

    function redirect_fo() {
        window.location.href = 'fo.php?nick=' + nick;
    }

    function redirect_listar() {
        window.location.href = 'tecnicos_listar.php?nick=' + nick;
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
