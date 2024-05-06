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
                        
                            include 'conexao.php';

                            $sql = "SELECT * FROM TAB_CATALOGO";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {


                                    echo "<tr>";
                                    echo "<td>" . $row['ID'] . "</td>";
                                    echo "<td>" . $row['NOME'] . "</td>";
                                    echo "<td>" . $row['DESCRICAO'] . "</td>";
                                    echo "<td>" . $row['PRECO'] . "</td>";
                                    echo "<td><form action='catalogo_gerenciamento.php' method='get'><input type='hidden' name='id_cat' value='" . $row['ID'] . "'><input type='submit' value='Editar' id='managecat'><input type='hidden' name='nick' value='" . $nick . "'></form></td>";
                                    echo "</tr>";
                                    

                                } 

                                echo "<tr>";
                                    echo "<td>" . "--" . "</td>";
                                    echo "<td>" . "--" . "</td>";
                                    echo "<td>" . "--" . "</td>";
                                    echo "<td>" . "--" . "</td>";
                                echo "<td><form action='catalogo_gerenciamento.php' method='get'><input type='submit' value='+' id='managecat'><input type='hidden' name='nick' value='" . $nick . "'></form></td>";
                                

                            }

                            $conn->close();

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
