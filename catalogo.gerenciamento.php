<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/catalogo_gerenciamento.css">
    <title>Catálogo</title>
</head>
<body>

    <?php 

    $nick = '';
    $id = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['nick'])){
            $nick = $_POST['nick'];
            $id = $_POST['id_cat'];
        }

        if(isset($_POST['formnick']) && isset($_POST['formid'])){
            $nick = $_POST['formnick'];
            $id = $_POST['formid'];
        }

    } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {

        if(isset($_GET['nick'])){
            $nick = $_GET['nick'];
            $id = $_GET['id_cat'];
        }

        if(isset($_GET['formnick']) && isset($_GET['formid'])){
            $nick = $_GET['formnick'];
            $id = $_GET['formid'];
        }

    }

    ?>

    <div>
        <form action="catalogo_gerenciamento.php" method="post" name="form">
            <label for="nome_mat">Nome </label>
            <input type="text" name="nome_mat" id="nome">
            <label for="preco_mat">Preço</label>
            <input type="text" name="preco_mat" id="preco">
            <label for="desc_mat">Descrição</label>
            <textarea name="desc_mat" id="descricao" cols="20" rows="5"></textarea>
            <input type="hidden" name="formid" value=<?php echo $id; ?>>
            <input type="hidden" name="formnick" value=<?php echo $nick; ?>>
            <input type="submit" value="Gravar" id="submit">
        </form>
    </div>
    
    <?php 
    
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            
            include 'conexao.php';

            $sql = ("SELECT * FROM TAB_CATALOGO WHERE ID = '$id'");
            $result = $conn->query($sql);

            if ($result) {

                $dados = $result->fetch_assoc();

                echo "<script>document.getElementById('nome').value = '" . $dados['NOME'] . "';</script>";
                echo "<script>document.getElementById('preco').value = '" . $dados['PRECO'] ."'</script>";
                echo "<script>document.getElementById('descricao').value = '" . $dados['DESCRICAO'] . "'</script>";

            }

        } 
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            include 'conexao.php';
            include 'permissoes.php';
            
            $sql = ("SELECT * FROM TAB_CATALOGO WHERE ID = '$id'");
            $result = $conn->query($sql);

            if ($result) {

                $nome = $_POST['nome_mat'];
                $preco = $_POST['preco_mat'];
                $descricao = $_POST['desc_mat'];

                $stmt = $conn->prepare("UPDATE TAB_CATALOGO
                                        SET NOME = ?, PRECO = ?, DESCRICAO = ?
                                        WHERE ID = ?");
                $stmt->bind_param('sisi', $nome, $preco, $descricao, $id);
                $result = $stmt->execute();

                if ($result) {

                    repasseNick($nick, 'catalogo.php');

                }

            }

        }

    ?>

</body>
</html>
