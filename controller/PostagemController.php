<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

/**
 * Classe controladora para a entidade Postagem
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class PostagemController
{
    /**
     * Método para fazer um post
     * @param Usuario $Usuario
     * @param type $postagem
     */
    public function fazerPost(Usuario $Usuario, $postagem)
    {
        if (strlen(str_replace(" ", "", trim($postagem))) == "")
        {
            ?><script>alert("Por favor, escreva um texto válido");</script><?php
        }
        else
        {
            $Postagem = new Postagem();
            $Postagem->setUsuario($Usuario);
            $Postagem->setTexto(trim($postagem));

            $PostagemModel = new PostagemModel();
            $PostagemModel->cadastrar($Postagem);
        }
    }
}