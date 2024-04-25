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

<div class="name2">
    <form action="" id="form_name2">
        <h2>Procurar</h2>
        <input type="text" name="procura_fo" value="Nº FO">
        <input type="submit" value="Procurar" id="submit">
        <button id="listar_fo">Listar</button>
        <h2>Menu</h2>
        <button id="bt_dashboard">Dashboard</button>
        <button type="button" onclick='redirect_cliente()' id="bt_cliente">Cliente</button>
        <button type="button" onclick='redirect_fo()' id="bt_fo">Folhas de Obras</button>
        <h2>Equipamento</h2>
        <button id="bt_tipo">Tipo</button>
        <button id="bt_marca">Marca</button>
        <button id="bt_modelo">Modelo</button>
        <button id="bt_catalogo">Catálogo</button>
    </form>
</div>

<div class="name3">
    <div class="subdiv1">
        <form action="fo2.php" method="post" id="form_subdiv1">
            <label for="txt_cliente">Cliente: </label>
            <input type="text" name="txt_cliente">
            <label for="dd_tecnico">Atribuir: </label>
            <select name="dd_tecnico" id="dd_tecnico">
                <option value="tecnico">Técnico</option>
            </select>
            <label for="dd_orcamento">Orçamento:</label>
            <select name="dd_orcamento" id="dd_orcamento">
                <option value="orcamento">Orçamento</option>
            </select>    
        </form>
    </div>   
       
    <div class="subdiv2">
        <form action="fo2.php" method="post" id="form_subdiv2">
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
        </form>
    </div>
          
    <div class="subdiv3">
        <form action="fo2.php" method="post" id="form_subdiv3">
            <label for="area_avaria_servicos" id="label_avaria">Avaria/Serviços:</label>
            <textarea name="area_avaria_servicos" id="area_avaria_servicos" cols="30" rows="5"></textarea>
            <label for="area_acessorios" id="label_acessorios">Acessórios Usados:</label>
            <textarea name="area_acessorios" id="area_acessorios" cols="30" rows="5"></textarea>
        </form>
    </div>
         
    <div class="subdiv4">
        <form action="fo2.php" method="post" id="form_subdiv4">
            <label for="area_observacoes" id="label_observacoes">Observações:</label>
            <textarea name="area_observacoes" id="area_observacoes" cols="30" rows="5"></textarea>
            <label for="area_estado" id="label_estado">Avaliação Equip:</label>
            <textarea name="area_estado" id="area_estado" cols="30" rows="5"></textarea>
        </form>
    </div>
            
    <div class="subdiv5">
        <form action="fo2.php" method="post" id="form_subdiv5">
            <label for="txt_ticket">Nº Ticket:</label>
            <input type="text" name="txt_ticket">
            <label for="txt_requerimento">Nº Requerimento:</label>
            <input type="text" name="txt_requerimento">
            <label for="txt_numero_serie">Nº Série:</label>
            <input type="text" name="txt_numero_serie">
            <button id="bt_gen">Gerar</button>
        </form>
    </div> 

    <div class="subdiv5">
        <button id="enviarTodos">Salvar</button>       
    </div> 

</div>
</section>

<script>
    // Adiciona um evento de clique para o botão "Enviar Todos"
    document.getElementById("enviarTodos").addEventListener("click", function() {
        var forms = document.querySelectorAll("form"); // Seleciona todos os formulários na página
        var formData = new FormData(); // Cria um objeto FormData para armazenar os dados

        // Loop através de todos os formulários
        forms.forEach(function(form) {
            var inputs = form.querySelectorAll("input, select, textarea"); // Seleciona todos os campos de entrada no formulário

            // Loop através de todos os campos de entrada no formulário atual
            inputs.forEach(function(input) {
                formData.append(input.name, input.value); // Adiciona o nome e o valor de cada campo de entrada ao objeto FormData
            });
        });

        // Redireciona para a página fo2.php com os dados passados via URL
        window.location.href = "fo2.php?" + new URLSearchParams(formData).toString();
    });
</script>
<script>
    function redirect_cliente() {
        window.location.href = 'cliente.php';
    }
    function redirect_fo() {
        window.location.href = 'fo.php';
    }
</script>

</body>
</html>
