<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/catalogo.css">
    <title>Catálogo</title>
</head>
<body>

    <?php 

    $nick = '';

    require_once 'classes/main_class.php';
    require_once 'classes/catalogo_class.php';
    
    $Main = new main();
    $Catalogo = new catalogo();

    $nick = $Main->recebeNick('nick');

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
                <button type="button" onclick='redirect_catalogo()' id="bt_catalogo">Catálogo</button>
                <input type="hidden" name="nick" value="<?php echo $nick; ?>">
            </form>
        </div>

        <?php //Menu de Adicionar e Remover...?>

        <div class="name3">  
            <form action="catalogo_gerenciamento.php" id="form_name3" method="get" name="form3" class="form3">

                <table>
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Gerenciar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php         

                            $Catalogo->displayCatalogo($nick);                   

                        ?>

                    </tbody>
                </table>

            </form>
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

    function redirect_catalogo() {
        window.location.href = 'catalogo.php?nick=' + nick;
    }

</script>

</body>
</html>
