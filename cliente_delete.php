<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/messagebox.css">
    <title>Clientes</title>
</head>
<body>
    
<?php 

include 'conexao.php';

    if ($_SERVER["REQUEST_METHOD"] === "GET") {

        //Das informações, só precisamos do numero do cliente e do nif...
        //O nif é preciso porque se houver contrato, o id do contrato é o nif do cliente...

        $numCli = $_GET['txt_n_cliente'];
        $nifCli = $_GET['txt_nifCliente'];

        //Consulta a linha referente ao número do cliente...

        $sql = "SELECT * FROM TAB_CLIENTE WHERE N_CLIENTE = '$numCli'";
        $result = $conn->query($sql);

        if ($result->num_rows <= 0) {

            echo "<div>
                        <h2>Cliente $numCli não existe em nosso sistema</h2>
                        <button type='button' onclick='redirect()'>Ok</button>
                </div>";

        } else { //Se tudo correr bem com a consulta...

            $dadosCli = $result->fetch_assoc(); //Insere o cliente no vetor...

            if($dadosCli['ID_CONTRATO'] == NULL) {

                $sql = "DELETE FROM TAB_CLIENTE WHERE N_CLIENTE = '$numCli'";
                $result = $conn->query($sql);

                echo "<div>
                <h2>Cliente $numCli Removido.</h2>
                <button type='button' onclick='redirect()'>Ok</button>
                </div>";


            } else {

                $sql = "DELETE FROM TAB_CLIENTE WHERE N_CLIENTE = '$numCli'";
                $result = $conn->query($sql);

                $sql = "DELETE FROM TAB_CONTRATO WHERE ID = '$nifCli'";
                $result = $conn->query($sql);

                echo "<div>
                <h2>Cliente $numCli Removido.</h2>
                <button type='button' onclick='redirect()'>Ok</button>
                </div>";

            }

        }

    }

?>    

</body>
</html>
