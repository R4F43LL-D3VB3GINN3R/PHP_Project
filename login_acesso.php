<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/messagebox.css">
    <title>Admin</title>
</head>
<body>
    <?php 
    
        include 'conexao.php';
        include 'permissoes.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $login = $_POST['txt_login'];
            $password = $_POST['txt_password'];

            $stmt = $conn->prepare("SELECT * FROM TAB_TECNICO WHERE NICK = ? AND PASS = ?");
            $stmt->bind_param('ss', $login, $password);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {

                repasseNick($login, "fo.php");    
                exit;

            } else {
 
                header("Location: error.html");
                exit;

            }

        }
        
        $conn->close();
   
    ?>
</body>
</html>
