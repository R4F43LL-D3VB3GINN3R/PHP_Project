<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/dashboard.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
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
        <div class="top">
            <button type="button" onclick='redirect()' id="bt_back">Voltar</button>
        </div>
        <div class="body1"> 
            <h2>Reparação/Serviço</h2>    

            <?php 
            
                include 'conexao.php';

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
                JOIN TAB_ESTADO estado ON fo.ID_ESTADO = estado.ID
                WHERE ID_ESTADO = 1";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    echo "<table border='1'>";
                    echo "<tr>
                    <th>Cliente</th>
                    <th>Técnico</th>
                    <th>Data/Hr</th>
                    </tr>";

                    while($row = $result->fetch_assoc()) {
                        
                        echo "<tr>";
                        echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}&nick={$nick}'>{$row['cliente_nome']}</a></td>";
                        echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}&nick={$nick}'>{$row['tecnico_nick']}</a></td>";
                        echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}&nick={$nick}'>{$row['CRIACAO_DATA']}</a></td>";
                        echo "</tr>";
                    }

                echo "</table>";

                } else {

                    throw new Exception("[Erro] na consulta ao banco de dados.");

                }
            
            ?>

        </div>
        <div class="body2">
        <h2>Orçamentar/Orçamentado</h2>    

        <?php 
            
            include 'conexao.php';

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
            JOIN TAB_ESTADO estado ON fo.ID_ESTADO = estado.ID
            WHERE ID_ESTADO = 2 or ID_ESTADO = 3";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                echo "<table border='1'>";
                echo "<tr>
                <th>Cliente</th>
                <th>Técnico</th>
                <th>Data/Hr</th>
                </tr>";

                while($row = $result->fetch_assoc()) {
                    
                    echo "<tr>";
                    echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}&nick={$nick}'>{$row['cliente_nome']}</a></td>";
                    echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}&nick={$nick}'>{$row['tecnico_nick']}</a></td>";
                    echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}&nick={$nick}'>{$row['CRIACAO_DATA']}</a></td>";
                    echo "</tr>";
                }

            echo "</table>";

            } else {

                throw new Exception("[Erro] na consulta ao banco de dados.");

            }
        
        ?>

        </div>
        <div class="body3">
        <h2>Aguarda Mat/Requisição</h2>    
        <?php 
            
            include 'conexao.php';

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
            JOIN TAB_ESTADO estado ON fo.ID_ESTADO = estado.ID
            WHERE ID_ESTADO = 4";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                echo "<table border='1'>";
                echo "<tr>
                <th>Cliente</th>
                <th>Técnico</th>
                <th>Data/Hr</th>
                </tr>";

                while($row = $result->fetch_assoc()) {
                    
                    echo "<tr>";
                    echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}&nick={$nick}'>{$row['cliente_nome']}</a></td>";
                    echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}&nick={$nick}'>{$row['tecnico_nick']}</a></td>";
                    echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}&nick={$nick}'>{$row['CRIACAO_DATA']}</a></td>";
                    echo "</tr>";
                }

            echo "</table>";

            } else {

                throw new Exception("[Erro] na consulta ao banco de dados.");

            }
        
        ?>
        </div>
        <div class="body4">
        <h2>Pendente</h2>    
        <?php 
            
            include 'conexao.php';

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
            JOIN TAB_ESTADO estado ON fo.ID_ESTADO = estado.ID
            WHERE ID_ESTADO = 5";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                echo "<table border='1'>";
                echo "<tr>
                <th>Cliente</th>
                <th>Técnico</th>
                <th>Data/Hr</th>
                </tr>";

                while($row = $result->fetch_assoc()) {
                    
                    echo "<tr>";
                    echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}&nick={$nick}'>{$row['cliente_nome']}</a></td>";
                    echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}&nick={$nick}'>{$row['tecnico_nick']}</a></td>";
                    echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}&nick={$nick}'>{$row['CRIACAO_DATA']}</a></td>";
                    echo "</tr>";
                }

            echo "</table>";

            } else {

                throw new Exception("[Erro] na consulta ao banco de dados.");

            }
        
        ?>
        </div>
        <div class="body5">
        <h2>Reparado/Resolvido</h2>    
        <?php 
            
            include 'conexao.php';

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
            JOIN TAB_ESTADO estado ON fo.ID_ESTADO = estado.ID
            WHERE ID_ESTADO = 6";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                echo "<table border='1'>";
                echo "<tr>
                <th>Cliente</th>
                <th>Técnico</th>
                <th>Data/Hr</th>
                </tr>";

                while($row = $result->fetch_assoc()) {
                    
                    echo "<tr>";
                    echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}'>{$row['cliente_nome']}</a></td>";
                    echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}'>{$row['tecnico_nick']}</a></td>";
                    echo "<td><a href='fo.php?procura_fo={$row['N_SERIE']}'>{$row['CRIACAO_DATA']}</a></td>";
                    echo "</tr>";
                }

            echo "</table>";

            } else {

                throw new Exception("[Erro] na consulta ao banco de dados.");

            }
        
        ?>
        </div>
    </section>
    <script>

    var nick = '<?php echo $nick; ?>';
    
    function redirect() {
        
        window.location.href = 'fo.php?nick=' + nick;
    }

    </script>

</body>
</html>
