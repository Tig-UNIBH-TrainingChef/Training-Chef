function validarForm(form)
{
    nome      = form.nome;
    email     = form.email;
    senha     = form.senha;
    confSenha = form.conf_senha;
    
    if (nome.value.length < 3)
    {
        alert("O nome deve ter mais de 3 caracteres.");
        nome.focus();
        return false;
    }
    else if (email.value.length < 3)
    {
        alert("O e-mail está incorreto.")
        email.focus();
        return false;
    }
    else if (senha.value.length < 3)
    {
        alert("Informe uma senha por favor.");
        senha.focus();
        return false;
    }
    else if (senha.value !== confSenha.value)
    {
        alert("As senhas não são iguais.");
        senha.focus();
        confSenha.value = "";
        return false;
    }
    
    return true;
}