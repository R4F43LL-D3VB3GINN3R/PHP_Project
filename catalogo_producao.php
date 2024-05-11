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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se o nick foi enviado por POST
        if(isset($_POST['nick'])){
            $nick = $_POST['nick'];
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Verifica se o nick foi enviado por GET
        if(isset($_GET['nick'])){
            $nick = $_GET['nick'];
            $id_fo = $GET['id_fo'];
            $cliente = $GET['cliente'];
        }
    }

    ?>

    <section class="layout">

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
                                    echo "<td><form action='catalogo_gerenciamento.php' method='get'><input type='hidden' name='id_cat' value='" . $row['ID'] . "'><input type='submit' value='Escolher' id='managecat'><input type='hidden' name='nick' value='" . $nick . "'></form></td>";
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

</body>
</html>
