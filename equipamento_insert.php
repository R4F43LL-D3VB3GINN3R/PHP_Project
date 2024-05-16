<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/messagebox.css">
    <title>Equipamentos</title>
</head>
<body>
    
<?php 

    try {

        include 'permissoes.php';
        require_once 'classes/equipamento_class.php';

        $Equipamento = new equipamento();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $nick = $_POST['nick'];

            //Se o formulário for para adicionar...
            $Equipamento->add_equipamento('add_tipo', 'txt_tipo', 'TAB_TIPO', $nick);
            $Equipamento->add_equipamento('add_marca', 'txt_marca', 'TAB_MARCA', $nick);
            $Equipamento->add_equipamento('add_modelo', 'txt_modelo', 'TAB_MODELO', $nick);

            //Se o formulário for para remover...
            $Equipamento->remove_equipamento('sub_tipo', 'dd_tipo', 'TAB_TIPO', $nick);
            $Equipamento->remove_equipamento('sub_marca', 'dd_marca', 'TAB_MARCA', $nick);
            $Equipamento->remove_equipamento('sub_modelo', 'dd_modelo', 'TAB_MODELO', $nick);

        }

    } catch (Exception $e) {

        throw new Exception("[Erro 400] na Transmissão de Informações Web ");

    }

?>

</body>
</html>
