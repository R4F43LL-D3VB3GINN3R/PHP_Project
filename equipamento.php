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
    <section class="layout">

    <?php //Menu Lateral...?>

    <div class="name2">
        <form action="equipamentos.php" id="form_name2" method="get">
            <h2>Procurar</h2>
            <input type="text" name="procuraCli" id="procuraCli">
            <input type="submit" value="Procurar Nº" id="submit">
            <button type="button" onclick='redirect_listar()'>Listar</button>
            <h2>Menu</h2>
            <button id="bt_dashboard">Dashboard</button>
            <button type="button" onclick='redirect_cliente()' id="bt_cliente">Cliente</button>
            <button type="button" onclick='redirect_fo()' id="bt_fo">Folhas de Obras</button>
            <h2>Equipamento</h2>
            <button type="button" onclick='redirect_equipamento()' id="bt_gerenciar">Gerenciar</button>
            <button id="bt_catalogo">Catálogo</button>
        </form>
    </div>

    <div class="name3">

        <div class="subdiv1">
            <form action="equipamentos_insert.php" id="form3" method="post" name="form3">
                <label for="txt_tipo">Tipo</label>
                <input type="text" name="txt_tipo" id="tipo">
                <input type="submit" value="+" name="add_tipo" id="add">
                
                <?php 
                
                    echo '<select name="dd_tipo" id="tipo">';

                    include 'conexao.php';

                    $sql = "SELECT NOME FROM TAB_TIPO";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {

                            echo '<option value=' . $row['NOME'] . '>' . $row['NOME'] . '</option>';

                        }

                    }
                    
                    echo '</select>';

                ?>

                <input type="submit" value="-" name="sub_tipo" id="sub">
                <label for="txt_marca">Marca</label>
                <input type="text" name="txt_marca">
                <input type="submit" value="+" id="add">
                <select name="" id="">
                    <option value=""></option>
                </select>
                <input type="submit" value="-" id="sub">
                <label for="txt_modelo">Modelo</label>
                <input type="text" name="txt_modelo">
                <input type="submit" value="+" id="add">
                <select name="" id="">
                    <option value=""></option>
                </select>
                <input type="submit" value="-" id="sub">
            </form>
        </div>

        <div class="subdiv2">
            <form action="" id="form3">

                <h2>Em Manutenção</h2>

            </form>
        </div>

    </div>   
    </section>

<script>

    //Funções de redirecionamento...

    function redirect_cliente() {

        window.location.href = 'cliente.php';

    }

    function redirect_fo() {

        window.location.href = 'fo.php';

    }

    function redirect_listar() {

        window.location.href = 'cliente_listar.php';

    }

    function redirect_equipamento() {

        window.location.href = 'equipamentos.php';

    }

</script>

</body>
</html>
