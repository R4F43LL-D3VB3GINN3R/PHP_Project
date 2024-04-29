<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/messagebox.css">
    <title>Técnicos</title>
</head>
<body>
    
    <?php 

        try {
    
            include 'conexao.php';

            if ($_SERVER["REQUEST_METHOD"] === "GET") {

                $nick = isset($_GET['nick']) ? $_GET['nick'] : '';

                $nome = $_GET['txt_nome'];
                $email = $_GET['txt_email'];
                $telemovel = $_GET['txt_telemovel'];
                $login = $_GET['txt_login'];
                $senha = $_GET['txt_senha'];
                $admin = $_GET['dd_admin'];
                $status = $_GET['dd_status'];
                $nick = $_GET['nick'];

                //Consulta a linha referente ao número do cliente...

                $sql = "SELECT * FROM TAB_TECNICO WHERE NICK = '$login'";
                $result = $conn->query($sql);

                if ($result->num_rows < 0) {

                    echo "<div>
                                <h2>Técnico $nome não existe em nosso sistema</h2>
                                <button type='button' onclick='redirect()'>Ok</button>
                        </div>";

                } else {

                    $stmt = $conn->prepare("UPDATE TAB_TECNICO
                                            SET NOME = ?, PASS = ?, CONTACTO = ?, NICK = ?, EMAIL = ?, APAGADO = ?, IS_ADMIN = ?
                                            WHERE NICK = ?");
                    $stmt->bind_param('ssssssss', $nome, $senha, $telemovel, $login, $email, $status, $admin, $login);
                    $resultCadastro = $stmt->execute();
    
                    if ($resultCadastro) {

                        echo "<div>
                                <h2>Dados do Técnico $nome Alterados</h2>
                                <button type='button' onclick='redirect()'>Ok</button>
                            </div>";

                    } else {
                    
                        throw new Exception("[Erro] Ao modificar dados do Cliente");

                    }

                }

            } else {

                throw new Exception("[Erro] No envio de formulário Web.");

            }     

        } catch (Exception $e) {

            throw new Exception("[Erro 400]" . $e);

        }

    $conn->close();
    
    ?>

<script>

    var nick = '<?php echo $nick; ?>';

    function redirect() {

        window.location.href = 'tecnicos.php?nick=' + nick;
        
    }
        
</script>
</body>
</html>
