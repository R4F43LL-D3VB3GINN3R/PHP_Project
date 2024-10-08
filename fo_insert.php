<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/messagebox.css">
    <title>Folhas de Obras</title>
</head>
<body>

    <?php

        include 'conexao.php';

//////sdsdsasadas

        try {

            if ($_SERVER["REQUEST_METHOD"] === "GET") {

                $id = $_GET['procura_fo'];
                $cliente = $_GET['dd_cliente'];
                $tecnico = $_GET['dd_tecnico'];
                $orcamento = $_GET['dd_orcamento'];
                $tipo = $_GET['dd_tipo'];
                $marca = $_GET['dd_marca'];
                $modelo = $_GET['dd_modelo'];
                $estado = $_GET['dd_estado'];
                $avaria = $_GET['area_avaria_servicos'];
                $acessorios = $_GET['area_acessorios'];
                $observacoes = $_GET['area_observacoes'];
                $estado_aval = $_GET['area_estado'];
                $ticket = $_GET['txt_ticket'];
                $requisicao = $_GET['txt_requerimento'];
                $num_serie = $_GET['txt_numero_serie'];
                $gt = $_GET['txt_gt'];
                $faturacao = $_GET['txt_faturacao'];
                $proposta = $_GET['txt_proposta'];
                $nick = $_GET['nick'];

                //Consulta a linha referente ao número do cliente...

                $sql = "SELECT ID FROM TAB_FO WHERE ID = '$id'";
                $result = $conn->query($sql);

                //Se ele encontrar o número do cliente na tabela...
                //Redireciona de volta....

                if ($result->num_rows > 0) {

                    echo "<div>
                                <h2>Folha de Obra Nº $id já existe em nosso sistema</h2>
                                <button type='button' onclick='redirect()'>Ok</button>
                        </div>";

                } else {

                    //Join para recuperar o id de todos os elementos da tabela...

                    $sql = "SELECT c.ID AS cliente_id, t.ID AS tecnico_id, tipo.ID AS tipo_id, marca.ID AS marca_id, modelo.ID AS modelo_id, estado.ID AS estado_id
                    FROM TAB_CLIENTE c
                    JOIN TAB_TECNICO t ON t.NICK = '$tecnico'
                    JOIN TAB_TIPO tipo ON tipo.NOME = '$tipo'
                    JOIN TAB_MARCA marca ON marca.NOME = '$marca'
                    JOIN TAB_MODELO modelo ON modelo.NOME = '$modelo'
                    JOIN TAB_ESTADO estado ON estado.NOME = '$estado'
                    WHERE c.NOME = '$cliente'";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) {

                            $cliente_id = $row['cliente_id'];
                            $tecnico_id = $row['tecnico_id'];
                            $tipo_id = $row['tipo_id'];
                            $marca_id = $row['marca_id'];
                            $modelo_id = $row['modelo_id'];
                            $estado_id = $row['estado_id'];

                        }

                        //Insere na tabela...

                        $estado_id = 1;

                        $stmt = $conn->prepare("INSERT INTO TAB_FO (ID_CLIENTE, ID_TECNICO, CRIACAO_DATA, REQUISICAO, TICKET, ID_TIPO, ID_MARCA, ID_MODELO, ID_ESTADO, N_SERIE, AVARIA_SERVICOS, ACESSORIOS, OBSERVACOES, ESTADO_AVALIACAO, GUIA_TRANSPORTE, FATURACAO, PROPOSTAS)
                        VALUES (?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param('iisiiiisssssssis', $cliente_id, $tecnico_id, $requisicao, $ticket, $tipo_id, $marca_id, $modelo_id, $estado_id, $num_serie, $avaria, $acessorios, $observacoes, $estado_aval, $gt, $faturacao, $proposta);
                        $result = $stmt->execute();

                        if ($result > 0) {

                            if ($result) {

                                echo "<div>
                                            <h2>Folha de Obra Nº $id criada com sucesso</h2>
                                            <button type='button' onclick='redirect()'>Ok</button>
                                    </div>";
                                
                            }

                        } else {

                            throw new Exception("[Erro] na inserção de dados da FO ");

                        }

                    } else {

                        throw new Exception("[Erro] na consulta das chaves primárias requeridas ");

                    }
                
                }

            } else {

                throw new Exception("[Erro] na transmissão de dados do formulário ");

            }

        } catch (Exception $e) {

            throw new Exception("[Erro 400] na Transmissão de Informações Web ". $e);

        }

    ?>
    <script>

        var nick = '<?php echo $nick; ?>';

        function redirect() {

            window.location.href = 'fo.php?nick=' + nick;

        }

    </script>

</body>
</html>
