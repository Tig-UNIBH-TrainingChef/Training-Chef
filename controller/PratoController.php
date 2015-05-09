<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

/**
 * Classe controladora para a entidade prato.
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class PratoController
{
    /**
     * [AJAX]
     * Função para deletar um prato.
     * @param int $id
     */
    public function deletar($id)
    {
        if ($id == "")
            die ("Aconteceu um erro: Não foi informado o id corretamente.");
        
        $PratoModel = new PratoModel();
        $PratoModel->deletar($id);
        print "APAGOU";
    }
    
    /**
     * [AJAX]
     * Função para editar nome de um prato.
     * @param Prato $Prato
     */
    public function editarNome($id, $nome)
    {
        if ($id == "")
            die ("Acontece um erro: Não foi informado o id corretamente.");
        else if ($nome == "")
            die ("Aconteceu um erro: Não foi informado o nome corretamente.");
        
        $PratoModel = new PratoModel();
        
        $Prato = new Prato();
        $Prato->setID($id);
        $Prato->setNome($nome);
        
        $PratoModel->atualizar($Prato);
        print "EDITOU";
    }
    
    /**
     * [AJAX]
     * Função para editar descrição de um prato.
     * @param Prato $Prato
     */
    public function editarDescricao($id, $descricao)
    {
        if ($id == "")
            die ("Acontece um erro: Não foi informado o id corretamente.");
        else if ($descricao == "")
            die ("Aconteceu um erro: Não foi informado a descrição corretamente.");
        
        $PratoModel = new PratoModel();
        
        $Prato = new Prato();
        $Prato->setID($id);
        $Prato->setDescricao($descricao);
        
        $PratoModel->atualizar($Prato);
        print "EDITOU";
    }
    
    /**
     * [AJAX]
     * Função para editar receita de um prato.
     * @param Prato $Prato
     */
    public function editarReceita($id, $descricao)
    {
        if ($id == "")
            die ("Acontece um erro: Não foi informado o id corretamente.");
        else if ($descricao == "")
            die ("Aconteceu um erro: Não foi informado a receita corretamente.");
        
        $PratoModel = new PratoModel();
        
        $Prato = new Prato();
        $Prato->setID($id);
        $Prato->setReceita($descricao);
        
        $PratoModel->atualizar($Prato);
        print "EDITOU";
    }
}

if ($_POST['funcao'])
{
    $PratoController = new PratoController();
    
    if (isset($_POST['param2']))
        $PratoController->{$_POST['funcao']}($_POST['param'], $_POST['param2']);
    else
        $PratoController->{$_POST['funcao']}($_POST['param']);
}

?>