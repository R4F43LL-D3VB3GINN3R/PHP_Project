<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/messagebox.css">
    <title>Produção</title>
</head>
<body>

    <?php

        include 'conexao.php';

        try {

            if ($_SERVER["REQUEST_METHOD"] === "GET") {

                //Informações da FO...

                $id_fo = $_GET['txt_ticket'];
                
                echo '[Informações da FO] <br>';
                echo '<br>';
                echo 'ID: ' . $id_fo . '<br>';
                echo '<br>';

                //Informações do Cliente...

                $nome_cliente = $_GET['txt_cli'];
                $soma_horas = $_GET['txt_tot_hrs'];
                $horas_contrato = $_GET['txt_contr_horas'];
                $horas_disponiveis = $_GET['txt_debt_horas'];
                $horas_extras = $_GET['txt_tot_extras'];

                echo '[Informações do Cliente] <br>';
                echo '<br>';
                echo 'Nome: ' . $nome_cliente . '<br>';
                echo 'Total de Horas Trabalhadas: ' . $soma_horas . '<br>';
                echo 'Horas de Contrato: ' . $horas_contrato . '<br>';
                echo 'Horas Disponíveis: ' . $horas_disponiveis . '<br>';
                echo 'Horas Extras: ' . $horas_extras . '<br>';
                echo '<br>';

                //Informações dos Técnicos...

                $tecnico1 = $_GET['dd_tecnico1'];
                $tecnico2 = $_GET['dd_tecnico2'];
                $tecnico3 = $_GET['dd_tecnico3'];
                $tecnico4 = $_GET['dd_tecnico4'];
                $tecnico5 = $_GET['dd_tecnico5'];
                $tecnico6 = $_GET['dd_tecnico6'];

                $data1 = $_GET['dt_tecnico1'];
                $data2 = $_GET['dt_tecnico2'];
                $data3 = $_GET['dt_tecnico3'];
                $data4 = $_GET['dt_tecnico4'];
                $data5 = $_GET['dt_tecnico5'];
                $data6 = $_GET['dt_tecnico6'];

                $hora_inicio1 = $_GET['time_hora_ini1'];
                $hora_inicio2 = $_GET['time_hora_ini2'];
                $hora_inicio3 = $_GET['time_hora_ini3'];
                $hora_inicio4 = $_GET['time_hora_ini4'];
                $hora_inicio5 = $_GET['time_hora_ini5'];
                $hora_inicio6 = $_GET['time_hora_ini6'];

                $hora_fim1 = $_GET['time_hora_fim1'];
                $hora_fim2 = $_GET['time_hora_fim2'];
                $hora_fim3 = $_GET['time_hora_fim3'];
                $hora_fim4 = $_GET['time_hora_fim4'];
                $hora_fim5 = $_GET['time_hora_fim5'];
                $hora_fim6 = $_GET['time_hora_fim6'];

                $horas_trabalhadas1 = $_GET['time_hrs_trab1'];
                $horas_trabalhadas2 = $_GET['time_hrs_trab2'];
                $horas_trabalhadas3 = $_GET['time_hrs_trab3'];
                $horas_trabalhadas4 = $_GET['time_hrs_trab4'];
                $horas_trabalhadas5 = $_GET['time_hrs_trab5'];
                $horas_trabalhadas6 = $_GET['time_hrs_trab6'];

                $viagem1 = $_GET['dd_viag1'];
                $viagem2 = $_GET['dd_viag2'];
                $viagem3 = $_GET['dd_viag3'];
                $viagem4 = $_GET['dd_viag4'];
                $viagem5 = $_GET['dd_viag5'];
                $viagem6 = $_GET['dd_viag6'];

                $quant_km1 = $_GET['num_km1'];
                $quant_km2 = $_GET['num_km2'];
                $quant_km3 = $_GET['num_km3'];
                $quant_km4 = $_GET['num_km4'];
                $quant_km5 = $_GET['num_km5'];
                $quant_km6 = $_GET['num_km6'];

                $km_total = $quant_km1 + $quant_km2 + $quant_km3 + $quant_km4 + $quant_km5 + $quant_km6;

                echo '[Informações dos Técnicos] <br>';
                echo '<br>';

                echo 'Técnico 1: ' . $tecnico1 . '<br>';
                echo 'Data de Serviço: ' . $data1 . '<br>'; 
                echo 'Hora Início: ' . $hora_inicio1 . '<br>'; 
                echo 'Hora Fim: ' . $hora_fim1 . '<br>'; 
                echo 'Horas Trabalhadas: ' . $horas_trabalhadas1 . '<br>';
                echo 'Viagem: ' . $viagem1 . '<br>';
                echo 'Quantidade KM: ' . $quant_km1 . '<br>';
                echo '<br>';

                echo 'Técnico 2: ' . $tecnico2 . '<br>';
                echo 'Data de Serviço: ' . $data2 . '<br>'; 
                echo 'Hora Início: ' . $hora_inicio2 . '<br>'; 
                echo 'Hora Fim: ' . $hora_fim2 . '<br>'; 
                echo 'Horas Trabalhadas: ' . $horas_trabalhadas2 . '<br>';
                echo 'Viagem: ' . $viagem2 . '<br>';
                echo 'Quantidade KM: ' . $quant_km2 . '<br>';
                echo '<br>';

                echo 'Técnico 3: ' . $tecnico3 . '<br>';
                echo 'Data de Serviço: ' . $data3 . '<br>'; 
                echo 'Hora Início: ' . $hora_inicio3 . '<br>'; 
                echo 'Hora Fim: ' . $hora_fim3 . '<br>'; 
                echo 'Horas Trabalhadas: ' . $horas_trabalhadas3 . '<br>';
                echo 'Viagem: ' . $viagem3 . '<br>';
                echo 'Quantidade KM: ' . $quant_km3 . '<br>';
                echo '<br>';

                echo 'Técnico 4: ' . $tecnico4 . '<br>';
                echo 'Data de Serviço: ' . $data4 . '<br>'; 
                echo 'Hora Início: ' . $hora_inicio4 . '<br>'; 
                echo 'Hora Fim: ' . $hora_fim4 . '<br>'; 
                echo 'Horas Trabalhadas: ' . $horas_trabalhadas4 . '<br>';
                echo 'Viagem: ' . $viagem4 . '<br>';
                echo 'Quantidade KM: ' . $quant_km4 . '<br>';
                echo '<br>';

                echo 'Técnico 5: ' . $tecnico5 . '<br>';
                echo 'Data de Serviço: ' . $data5 . '<br>'; 
                echo 'Hora Início: ' . $hora_inicio5 . '<br>'; 
                echo 'Hora Fim: ' . $hora_fim5 . '<br>'; 
                echo 'Horas Trabalhadas: ' . $horas_trabalhadas5 . '<br>';
                echo 'Viagem: ' . $viagem5 . '<br>';
                echo 'Quantidade KM: ' . $quant_km5 . '<br>';
                echo '<br>';

                echo 'Técnico 6: ' . $tecnico6 . '<br>';
                echo 'Data de Serviço: ' . $data6 . '<br>'; 
                echo 'Hora Início: ' . $hora_inicio6 . '<br>'; 
                echo 'Hora Fim: ' . $hora_fim6 . '<br>'; 
                echo 'Horas Trabalhadas: ' . $horas_trabalhadas6 . '<br>';
                echo 'Viagem: ' . $viagem6 . '<br>';
                echo 'Quantidade KM: ' . $quant_km6 . '<br>';
                echo '<br>';

                echo 'Quantidade Total de Kms Percorridos: ' . $km_total . '<br>';
                echo '<br>';

                echo '[Informações do Cliente] <br>';
                echo '<br>';
                echo 'Nome: ' . $nome_cliente . '<br>';
                echo 'Total de Horas Trabalhadas: ' . $soma_horas . '<br>';
                echo 'Horas de Contrato: ' . $horas_contrato . '<br>';
                echo 'Horas Disponíveis: ' . $horas_disponiveis . '<br>';
                echo 'Horas Extras: ' . $horas_extras . '<br>';
                echo '<br>';

            }

        } catch (Exception $e) {

            throw new Exception("[Erro 400] na Transmissão de Informações Web ");

        $conn->close();

        }
       
    ?>

    <script>

    var nick = '<?php echo $nick; ?>';

    function redirect() {

        window.location.href = 'cliente.php?nick=' + nick;

    }
        
    </script>
</body>
</html>
