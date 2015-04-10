<?php

if (file_exists('../model/PratoModel.php')) { require_once '../model/PratoModel.php'; }
else { require_once 'model/PratoModel.php'; }

/**
 * Classe controladora para a entidade prato.
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class PratoController
{
    public function deletar($id)
    {
        $PratoModel = new PratoModel();
        $PratoModel->deletar($id);
        print "APAGOU";
    }
}

if ($_POST['funcao'])
{
    $PratoController = new PratoController();
    $PratoController->{$_POST['funcao']}($_POST['param']);
}

?>