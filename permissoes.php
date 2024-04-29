<?php 

    function access($nick) {

        $hostname = "localhost";
        $database = "bd_radio";
        $username = "root";
        $password = "";

        $conn = new mysqli($hostname, $username, $password, $database);
    
        $sql = "SELECT IS_ADMIN FROM TAB_TECNICO WHERE NICK = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nick);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    
        if ($row['IS_ADMIN'] === 'N') {
           
            header("Location: error.php");
            exit; 

        }
    
        $stmt->close();
        $conn->close();

    }

    function repasseNick ($nick, $pagina) {

            echo '<form id="adminForm" action="' . htmlspecialchars($pagina) . '" method="post">';
            echo '<input type="hidden" name="nick" value="' . htmlspecialchars($nick) . '">';
            echo '</form>';
            echo '<script>document.getElementById("adminForm").submit();</script>';

    }

?>
