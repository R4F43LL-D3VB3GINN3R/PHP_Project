<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/messagebox.css">
    <title>Técnicos</title>
</head>
<body>

    <?php

        include 'conexao.php';

        try {

            if ($_SERVER["REQUEST_METHOD"] === "GET") {

                $nome = $_GET['txt_nome'];
                $email = $_GET['txt_email'];
                $telemovel = $_GET['txt_telemovel'];
                $login = $_GET['txt_login'];
                $senha = $_GET['txt_senha'];
                $admin = $_GET['dd_admin'];
                $status = $_GET['dd_status'];
                $nick = $_GET['nick'];

                $sql = "SELECT * FROM TAB_TECNICO WHERE NICK = '$login'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    echo "<div>
                                <h2>Técnico $nome já existe em nosso sistema</h2>
                                <button type='button' onclick='redirect()'>Ok</button>
                        </div>";

                } else {

                    $stmt = $conn->prepare("INSERT INTO TAB_TECNICO (NOME, PASS, CONTACTO, NICK, EMAIL, APAGADO, IS_ADMIN)
                    VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param('sssssss', $nome, $senha, $telemovel, $login, $email, $status, $admin);
                    $resultCadastro = $stmt->execute(); 

                    if ($resultCadastro) {

                        echo "<div>
                                <h2>Técnico $nome Cadastrado</h2>
                                <button type='button' onclick='redirect()'>Ok</button>
                            </div>";

                    } else {
                    
                        throw new Exception("[Erro 402] ao Cadastrar Cliente");

                    }

                } 

            } else {

                

            }

        } catch (Exception $e) {

            

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
