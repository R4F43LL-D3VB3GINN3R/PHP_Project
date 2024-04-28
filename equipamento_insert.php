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

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (isset($_POST['add_tipo'])) {

                $tipo = $_POST['txt_tipo'];

                if ($tipo != NULL) {

                    $stmt = $conn->prepare("INSERT INTO TAB_TIPO (NOME)
                    VALUES (?)");
                    $stmt->bind_param('s', $tipo);
                    $result = $stmt->execute();

                    if ($result) {

                        header("Location: equipamentos.php");

                    } else {

                        throw new Exception("Não foi possível inserir os dados ");

                    }

                } else {

                    header("Location: equipamentos.php");

                }

            } else if (isset($_POST['sub_tipo'])) {

                $tipo = $_POST['dd_tipo'];

                $sql = "DELETE FROM TAB_TIPO WHERE NOME = '$tipo'";
                $result = $conn->query($sql);

                if ($result) {

                    header("Location: equipamentos.php");

                } else {

                    throw new Exception("Não foi possível inserir os dados ");

                }

            }

        } else {

            throw new Exception("[Erro 400] na Transmissão do Método Post ");

        }

        $conn->close();

    } catch (Exception $e) {

        throw new Exception("[Erro 400] na Transmissão de Informações Web ");

    }



?>

</body>
</html>
