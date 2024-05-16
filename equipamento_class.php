<?php 

class equipamento {

    function display_equipamento($tabela) {
        
        echo '<select name="dd_tipo" id="tipo">';

        include 'conexao.php';

        $sql = "SELECT NOME FROM $tabela WHERE STATUS = 'Ativo'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                echo '<option value="' . $row['NOME'] . '">' . $row['NOME'] . '</option>';

            }

        }
        
        echo '</select>';

        $conn->close();

    }

}

?>
