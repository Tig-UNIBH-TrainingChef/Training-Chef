/**
 * Função para validar o formulário de novo prato.
 * @param {form} form
 * @returns {Boolean} Resultado da validação.
 */
function validaForm(form)
{
    nome = form.nome;
    descricao = form.descricao;
    receita = form.receita;
    foto = form.foto;
    
    if (nome.value.length < 3)
    {
        alert("O nome informado não é válido!");
        nome.focus();
        return false;
    }
    else if (descricao.value.length < 3)
    {
        alert("A descrição do prato não é válida!")
        descricao.focus();
        return false;
    }
    else if (receita.value.length < 3)
    {
        alert("A receita informada não é válida!");
        receita.focus();
        return false;
    }
    else if (foto.value.length < 3)
    {
        alert("Selecione uma foto, por favor!");
        foto.focus();
        return false;
    }
    
    return true;
}