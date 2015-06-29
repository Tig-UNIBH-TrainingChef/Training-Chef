<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

/**
 * Classe controladora para a entidade Forma de Contato.
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class FormaDeContatoController
{
    /**
     * Cadastro de uma forma de contato para um usuário.
     * @param Usuario $Usuario Usuário da forma de contato.
     * @param type $idTipoContato ID do tipo de contato.
     * @param type $valorDado Valor referente ao tipo de contato.
     */
    public function cadastrarFormaDeContato(Usuario $Usuario, $idTipoContato, $valorDado)
    {
        if (strlen(trim($valorDado)) == 0)
        {
            ?><script>alert("Por favor, escreva um valor válido");</script><?php
        }
        else
        {
            $TipoContato = new TipoContato();
            $TipoContato->setID($idTipoContato);

            $FormaDeContato = new FormaDeContato();
            $FormaDeContato->setUsuario($Usuario);
            $FormaDeContato->setTipoContato($TipoContato);
            $FormaDeContato->setValor($valorDado);

            $FormaDeContatoModel = new FormaDeContatoModel();
            $FormaDeContatoModel->cadastrar($FormaDeContato);

            ?><script>alert("Contato cadastrado com sucesso!");</script><?php
        }
    }
}