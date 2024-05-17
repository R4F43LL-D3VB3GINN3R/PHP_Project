<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/dashboard.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>
<body>

<?php 

    $nick = '';

    require_once 'classes/main_class.php';
    require_once 'classes/dashboard_class.php';
    
    $Main = new main();
    $Dashboard = new dashboard();

    $nick = $Main->recebeNick('nick');

?>

    <section class="layout">
        <div class="top">
            <button type="button" onclick='redirect()' id="bt_back">Voltar</button>
        </div>
        <div class="body1"> 
            <h2>Reparação/Serviço</h2>    

            <?php 
            
                $Dashboard->display_tableRow(1, $nick);
            
            ?>

        </div>
        <div class="body2">
        <h2>Orçamentar/Orçamentado</h2>    

            <?php 
                
                $Dashboard->display_tableRow2(2, 3, $nick);
            
            ?>

        </div>
        <div class="body3">
        <h2>Aguarda Mat/Requisição</h2>    

            <?php 
                
                $Dashboard->display_tableRow(4, $nick);
            
            ?>

        </div>
        <div class="body4">
        <h2>Pendente</h2>   

            <?php 
                
                $Dashboard->display_tableRow(5, $nick);
            
            ?>

        </div>
        <div class="body5">
        <h2>Reparado/Resolvido</h2>  

            <?php 
                
                $Dashboard->display_tableRow(6, $nick);
            
            ?>

        </div>
        <div class="body6">
        <h2>Finalizado</h2>    

            <?php 
                
                $Dashboard->display_tableRow(7, $nick);
            
            ?>
            
        </div>
    </section>
    <script>

    var nick = '<?php echo $nick; ?>';
    
    function redirect() {
        
        window.location.href = 'fo.php?nick=' + nick;
    }

    </script>

</body>
</html>
