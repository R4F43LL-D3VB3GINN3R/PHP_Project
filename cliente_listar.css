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
            <button type="button" id="bt_gerenciar">Gerenciar</button>
            <button id="bt_catalogo">Catálogo</button>
        </form>
    </div>

    <div class="name3">
        <form action="" id="form3">

            <?php 
            
                include 'conexao.php';

                $sql = "SELECT c.*, l.NOME AS NOME_LOCALIDADE
                FROM TAB_CLIENTE c
                INNER JOIN TAB_LOCALIDADE l ON c.ID_LOCALIDADE = l.ID;";
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

                }
            
            ?>

        </form>
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
