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
        <form action="cliente.php" id="form_name2" method="get">
            <h2>Procurar</h2>
            <input type="text" name="procuraCli" id="procuraCli">
            <input type="hidden" name="nick" value="<?php echo $nick; ?>">
            <input type="submit" value="Procurar Nº" id="submit">
            <button type="button" onclick='redirect_listar()'>Listar Todos</button>
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
        <form action="" id="form3">

            <?php 
            
                include 'conexao.php';

                //Consultar todos os dados de clientes e os nomes dos lugares
                //relacionando-os com o id da localidade...

                $sql = "SELECT c.*, l.NOME AS NOME_LOCALIDADE
                        FROM TAB_CLIENTE c
                        INNER JOIN TAB_LOCALIDADE l ON c.ID_LOCALIDADE = l.ID
                        WHERE c.STATUS <> 'Finalizado'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    $clientes = array();

                    while($row = $result->fetch_assoc()) {

                        $clientes[] = $row;
                    }

                    echo "<table border='0'>";
                    echo "<tr>
                            <th>Nº Cliente</th>
                            <th>NIF</th>
                            <th>Nome</th>
                            <th>Morada</th>
                            <th>Localidade</th>
                            <th>Contacto Móvel</th>
                            <th>Data de Criação</th>
                            <th>ID Contrato</th>
                            <th>Status</th>
                        </tr>";

                    //Percorre o vetor e injeta cada coluna na coluna da tabela html...

                    foreach ($clientes as $cliente) {

                        echo "<tr>";
                        echo "<td>{$cliente['N_CLIENTE']}</td>";
                        echo "<td>{$cliente['NIF']}</td>";
                        echo "<td>{$cliente['NOME']}</td>";
                        echo "<td>{$cliente['MORADA']}</td>";
                        echo "<td>{$cliente['NOME_LOCALIDADE']}</td>";
                        echo "<td>{$cliente['CONTACTO_M']}</td>";
                        echo "<td>{$cliente['CRIADO_DATA']}</td>";
                        echo "<td>{$cliente['ID_CONTRATO']}</td>";
                        echo "<td>{$cliente['STATUS']}</td>";
                        echo "</tr>";

                    }

                    echo "</table>";

                } else {

                    throw new Exception("[Erro] na consulta ao banco de dados.");

                }
            
            ?>

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
        window.location.href = 'cliente_listar_ativos.php?nick=' + nick;
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
