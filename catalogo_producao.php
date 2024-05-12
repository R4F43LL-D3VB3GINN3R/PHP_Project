<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/catalogo_producao.css">
    <title>Catálogo</title>
</head>
<body>

    <?php 

    $nick = '';
    $id_fo = '';
    $cliente = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se o nick foi enviado por POST
        if(isset($_POST['nick'])){

            $nick = $_POST['nick'];

        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Verifica se o nick foi enviado por GET
        if(isset($_GET['nick'])){

            $nick = $_GET['nick'];
            $id_fo = $_GET['id_fo'];
            $cliente = $_GET['cliente'];

        }

    }

    ?>

    <section class="layout">

        <?php //Menu de Adicionar e Remover...?>

        <div class="name3">  
            <form id="form_name3" name="form3" class="form3">

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

                            $sql = "SELECT ";

                            $sql = "SELECT * FROM TAB_CATALOGO";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {


                                    echo "<tr>";
                                    echo "<td>" . $row['ID'] . "</td>";
                                    echo "<td>" . $row['NOME'] . "</td>";
                                    echo "<td>" . $row['DESCRICAO'] . "</td>";
                                    echo "<td>" . $row['PRECO'] . "</td>";
                                    echo "<td><button type='button' onclick=\"sendData(" . $row['ID'] . ")\">Escolher</button></td>";
                                    echo "</tr>";
                                    
                                } 
                                
                            }

                            $conn->close();

                        ?>

                    </tbody>
                </table>

            </form>
        </div>

    </section>  

    <script>

        function sendData(idMaterial) {
            
            var nick = '<?php echo htmlspecialchars($nick); ?>';
            var id_fo = '<?php echo htmlspecialchars($id_fo); ?>';
            var cliente = '<?php echo htmlspecialchars($cliente); ?>';

            var url = 'producao.php?id_material=' + encodeURIComponent(idMaterial) + '&nick=' + encodeURIComponent(nick) + '&procura_fo=' + encodeURIComponent(id_fo) + '&dd_cliente=' + encodeURIComponent(cliente);

            window.location.href = url;

        }

    </script>

</body>
</html>
