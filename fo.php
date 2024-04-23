<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/ipicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style/fo.css">
    <title>Folhas de Obras</title>
</head>
<body>
<section class="layout">
<div class="name1">
    <nav>
        <ul> 
            <li>Dashboard</li> 
            <li>Clientes</li> 
            <li>Folhas de Obras</li> 
        </ul>
    </nav>
</div>

  <div class="name2">
  </div>
    <form action=""></form>
        <div class="name3">

            <form action="">
                <div class="subdiv1">
                    <label for="txt_cliente">Cliente: </label>
                    <input type="text" name="txt_cliente">
                    <label for="dd_tecnico">Atribuir: </label>
                    <select name="dd_tecnico" id="dd_tecnico">
                        <option value="tecnico">Tecnico</option>
                    </select>
                    <label for="txt_requerimento">Requerimento Nº:</label>
                    <input type="text" name="txt_requerimento">
                    <label for="txt_ticket">Ticket Nº:</label>
                    <input type="text" name="txt_ticket">
                </div>
            </form>

            <form action="">
                <div class="subdiv2">
                    <label for="dd_equipamento">Tipo Equip:</label>
                    <select name="dd_equipamento" id="dd_equipamento">
                        <option value="equipamento">Equipamento</option>
                    </select>
                    <label for="dd_marca">Marca Equip:</label>
                    <select name="dd_marca" id="dd_marca">
                        <option value="marca">Marca</option>
                    </select>
                    <label for="dd_modelo">Mod Equip:</label>
                    <select name="dd_modelo" id="dd_modelo">
                        <option value="modelo">Modelo</option>
                    </select>
                    <label for="txt_numero_serie">Nº Série:</label>
                    <input type="text" name="txt_numero_serie">
                    <button>Gerar</button>
                </div>
            </form>

            <form action="">
                <div class="subdiv3">
                    <label for="area_avaria_servicos">Avaria/Serviços:</label>
                    <textarea name="area_avaria_servicos" id="area_avaria_servicos" cols="30" rows="5"></textarea>
                    <label for="area_acessorios">Acessórios:</label>
                    <textarea name="area_acessorios" id="area_acessorios" cols="30" rows="5"></textarea>
                </div>
            </form>

            <form action="">
                <div class="subdiv4">
                    <label for="area_observacoes">Observações:</label>
                    <textarea name="area_observacoes" id="area_observacoes" cols="30" rows="5"></textarea>
                    <label for="area_estado">Estado/Avaliação Equip:</label>
                    <textarea name="area_estado" id="area_estado" cols="30" rows="5"></textarea>
                </div>
            </form>

            <form action="">
                <div class="subdiv5">
                   
                </div>
            </form>

            <form action="">
                <div class="subdiv6">
                   
                </div>
            </form>

        </div>
    </form>
</section>
</body>
</html>
