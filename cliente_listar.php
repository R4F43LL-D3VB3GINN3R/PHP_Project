<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/cliente_listar.css">
    <title>Clientes</title>
</head>
<body>
    <section class="layout">

    <?php //Menu Lateral...?>

    <div class="name2">
        <form action="cliente.php" id="form_name2" method="get">
            <h2>Procurar</h2>
            <input type="text" name="procuraCli" id="procuraCli">
            <input type="submit" value="Procurar Nº" id="submit">
            <button type="button" onclick='redirect_listar()'>Listar</button>
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

</script>

</body>
</html>
