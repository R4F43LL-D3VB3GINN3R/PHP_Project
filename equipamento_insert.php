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

            } else if (isset($_POST['add_marca'])) {

                $marca = $_POST['txt_marca'];

                if($marca != NULL) {

                    $stmt = $conn->prepare("INSERT INTO TAB_MARCA (NOME)
                    VALUES (?)");
                    $stmt->bind_param('s', $marca);
                    $result = $stmt->execute();

                    if ($result) {

                        header("Location: equipamentos.php");

                    } else {

                        throw new Exception("Não foi possível inserir os dados ");

                    }

                } else {

                    header("Location: equipamentos.php");

                }

            } else if (isset($_POST['sub_marca'])) {

                $marca = $_POST['dd_marca'];

                $sql = "DELETE FROM TAB_MARCA WHERE NOME = '$marca'";
                $result = $conn->query($sql);

                if ($result) {

                    header("Location: equipamentos.php");

                } else {

                    throw new Exception("Não foi possível inserir os dados ");

                } 

            } else if (isset($_POST['add_modelo'])) {

                $modelo = $_POST['txt_modelo'];

                if($modelo != NULL) {

                    $stmt = $conn->prepare("INSERT INTO TAB_MODELO (NOME)
                    VALUES (?)");
                    $stmt->bind_param('s', $modelo);
                    $result = $stmt->execute();

                    if ($result) {

                        header("Location: equipamentos.php");

                    } else {

                        throw new Exception("Não foi possível inserir os dados ");

                    }

                } else {

                    header("Location: equipamentos.php");

                }


            } else if (isset($_POST['sub_modelo'])) {

                $modelo = $_POST['dd_modelo'];

                $sql = "DELETE FROM TAB_MODELO WHERE NOME = '$modelo'";
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

    $conn->close();

?>

</body>
</html>
