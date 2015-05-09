// --------------- EDIÇÃO DO NOME DO PRATO --------------

/**
 * Função para mostrar o formulário de edição do nome do prato.
 * @param {int] idPrato
 * @param {string} nomePrato
 */
function mostrarFormEditarNomePrato(idPrato, nomePrato)
{
    htmlFormEdicao = "<p>Novo nome:</p>"
                   + "<input style='width: 90%' type='text' id='novo_nome_prato' onblur='editarNomePrato(" + idPrato + ");' value='" + nomePrato + "' /> "
                   + "<span id='img_loading'></span>";
    
    $("#label_nome_prato").html(htmlFormEdicao);
}

/**
 * Função para editar o nome do prato.
 * @param {int] idPrato
 */
function editarNomePrato(idPrato)
{
    htmlImagemLoading = "<img src='../view/images/ajax-loader.gif' />";
    
    $('#novo_nome_prato').attr('readonly', true);
    $("#img_loading").html(htmlImagemLoading);
    
    nomePrato = $('#novo_nome_prato').val();
    
    $.post(
        '../Controller/PratoController.php',
        {
            funcao : 'editarNome',
            param  : idPrato,
            param2 : nomePrato
        },
        function (retorno)
        {
            if (retorno === "EDITOU")
            {
                htmlLabel = "<h2>"
                          + nomePrato + " "
                          + "<a href=\"#\" onclick=\"mostrarFormEditarNomePrato(" + idPrato + ", '" + nomePrato + "');\">"
                          + "<span class='glyphicon glyphicon-pencil'></span>"
                          + "</a>"
                          + "</h2>";
                
                $("#label_nome_prato").html(htmlLabel);
            }
            else
            {
                alert("Aconteceu um erro: Não foi possível atualizar o nome do prato.");
                window.location.reload();
            }
        }
    );
}

// --------------- EDIÇÃO DA DESCRIÇÃO DO PRATO --------------

/**
 * Função para mostrar o formulário de edição da descrição do prato.
 * @param {int] idPrato
 */
function mostrarFormEditarDescricaoPrato(idPrato)
{
    descricaoPrato = $("#corpo_descricao_prato").html().replace("<br>", "\n");;
    
    htmlFormEdicao = "<textarea style='width: 100%' id='nova_descricao_prato' onblur='editarDescricaoPrato(" + idPrato + ");'>"
                   + descricaoPrato
                   + "</textarea>";
    
    $("#corpo_descricao_prato").html(htmlFormEdicao);
    $("#btn_editar_descricao_prato").hide();
}

/**
 * Função para editar a descrição do prato.
 * @param {int] idPrato
 */
function editarDescricaoPrato(idPrato)
{
    htmlImagemLoading = "<img src='../view/images/ajax-loader.gif' />";
    
    $('#nova_descricao_prato').attr('readonly', true);
    $("#img_loading").html(htmlImagemLoading);
    
    descricaoPrato = $('#nova_descricao_prato').val();
    
    $.post(
        '../Controller/PratoController.php',
        {
            funcao : 'editarDescricao',
            param  : idPrato,
            param2 : descricaoPrato
        },
        function (retorno)
        {
            if (retorno === "EDITOU")
            {
                htmlLabel = descricaoPrato.replace("\n", "<br>");
                
                $("#corpo_descricao_prato").html(htmlLabel);
                $("#btn_editar_descricao_prato").show();
            }
            else
            {
                alert("Aconteceu um erro: Não foi possível atualizar a descrição do prato.");
                window.location.reload();
            }
        }
    );
}

// --------------- EDIÇÃO DA RECEITA DO PRATO --------------

/**
 * Função para mostrar o formulário de edição da receita do prato.
 * @param {int] idPrato
 */
function mostrarFormEditarReceitaPrato(idPrato)
{
    receitaPrato = $("#corpo_receita_prato").html().replace("<br>", "\n\r");
    
    htmlFormEdicao = "<textarea style='width: 100%' rows='30' id='nova_receita_prato' onblur='editarReceitaPrato(" + idPrato + ");'>"
                   + receitaPrato
                   + "</textarea>";
    
    $("#corpo_receita_prato").html(htmlFormEdicao);
    $("#btn_editar_receita_prato").hide();
}

/**
 * Função para editar a receita do prato.
 * @param {int] idPrato
 */
function editarReceitaPrato(idPrato)
{
    htmlImagemLoading = "<img src='../view/images/ajax-loader.gif' />";
    
    $('#nova_receita_prato').attr('readonly', true);
    $("#img_loading").html(htmlImagemLoading);
    
    receitaPrato = $('#nova_receita_prato').val();
    
    $.post(
        '../Controller/PratoController.php',
        {
            funcao : 'editarReceita',
            param  : idPrato,
            param2 : receitaPrato
        },
        function (retorno)
        {
            if (retorno === "EDITOU")
            {
                htmlLabel = receitaPrato.replace("\n\r", "<br>");
                
                $("#corpo_receita_prato").html(htmlLabel);
                $("#btn_editar_receita_prato").show();
            }
            else
            {
                alert("Aconteceu um erro: Não foi possível atualizar a receita do prato.");
                window.location.reload();
            }
        }
    );
}

// --------------- DELETAR PRATO -----------------

/**
 * Função para deletar um prato
 * @param {int} id
 */
function deletarPrato(id)
{
    if (confirm("Você tem certeza que deseja apagar o prato?"))
    {
        $.post('../Controller/PratoController.php',
        {
            funcao : 'deletar',
            param  : id
        },
        function(retorno)
        {
            if (retorno == "APAGOU")
            {
                alert("Prato apagado com sucesso!");
                window.location = "meus_pratos.php";
            }
            else
            {
                alert("Aconteceu um erro. Tente novamente mais tarde.");
                window.location.reload();
            }
        });
    }
}