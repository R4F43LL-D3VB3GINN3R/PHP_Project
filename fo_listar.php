<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/fo_listar.css">
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
    <form action="fo.php" id="form_name2" method="get">
        <h2>Procurar</h2>
        <input type="text" name="procura_fo" id="procura_fo">
        <input type="hidden" name="nick" value="<?php echo $nick; ?>">
        <input type="submit" value="Procurar Nº Série" id="submit">
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
        <form action="" id="form3">

            <?php 
            
                include 'conexao.php';

                //Consultar todos os dados de clientes e os nomes dos lugares
                //relacionando-os com o id da localidade...

                // Consultar todos os dados de folhas de obra (FO) e fazer junções para obter nomes em vez de IDs
                $sql = "SELECT 
                fo.ID, 
                c.NOME AS cliente_nome, 
                t.NICK AS tecnico_nick, 
                tipo.NOME AS tipo_nome, 
                marca.NOME AS marca_nome, 
                modelo.NOME AS modelo_nome,
                estado.NOME AS estado_nome,
                fo.N_SERIE,
                fo.CRIACAO_DATA,
                fo.TICKET
                FROM TAB_FO fo
                JOIN TAB_CLIENTE c ON fo.ID_CLIENTE = c.ID
                JOIN TAB_TECNICO t ON fo.ID_TECNICO = t.ID
                JOIN TAB_TIPO tipo ON fo.ID_TIPO = tipo.ID
                JOIN TAB_MARCA marca ON fo.ID_MARCA = marca.ID
                JOIN TAB_MODELO modelo ON fo.ID_MODELO = modelo.ID
                JOIN TAB_ESTADO estado ON fo.ID_ESTADO = estado.ID";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    echo "<table border='1'>";
                    echo "<tr>
                    <th>Cliente</th>
                    <th>Técnico</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Nº Série</th>
                    <th>Data</th>
                    <th>Ticket</th>
                    <th>Estado</th>
                    </tr>";

                    while($row = $result->fetch_assoc()) {
                        
                        echo "<tr>";
                        echo "<td>{$row['cliente_nome']}</td>";
                        echo "<td>{$row['tecnico_nick']}</td>";
                        echo "<td>{$row['tipo_nome']}</td>";
                        echo "<td>{$row['marca_nome']}</td>";
                        echo "<td>{$row['modelo_nome']}</td>";
                        echo "<td>{$row['N_SERIE']}</td>";
                        echo "<td>{$row['CRIACAO_DATA']}</td>";
                        echo "<td>{$row['TICKET']}</td>";
                        echo "<td>{$row['estado_nome']}</td>";
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
        window.location.href = 'fo_listar.php?nick=' + nick;
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
