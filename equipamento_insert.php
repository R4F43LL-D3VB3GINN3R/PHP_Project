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

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $nick = $_POST['nick'];

            //Se o formulário for para adicionar tipo...

            if (isset($_POST['add_tipo'])) {

                $tipo = $_POST['txt_tipo'];

                if ($tipo != NULL) {

                    $stmt = $conn->prepare("INSERT INTO TAB_TIPO (NOME)
                    VALUES (?)");
                    $stmt->bind_param('s', $tipo);
                    $result = $stmt->execute();

                    if ($result) {

                        repasseNick($nick, "equipamentos.php");    
                        exit;

                    } else {

                        throw new Exception("Não foi possível inserir os dados ");

                    }

                } else {

                    repasseNick($nick, "equipamentos.php");    
                    exit;

                }

            //Se o formulário for para remover tipo...

            } else if (isset($_POST['sub_tipo'])) {

                $tipo = $_POST['dd_tipo'];

                $sql = "DELETE FROM TAB_TIPO WHERE NOME = '$tipo'";
                $result = $conn->query($sql);

                if ($result) {

                    repasseNick($nick, "equipamentos.php");    
                    exit;

                } else {

                    throw new Exception("Não foi possível inserir os dados ");

                } 

            //Se o formulário for para adicionar marca...

            } else if (isset($_POST['add_marca'])) {

                $marca = $_POST['txt_marca'];

                if($marca != NULL) {

                    $stmt = $conn->prepare("INSERT INTO TAB_MARCA (NOME)
                    VALUES (?)");
                    $stmt->bind_param('s', $marca);
                    $result = $stmt->execute();

                    if ($result) {

                        repasseNick($nick, "equipamentos.php");    
                        exit;

                    } else {

                        throw new Exception("Não foi possível inserir os dados ");

                    }

                } else {

                    repasseNick($nick, "equipamentos.php");    
                    exit;

                }

            //Se o formulário for para remover marca...

            } else if (isset($_POST['sub_marca'])) {

                $marca = $_POST['dd_marca'];

                $sql = "DELETE FROM TAB_MARCA WHERE NOME = '$marca'";
                $result = $conn->query($sql);

                if ($result) {

                    repasseNick($nick, "equipamentos.php");    
                    exit;

                } else {

                    throw new Exception("Não foi possível inserir os dados ");

                } 

            //Se o formulário for para adicionar modelo...

            } else if (isset($_POST['add_modelo'])) {

                $modelo = $_POST['txt_modelo'];

                if($modelo != NULL) {

                    $stmt = $conn->prepare("INSERT INTO TAB_MODELO (NOME)
                    VALUES (?)");
                    $stmt->bind_param('s', $modelo);
                    $result = $stmt->execute();

                    if ($result) {

                        repasseNick($nick, "equipamentos.php");    
                        exit;

                    } else {

                        throw new Exception("Não foi possível inserir os dados ");

                    }

                } else {

                    repasseNick($nick, "equipamentos.php");    
                    exit;

                }

            //Se o formulário for para remover modelo...


            } else if (isset($_POST['sub_modelo'])) {

                $modelo = $_POST['dd_modelo'];

                $sql = "DELETE FROM TAB_MODELO WHERE NOME = '$modelo'";
                $result = $conn->query($sql);

                if ($result) {

                    repasseNick($nick, "equipamentos.php");    
                    exit;

                } else {

                    throw new Exception("Não foi possível inserir os dados ");

                }
                
            //Se o formulário for para adicionar estado...

            } else if (isset($_POST['add_estado'])) {

                $estado = $_POST['txt_estado'];

                if($estado != NULL) {

                    $stmt = $conn->prepare("INSERT INTO TAB_ESTADO (NOME)
                    VALUES (?)");
                    $stmt->bind_param('s', $estado);
                    $result = $stmt->execute();

                    if ($result) {

                        repasseNick($nick, "equipamentos.php");    
                        exit;

                    } else {

                        throw new Exception("Não foi possível inserir os dados ");

                    }

                } else {

                    repasseNick($nick, "equipamentos.php");    
                    exit;

                }

            //Se o formulário for para remover estado...

            } else if (isset($_POST['sub_estado'])) {

                $estado = $_POST['dd_estado'];

                $sql = "DELETE FROM TAB_ESTADO WHERE NOME = '$estado'";
                $result = $conn->query($sql);

                if ($result) {

                    repasseNick($nick, "equipamentos.php");    
                    exit;

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
