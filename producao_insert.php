<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/messagebox.css">
    <title>Produção</title>
</head>
<body>

    <?php

        include 'conexao.php';

        try {

            if ($_SERVER["REQUEST_METHOD"] === "GET") {

                //Informações da FO...

                $id_fo = $_GET['txt_ticket'];
                
                echo '[Informações da FO] <br>';
                echo '<br>';
                echo 'ID: ' . $id_fo . '<br>';
                echo '<br>';

                //Informações do Cliente...

                $nome_cliente = $_GET['txt_cli'];

                echo '[Informações do Cliente] <br>';
                echo '<br>';
                echo 'Nome: ' . $nome_cliente . '<br>';
                echo '<br>';

                //Informações dos Técnicos...

                $tecnico1 = $_GET['dd_tecnico1'];
                $tecnico2 = $_GET['dd_tecnico2'];
                $tecnico3 = $_GET['dd_tecnico3'];
                $tecnico4 = $_GET['dd_tecnico4'];
                $tecnico5 = $_GET['dd_tecnico5'];
                $tecnico6 = $_GET['dd_tecnico6'];

                $data1 = $_GET['dt_tecnico1'];
                $data2 = $_GET['dt_tecnico2'];
                $data3 = $_GET['dt_tecnico3'];
                $data4 = $_GET['dt_tecnico4'];
                $data5 = $_GET['dt_tecnico5'];
                $data6 = $_GET['dt_tecnico6'];

                echo '[Informações dos Técnicos] <br>';
                echo '<br>';
                echo 'Técnico 1: ' . $tecnico1 . '<br>';
                echo 'Data de Serviço: ' . $data1 . '<br>'; 
                echo '<br>';
                echo 'Técnico 2: ' . $tecnico2 . '<br>';
                echo 'Data de Serviço: ' . $data2 . '<br>'; 
                echo '<br>';
                echo 'Técnico 3: ' . $tecnico3 . '<br>';
                echo 'Data de Serviço: ' . $data3 . '<br>'; 
                echo '<br>';
                echo 'Técnico 4: ' . $tecnico4 . '<br>';
                echo 'Data de Serviço: ' . $data4 . '<br>'; 
                echo '<br>';
                echo 'Técnico 5: ' . $tecnico5 . '<br>';
                echo 'Data de Serviço: ' . $data5 . '<br>'; 
                echo '<br>';
                echo 'Técnico 6: ' . $tecnico6 . '<br>';
                echo 'Data de Serviço: ' . $data6 . '<br>'; 
                echo '<br>';

            }

        } catch (Exception $e) {

            throw new Exception("[Erro 400] na Transmissão de Informações Web ");

        $conn->close();

        }
       
    ?>

    <script>

    var nick = '<?php echo $nick; ?>';

    function redirect() {

        window.location.href = 'cliente.php?nick=' + nick;

    }
        
    </script>
</body>
</html>
