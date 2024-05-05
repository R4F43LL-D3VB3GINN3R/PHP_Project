<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/messagebox.css">
    <title>Equipamentos</title>
</head>
<body>
    
<?php 

    try {

        include 'conexao.php';
        include 'permissoes.php';

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $nick = $_POST['nick'];
            $ativo = "Ativo";
            $inativo = "Inativo";

            //Se o formulário for para adicionar tipo...

            if (isset($_POST['add_tipo'])) {

                $tipo = $_POST['txt_tipo'];

                if ($tipo != NULL) {

                    $stmt = $conn->prepare("INSERT INTO TAB_TIPO (NOME, STATUS)
                    VALUES (?, ?)");
                    $stmt->bind_param('ss', $tipo, $ativo);
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

                $stmt = $conn->prepare("UPDATE TAB_TIPO
                                        SET STATUS = ?
                                        WHERE NOME = ?");
                $stmt->bind_param('ss', $inativo, $tipo);
                $result = $stmt->execute();

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

                    $stmt = $conn->prepare("INSERT INTO TAB_MARCA (NOME, STATUS)
                    VALUES (?, ?)");
                    $stmt->bind_param('ss', $marca, $ativo);
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

                $stmt = $conn->prepare("UPDATE TAB_MARCA
                                        SET STATUS = ?
                                        WHERE NOME = ?");
                $stmt->bind_param("ss", $inativo, $marca);
                $result = $stmt->execute();

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

                    $stmt = $conn->prepare("INSERT INTO TAB_MODELO (NOME, STATUS)
                    VALUES (?, ?)");
                    $stmt->bind_param('ss', $modelo, $ativo);
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

                $stmt = $conn->prepare("UPDATE TAB_MODELO
                                        SET STATUS = ?
                                        WHERE NOME = ?");
                $stmt->bind_param("ss", $inativo, $modelo);
                $result = $stmt->execute();

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
