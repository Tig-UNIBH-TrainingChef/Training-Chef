/**
 * Função para validar o formulário de login
 * @param {Form} form
 * @returns {Boolean} Resultado da validação
 */
function validarForm(form)
{
    email = form.email;
    senha = form.senha;
    
    if (email.value.length < 3)
    {
        alert("O e-mail não foi preenchido corretamente!");
        email.focus();
        return false;
    }
    else if (senha.value.length < 3)
    {
        alert("A senha não foi preenchida corretamente!");
        senha.focus();
        return false;
    }
    
    return true;
}