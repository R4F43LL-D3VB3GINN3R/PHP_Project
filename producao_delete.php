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

        $id_fo = $_GET['txt_ticket'];
        $nick = $_GET['nick'];
        $cliente = $_GET['txt_cli'];

        $sql = "SELECT * FROM TAB_PRODUCAO WHERE ID_FO = '$id_fo'"; //Seleciona todos os dados da tabela de producao relacionados a fo...
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $idprod = $result->fetch_assoc();
            $id_prod = $idprod['ID'];

            $i = 0;

            for ($i = 1; $i <= 10; $i++) { //Iera sobre os campos para saber qual dos campos enviou o form...

                if (isset($_GET['bt_remove' . $i])) { //Detecta o botao...

                    if (isset($_GET['txt_catalogo' . $i]) && !empty($_GET['txt_catalogo' . $i])) { //Se os dados foram enviados...

                        $nome_mat = $_GET['txt_catalogo' . $i];
                        
                        $sql = "SELECT ID FROM TAB_CATALOGO WHERE NOME = '$nome_mat'"; //Seleciona o id do material relacionado ao nome...
                        $result = $conn->query($sql);

                        if ($result) {

                            $id_mat_array = $result->fetch_assoc();
                            $id_mat = $id_mat_array['ID'];

                            //Remove o material da tabela de catalogos relacionada a fo...
                            $sql = "DELETE FROM TAB_PROD_CAT_LINHAS WHERE ID_CAT = '$id_mat' AND ID_PROD = '$id_prod'";
                            $result = $conn->query($sql);

                            if ($result) {

                                echo "<div>
                                        <h2>Material Removido</h2>
                                        <button type='button' onclick='redirect()'>Ok</button>
                                    </div>";

                            }

                        }

                    } else {

                        echo "<div>
                                <h2>Escolha um Material</h2>
                                <button type='button' onclick='redirect()'>Ok</button>
                            </div>";

                    }

                }

            }

        } 

    } else {

        throw new Exception("[Erro 400] na Transmissão de Informações Web ");
    }

} catch (Exception $e) {

    throw new Exception("[Erro 400] na Transmissão de Informações Web ");
}

$conn->close();

?>


    <script>

    var nick = '<?php echo $nick; ?>';
    var id_fo = '<?php echo $id_fo; ?>';
    var cliente = '<?php echo $cliente; ?>';

    function redirect() {

        window.location.href = 'producao.php?nick=' + nick + '&procura_fo=' + id_fo + '&dd_cliente=' + cliente;

    }
        
    </script>
</body>
</html>
