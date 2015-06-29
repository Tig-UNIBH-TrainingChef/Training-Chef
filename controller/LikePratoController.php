<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

/**
 * Classe controladora para a entidade Like Prato
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class LikePratoController
{
    public function like($idUsuario, $idPrato)
    {
        $LikePratoModel = new LikePratoModel();
        $LikePratoModel->cadastrar($idUsuario, $idPrato);
    }
    
    public function unlike($idUsuario, $idPrato)
    {
        $LikePratoModel = new LikePratoModel();
        $LikePratoModel->deletar($idUsuario, $idPrato);
    }
}
