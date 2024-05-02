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

            <div class="div_procura">
                <label for="txt_ticket">Nº Ticket</label>
                <select type="text" name="txt_ticket" id="ticket">
                <option value="a">aaaaaaaaaaaaaaaaaaaaa</option>
                </select>
                <button type="button" id="bt_pesquisar">Procurar</button><br>
            </div>
            
            <h2>Mão-De-Obra</h2>

            <?php //Controlador de Tempo?>

            <div class="div_tempo"> <?php //Tabela 1?>

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

                <table class="tab2"> <?php //Tabela 2?>
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

            </div> <?php //Encerra da div_tempo?>

            <div class="time_footer"> <?php //Footer das Tabelas 1 e 2?>

                <h2>Totais:</h2>
                <input type="text" value="0">
                <input type="text" value="0">
                <input type="text" value="0">
                <input type="text" value="0">
                
            </div>

            <?php //Deslocação KM?>

            <div class="div_km"> 
                <label for="txt_desl_km">Deslocação KM:</label>
                <input type="number" name="txt_desl_km" id="desl_km" >
            </div>

            <h2>Material Utilizado</h2>

            <div class="div_mat"> <?php //Tabela de materiais?>

                <table class="tab3"> 
                    <thead>
                        <tr>
                            <th>Quantidade</th>
                            <th>Catálogo</th>
                            <th>Descrição</th>
                            <th>P.Unit</th>
                            <th>P.Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="number" name="txt_quantMat1" id="quantMat1" value="0"></td>        
                            <td><input type="text" name="txt_catalogo1" id="catalogo1"></td> 
                            <td><input type="text" name="txt_descricao1" id="descricao1"></td>
                            <td><input type="number" name="txt_precUnit1" id="precUnit1" value="0"></td> 
                            <td><input type="number" name="txt_precTot1" id="precTot1" value="0"></td>        
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat2" id="quantMat2" value="0"></td>   
                            <td><input type="text" name="txt_catalogo2" id="catalogo2"></td>  
                            <td><input type="text" name="txt_descricao2" id="descricao2"></td>
                            <td><input type="number" name="txt_precUnit2" id="precUnit2" value="0"></td> 
                            <td><input type="number" name="txt_precTot2" id="precTot2" value="0"></td>  
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat3" id="quantMat3" value="0"></td> 
                            <td><input type="text" name="txt_catalogo3" id="catalogo3"></td> 
                            <td><input type="text" name="txt_descricao3" id="descricao3"></td>  
                            <td><input type="number" name="txt_precUnit3" id="precUnit3" value="0"></td>  
                            <td><input type="number" name="txt_precTot3" id="precTot3" value="0"></td>  
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat4" id="quantMat4" value="0"></td> 
                            <td><input type="text" name="txt_catalogo4" id="catalogo4"></td> 
                            <td><input type="text" name="txt_descricao4" id="descricao4"></td>
                            <td><input type="number" name="txt_precUnit4" id="precUnit4" value="0"></td> 
                            <td><input type="number" name="txt_precTot4" id="precTot4" value="0"></td>     
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat5" id="quantMat5" value="0"></td> 
                            <td><input type="text" name="txt_catalogo5" id="catalogo5"></td>  
                            <td><input type="text" name="txt_descricao5" id="descricao5"></td>  
                            <td><input type="number" name="txt_precUnit5" id="precUnit5" value="0"></td> 
                            <td><input type="number" name="txt_precTot5" id="precTot5" value="0"></td>  
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat6" id="quantMat6" value="0"></td> 
                            <td><input type="text" name="txt_catalogo6" id="catalogo6"></td>  
                            <td><input type="text" name="txt_descricao6" id="descricao6"></td> 
                            <td><input type="number" name="txt_precUnit6" id="precUnit6" value="0"></td> 
                            <td><input type="number" name="txt_precTot6" id="precTot6" value="0"></td>   
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat7" id="quantMat7" value="0"></td> 
                            <td><input type="text" name="txt_catalogo7" id="catalogo7"></td>  
                            <td><input type="text" name="txt_descricao7" id="descricao7"></td>  
                            <td><input type="number" name="txt_precUnit7" id="precUnit7" value="0"></td> 
                            <td><input type="number" name="txt_precTot7" id="precTot7" value="0"></td>  
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat8" id="quantMat8" value="0"></td>  
                            <td><input type="text" name="txt_catalogo8" id="catalogo8"></td>  
                            <td><input type="text" name="txt_descricao8" id="descricao8"></td> 
                            <td><input type="number" name="txt_precUnit8" id="precUnit8" value="0"></td>  
                            <td><input type="number" name="txt_precTot8" id="precTot8" value="0"></td> 
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat9" id="quantMat9" value="0"></td>  
                            <td><input type="text" name="txt_catalogo9" id="catalogo9"></td>  
                            <td><input type="text" name="txt_descricao9" id="descricao9"></td> 
                            <td><input type="number" name="txt_precUnit9" id="precUnit9" value="0"></td>  
                            <td><input type="number" name="txt_precTot9" id="precTot9" value="0"></td> 
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_quantMat10" id="quantMat10" value="0"></td> 
                            <td><input type="text" name="txt_catalogo10" id="catalogo10"></td> 
                            <td><input type="text" name="txt_descricao10" id="descricao10"></td>  
                            <td><input type="number" name="txt_precUnit10" id="precUnit10" value="0"></td>  
                            <td><input type="number" name="txt_precTot10" id="precTot10" value="0"></td>  
                        </tr>
                    </tbody>
                </table>

            </div> <?php //Encerra a tabela de materiais?>  

            <?php //Trabalhos Efetuados?>

            <div class="div_trabEfetuados">
                <label for="">Trabalhos Efetuados</label>
                <textarea name="trabEfetuados" id="trabEfetuados" cols="70" rows="5"></textarea>
            </div>

            <input type="submit" name="bt_submit" id="submit" value="Gravar">

        </form> <?php //Encerra o Formulário?>
    </div> <?php //Encerra a div .left?>

  <?php //Main right principal?>
    
  <div class="right">

    <h2>aaa</h2>
    <input type="text">

  </div>

</body>
</html>
