/**
 * Função para deletar um prato
 * @param {int} id
 */
function deletarPrato(id)
{
    if (confirm("Você tem certeza que deseja apagar o prato?"))
    {
        $.post('../controller/PratoController.php',
        {
            funcao : deletar,
            param  : id
        },
        function(r)
        {
            if (r == "APAGADO")
            {
                alert("Prato apagado com sucesso!");
                window.location = "meus_pratos.php";
            }
            else
            {
                alert("Aconteceu um erro. Tente novamente mais tarde.");
            }
        });
    }
}