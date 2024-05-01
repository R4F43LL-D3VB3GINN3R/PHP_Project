<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/equipamentos.css">
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

    ?>

    <section class="layout">

    <?php //Menu Lateral...?>

    <div class="name2">
        <form action="equipamentos.php" id="form_name2" method="get" class="form_name2">
            <h2>Menu</h2>
            <button type="button" onclick='redirect_dashboard()' id="bt_dashboard">Dashboard</button>
            <button type="button" onclick='redirect_cliente()' id="bt_cliente">Cliente</button>
            <button type="button" onclick='redirect_fo()' id="bt_fo">Folhas de Obras</button>
            <button type="button" onclick='redirect_tecnicos()' id="bt_tecnicos">Técnicos</button>
            <h2>Equipamento</h2>
            <button type="button" onclick='redirect_equipamento()' id="bt_gerenciar">Gerenciar</button>
            <button id="bt_catalogo">Catálogo</button>
            <input type="hidden" name="nick" value="<?php echo $nick; ?>">
        </form>
    </div>

    <?php //Menu de Adicionar e Remover...?>

    <div class="name3">  

        <form action="equipamentos_insert.php" id="form3" method="post" name="form3">

            <div class="subdiv1">
                <label for="txt_tipo">Tipo</label>
                <input type="text" name="txt_tipo" id="tipo">
                <input type="hidden" name="nick" value="<?php echo $nick; ?>">
                <input type="submit" value="+" name="add_tipo" id="add">
                    
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
   
            </div>

            <div class="subdiv2">
                <label for="txt_marca">Marca</label>
                <input type="text" name="txt_marca">
                <input type="hidden" name="nick" value="<?php echo $nick; ?>">
                <input type="submit" value="+" id="add" name="add_marca">
                
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
          
            </div>

            <div class="subdiv3">
                <label for="txt_modelo">Modelo</label>
                <input type="text" name="txt_modelo">
                <input type="hidden" name="nick" value="<?php echo $nick; ?>">
                <input type="submit" value="+" id="add" name="add_modelo">
                
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

            </div>
    </section>

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
        window.location.href = 'cliente_listar.php?nick=' + nick;
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
