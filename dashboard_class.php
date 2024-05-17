<?php 

    class dashboard {

        function display_tableRow($estado_num, $nickname) { 
            
            include 'conexao.php';

            $sql = "SELECT 
            fo.ID, 
            c.NOME AS cliente_nome, 
            t.NICK AS tecnico_nick, 
            tipo.NOME AS tipo_nome, 
            marca.NOME AS marca_nome, 
            modelo.NOME AS modelo_nome,
            estado.NOME AS estado_nome,
            fo.N_SERIE,
            fo.CRIACAO_DATA,
            fo.TICKET
            FROM TAB_FO fo
            JOIN TAB_CLIENTE c ON fo.ID_CLIENTE = c.ID
            JOIN TAB_TECNICO t ON fo.ID_TECNICO = t.ID
            JOIN TAB_TIPO tipo ON fo.ID_TIPO = tipo.ID
            JOIN TAB_MARCA marca ON fo.ID_MARCA = marca.ID
            JOIN TAB_MODELO modelo ON fo.ID_MODELO = modelo.ID
            JOIN TAB_ESTADO estado ON fo.ID_ESTADO = estado.ID
            WHERE ID_ESTADO = $estado_num";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                echo "<table border='1'>";
                echo "<tr>
                <th>Cliente</th>
                <th>Técnico</th>
                <th>Data/Hr</th>
                </tr>";

                while($row = $result->fetch_assoc()) {
                    
                    echo "<tr>";
                    echo "<td><a href='fo.php?procura_fo={$row['ID']}&nick={$nickname}'>{$row['cliente_nome']}</a></td>";
                    echo "<td><a href='fo.php?procura_fo={$row['ID']}&nick={$nickname}'>{$row['tecnico_nick']}</a></td>";
                    echo "<td><a href='fo.php?procura_fo={$row['ID']}&nick={$nickname}'>{$row['CRIACAO_DATA']}</a></td>";
                    echo "</tr>";
                }

            echo "</table>";

            } 
    
        }

        function display_tableRow2($estado_num, $estado_num2, $nickname) { 
            
            include 'conexao.php';

            $sql = "SELECT 
            fo.ID, 
            c.NOME AS cliente_nome, 
            t.NICK AS tecnico_nick, 
            tipo.NOME AS tipo_nome, 
            marca.NOME AS marca_nome, 
            modelo.NOME AS modelo_nome,
            estado.NOME AS estado_nome,
            fo.N_SERIE,
            fo.CRIACAO_DATA,
            fo.TICKET
            FROM TAB_FO fo
            JOIN TAB_CLIENTE c ON fo.ID_CLIENTE = c.ID
            JOIN TAB_TECNICO t ON fo.ID_TECNICO = t.ID
            JOIN TAB_TIPO tipo ON fo.ID_TIPO = tipo.ID
            JOIN TAB_MARCA marca ON fo.ID_MARCA = marca.ID
            JOIN TAB_MODELO modelo ON fo.ID_MODELO = modelo.ID
            JOIN TAB_ESTADO estado ON fo.ID_ESTADO = estado.ID
            WHERE ID_ESTADO = $estado_num or ID_ESTADO = $estado_num2";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                echo "<table border='1'>";
                echo "<tr>
                <th>Cliente</th>
                <th>Técnico</th>
                <th>Data/Hr</th>
                </tr>";

                while($row = $result->fetch_assoc()) {
                    
                    echo "<tr>";
                    echo "<td><a href='fo.php?procura_fo={$row['ID']}&nick={$nickname}'>{$row['cliente_nome']}</a></td>";
                    echo "<td><a href='fo.php?procura_fo={$row['ID']}&nick={$nickname}'>{$row['tecnico_nick']}</a></td>";
                    echo "<td><a href='fo.php?procura_fo={$row['ID']}&nick={$nickname}'>{$row['CRIACAO_DATA']}</a></td>";
                    echo "</tr>";
                }

            echo "</table>";

            } 
    
        }

    }

?>
