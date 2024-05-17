<?php 

class producao {

    function display_tableRow($table, $column, $rowname) {

        include 'conexao.php';

        $sql = "SELECT $column FROM $table";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                echo '<option value="' . $row[$rowname] . '">' . $row[$rowname] . '</option>';

            }

        }

        $conn->close();

    }

}

?>
