<?php 

class equipamento {

    function display_equipamento($tabela) {

        include 'conexao.php';

        $sql = "SELECT NOME FROM $tabela WHERE STATUS = 'Ativo'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                echo '<option value="' . $row['NOME'] . '">' . $row['NOME'] . '</option>';

            }

        }

        $conn->close();

    }

    function add_equipamento($form, $request, $table, $nick) {

        include 'conexao.php';

        if (isset($_POST[$form])) {

            $request = $_POST[$request];
            $ativo = "Ativo";

            if ($request != NULL) {

                $stmt = $conn->prepare("INSERT INTO $table (NOME, STATUS) VALUES (?, ?)");
                $stmt->bind_param('ss', $request, $ativo);
                $result = $stmt->execute();

                if ($result) {

                    repasseNick($nick, "equipamentos.php");    
                    exit;

                } else {

                    throw new Exception("Não foi possível inserir os dados");

                }

            } else {

                repasseNick($nick, "equipamentos.php");    
                exit;

            }

            $conn->close();

        }

    }

    function remove_equipamento($form, $request, $table, $nick) {

        include 'conexao.php';

        if (isset($_POST[$form])) {

            $request = $_POST[$request];
            $inativo = 'Inativo';

            $stmt = $conn->prepare("UPDATE $table
                                    SET STATUS = ?
                                    WHERE NOME = ?");
            $stmt->bind_param('ss', $inativo, $request);
            $result = $stmt->execute();

            if ($result) {

                repasseNick($nick, "equipamentos.php");    
                exit;

            } else {

                throw new Exception("Não foi possível inserir os dados ");

            } 

            $conn->close();

        }

    }

}

?>
