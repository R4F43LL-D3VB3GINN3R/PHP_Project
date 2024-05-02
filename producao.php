<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/producao.css">
    <title>Folhas de Obras</title>
</head>
<body>

    <?php //Main left principal?>

  <div class="left">
    <form action="" id="form_left">

        <label for="txt_ticket">Nº Ticket</label>
        <input type="text" name="txt_ticket" id="ticket">
        <input type="text" name="txt_cliente" id="cliente">
        <button type="button" id="bt_voltar">Voltar</button><br>
        <h2>Mão-De-Obra</h2>

        <?php //Controlador de Tempo?>

        <div class="div_tempo">

           <table class="tab1">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data</th>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <th>Data</th>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="text" name="txt_cliente1" id="cliente1"></td>
                    <td><input type="date" name="dt_cliente1" id="cliente1"></td>
                </tr>
                <tr>
                    <td><input type="text" name="txt_cliente2" id="cliente2"></td>
                    <td><input type="date" name="dt_cliente2" id="cliente2"></td>
                </tr>
                <tr>
                    <td><input type="text" name="txt_cliente3" id="cliente3"></td>
                    <td><input type="date" name="dt_cliente3" id="cliente3"></td>
                </tr>
                <tr>
                    <td><input type="text" name="txt_cliente4" id="cliente4"></td>
                    <td><input type="date" name="dt_cliente4" id="cliente4"></td>
                </tr>
                <tr>
                    <td><input type="text" name="txt_cliente5" id="cliente5"></td>
                    <td><input type="date" name="dt_cliente5" id="cliente5"></td>
                </tr>
                <tr>
                    <td><input type="text" name="txt_cliente6" id="cliente6"></td>
                    <td><input type="date" name="dt_cliente6" id="cliente6"></td>
                </tr>
            </tbody>
        </table>

        <table class="tab2">
                <thead>
                    <tr>
                        <th>Horas</th>
                        <th>Tempo Dis.</th>
                        <th>Tempo Deb.</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <th>Início/Término.</th>
                    <th>Viagem/Trabalho</th>
                    <th>Normal/Extra</th>
                    <th>Cód MT</th>
                </tr>
                <tr>
                    <td><input type="time" name="time_hora_ini1" id="hora_ini1"><input type="time" name="time_hora_fim1" id="hora_fim1"></td>
                    <td><input type="number" name="num_viag1" id="viag1" value="0"><input type="number" name="num_trab1" id="trab1" value="0"></td>
                    <td><input type="number" name="num_normal1" id="normal1" value="0"><input type="number" name="num_extra1" id="extra1" value="0"></td>
                    <td><select type="number" name="num_codmat1" id="codmat1" value="0">
                        <option value="">0</option>
                    </select></td>
                </tr>
                <tr>
                    <td><input type="time" name="time_hora_ini2" id="hora_ini2"><input type="time" name="time_hora_fim2" id="hora_fim2"></td>
                    <td><input type="number" name="num_viag2" id="viag2" value="0"><input type="number" name="num_trab2" id="trab2" value="0"></td>
                    <td><input type="number" name="num_normal2" id="normal2" value="0"><input type="number" name="num_extra2" id="extra2" value="0"></td>
                    <td><select type="number" name="num_codmat2" id="codmat2">
                        <option value="">0</option>
                    </select></td>
                </tr>
                <tr>
                    <td><input type="time" name="time_hora_ini3" id="hora_ini3"><input type="time" name="time_hora_fim3" id="hora_fim3"></td>
                    <td><input type="number" name="num_viag3" id="viag3" value="0"><input type="number" name="num_trab3" id="trab3" value="0"></td>
                    <td><input type="number" name="num_normal3" id="normal3" value="0"><input type="number" name="num_extra3" id="extra3" value="0"></td>
                    <td><select type="number" name="num_codmat3" id="codmat3">
                        <option value="">0</option>
                    </select></td>
                </tr>
                <tr>
                    <td><input type="time" name="time_hora_ini4" id="hora_ini4"><input type="time" name="time_hora_fim4" id="hora_fim4"></td>
                    <td><input type="number" name="num_viag4" id="viag4" value="0"><input type="number" name="num_trab4" id="trab4" value="0"></td>
                    <td><input type="number" name="num_normal4" id="normal4" value="0"><input type="number" name="num_extra4" id="extra4" value="0"></td>
                    <td><select type="number" name="num_codmat4" id="codmat4">
                        <option value="">0</option>
                    </select></td>
                </tr>
                <tr>
                    <td><input type="time" name="time_hora_ini5" id="hora_ini5"><input type="time" name="time_hora_fim5" id="hora_fim5"></td>
                    <td><input type="number" name="num_viag5" id="viag5" value="0"><input type="number" name="num_trab5" id="trab5" value="0"></td>
                    <td><input type="number" name="num_normal5" id="normal5" value="0"><input type="number" name="num_extra5" id="extra5" value="0"></td>
                    <td><select type="number" name="num_codmat5" id="codmat5">
                        <option value="">0</option>
                    </select></td>
                </tr>
                <tr>
                    <td><input type="time" name="time_hora_ini6" id="hora_ini6"><input type="time" name="time_hora_fim6" id="hora_fim6"></td>
                    <td><input type="number" name="num_viag6" id="viag6" value="0"><input type="number" name="num_trab6" id="trab6" value="0"></td>
                    <td><input type="number" name="num_normal6" id="normal6" value="0"><input type="number" name="num_extra6" id="extra6" value="0"></td>
                    <td><select type="number" name="num_codmat6" id="codmat6">
                        <option value="">0</option>
                    </select></td>
                </tr>
            </tbody>
        </table>

        </div>

        <div class="time_footer">
            <h2>Totais:</h2>
            <input type="text" value="0">
            <input type="text" value="0">
            <input type="text" value="0">
            <input type="text" value="0">
        </div>
        </div>

    </form>
</div>

  <?php //Main right principal?>
    
  <div class="right">

    <h2>aaa</h2>
    <input type="text">

  </div>

</body>
</html>
