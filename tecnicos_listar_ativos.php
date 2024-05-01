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
        <form action="tecnicos.php" id="form_name2" method="get">
            <h2>Procurar</h2>
            <input type="text" name="procuraTec" id="procuraTec">
            <input type="hidden" name="nick" value="<?php echo $nick; ?>">
            <input type="submit" value="Procurar Login" id="submit">
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

                $sql = "SELECT * FROM TAB_TECNICO WHERE IS_ADMIN = 'N' AND APAGADO = 'Ativo'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    $tecnicos = array();

                    while($row = $result->fetch_assoc()) {

                        $tecnicos[] = $row;
                    }

                    echo "<table border='0'>";
                    echo "<tr>
                            <th>Nome</th>
                            <th>Nick</th>
                            <th>Email</th>
                            <th>Telemóvel</th>
                            <th>Senha</th>
                            <th>Status</th>
                        </tr>";

                    //Percorre o vetor e injeta cada coluna na coluna da tabela html...

                    foreach ($tecnicos as $tecnico) {

                        echo "<tr>";
                        echo "<td>{$tecnico['NOME']}</td>";
                        echo "<td>{$tecnico['NICK']}</td>";
                        echo "<td>{$tecnico['EMAIL']}</td>";
                        echo "<td>{$tecnico['CONTACTO']}</td>";
                        echo "<td>{$tecnico['PASS']}</td>";
                        echo "<td>{$tecnico['APAGADO']}</td>";
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
        window.location.href = 'tecnicos_listar.php?nick=' + nick;
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
