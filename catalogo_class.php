<?php 

class catalogo {

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
