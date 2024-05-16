<?php 

class catalogo {

    public function recebeNick_Catalogo($nickname, $id_material) {

        $data = array();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if(isset($_POST['nick'])) {

                $data['nick'] = $_POST['nick'];

            }

            if(isset($_POST['id_cat'])) {

                $data['id_cat'] = $_POST['id_cat'];

            }

            if(isset($_POST['formnick'])) {

                $data['nick'] = $_POST['formnick'];

            }

            if(isset($_POST['formid'])) {

                $data['id_cat'] = $_POST['formid'];

            }

        } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {

            if(isset($_GET['nick'])) {

                $data['nick'] = $_GET['nick'];

            }

            if(isset($_GET['id_cat'])) {

                $data['id_cat'] = $_GET['id_cat'];

            }

            if(isset($_GET['formnick'])) {

                $data['nick'] = $_GET['formnick'];

            }

            if(isset($_GET['formid'])) {

                $data['id_cat'] = $_GET['formid'];
                
            }

        }

        return $data;

    }

    public function displayCatalogo($nickname) {

        include 'conexao.php';

        $sql = "SELECT * FROM TAB_CATALOGO";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['NOME'] . "</td>";
                echo "<td>" . $row['DESCRICAO'] . "</td>";
                echo "<td>" . $row['PRECO'] . "</td>";
                echo "<td><form action='catalogo_gerenciamento.php' method='get'><input type='hidden' name='id_cat' value='" . $row['ID'] . "'><input type='submit' value='Editar' id='managecat'><input type='hidden' name='nick' value='" . $nickname . "'></form></td>";
                echo "</tr>";

            } 

            echo "<tr>";
                echo "<td>" . "--" . "</td>";
                echo "<td>" . "--" . "</td>";
                echo "<td>" . "--" . "</td>";
                echo "<td>" . "--" . "</td>";
            echo "<td><form action='catalogo_gerenciamento.php' method='get'><input type='submit' value='+' id='managecat'><input type='hidden' name='nick' value='" . $nickname . "'></form></td>";
            
            $conn->close();

        }

    }

}

?>
