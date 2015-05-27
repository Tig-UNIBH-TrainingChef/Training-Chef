<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

/**
 * Classe controladora para a entidade prato.
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class PratoController
{
    public function cadastrarNovoPrato(Usuario $Usuario, Prato $Prato, $novaImagem)
    {
        if (strlen(trim($Prato->getNome())) == 0)
        {
            ?><script>alert("Por favor, escreva um nome válido");</script><?php
        }
        else if (strlen(trim($Prato->getDescricao())) == 0)
        {
            ?><script>alert("Por favor, escreva uma descrição válida");</script><?php
        }
        else if (strlen(trim($Prato->getReceita())) == 0)
        {
            ?><script>alert("Por favor, escreva uma receita válida");</script><?php
        }
        else
        {
            $uploadfile = $_SERVER['DOCUMENT_ROOT'] . '/resources/prato/' . date("Ymdhisisi") . basename($novaImagem['name']);

            if (move_uploaded_file($novaImagem['tmp_name'], $uploadfile))
            {
                $Prato->setImagem(date("Ymdhisisi") . basename($novaImagem['name']));
                $Prato->setUsuario($Usuario);

                $PratoModel = new PratoModel();
                $PratoModel->cadastrar($Prato);
                
                ?><script>alert("Prato cadastrado com sucesso!");</script><?php
            }
            else
            {
                ?><script>alert("Não foi possível fazer upload da imagem.");</script><?php
            }
        }
    }
}
?>