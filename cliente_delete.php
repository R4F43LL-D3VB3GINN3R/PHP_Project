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

    try {

        include 'conexao.php';
        include 'permissoes.php';

        if ($_SERVER["REQUEST_METHOD"] === "GET") {

            // Recupere os dados do cliente do método GET
            $numCli = $_GET['txt_n_cliente'];
            $nifCli = $_GET['txt_nifCliente'];
            $nick = $_GET['nick'];

            access($nick);

            echo '<form method="post">
                <input type="hidden" name="txt_n_cliente" value="' . $numCli . '">
                <input type="hidden" name="txt_nifCliente" value="' . $nifCli . '">
                <input type="hidden" name="nick" value="' . $nick . '">
                <div>
                    <h2>Tem certeza que deseja remover o Cliente '  . $numCli . ' ?</h2>
                    <button type="submit" name="resposta" value="sim">Sim</button>
                    <button type="submit" name="resposta" value="nao">Não</button>
                </div>
            </form>';
        
        }     

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $resposta = $_POST['resposta'];
            $nick = $_POST['nick'];
        
            if ($resposta === 'nao') {

                repasseNick ($nick, 'cliente.php');
                exit;

            } else {
        
                //Das informações, só precisamos do numero do cliente e do nif...
                //O nif é preciso porque se houver contrato, o id do contrato é o nif do cliente...

                $numCli = $_POST['txt_n_cliente'];
                $nifCli = $_POST['txt_nifCliente'];

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

                    if($dadosCli['ID_CONTRATO'] == NULL) { //Se não houver contrato...

                        //Remove apenas o cliente...

                        $sql = "DELETE FROM TAB_CLIENTE WHERE N_CLIENTE = '$numCli'";
                        $result = $conn->query($sql);

                        echo "<div>
                        <h2>Cliente $numCli Removido.</h2>
                        <button type='button' onclick='redirect()'>Ok</button>
                        </div>";


                    } else { //Se houver contrato...

                        //Remove o cliente e o contrato primeiro e depois o contrato...

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

        } else {

            throw new Exception("[Erro] na Transmissão de Informações Web ");

        }

    } catch (Exception $e) {

        

    }


    $conn->close();

?>    

<script>

    var nick = '<?php echo $nick; ?>';

    function redirect() {

        window.location.href = 'cliente.php?nick=' + nick;

    }

</script>

</body>
</html>
