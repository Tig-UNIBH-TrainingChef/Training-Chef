<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

/**
 * Classe modelo para a entidade Like Prato
 * @author Víctor Vaz <victor-vaz@hotmail.com.br>
 */
class LikePratoModel
{
    public function cadastrar($idUsuario, $idPrato)
    {
        DAL::query("INSERT INTO like_prato (prato_idprato,
                                            usuario_idusuario)
                                    VALUES ({$idPrato},
                                            {$idUsuario})");
    }

    public function buscar($where = null)
    {
        $query = DAL::query("SELECT prato_idprato,
                                    usuario_idusuario
                               FROM like_prato
                            " . ($where ? " WHERE " . implode(" AND ", $where) : ""));
        
        $ListaLikes = array();
        while ($row = mysqli_fetch_array($query))
            $ListaLikes[] = new LikePrato(new Usuario($row['usuario_idusuario']), new Prato($row['prato_idprato']));
        
        return $ListaLikes;
    }
    
    public function buscarLikesPrato($idPrato)
    {
        return $this->buscar(array("prato_idprato = {$idPrato}"));
    }

    public function deletar($idUsuario, $idPrato)
    {
        DAL::query("DELETE FROM like_prato
                          WHERE usuario_idusuario = {$idUsuario}
                            AND prato_idprato = {$idPrato}");
    }
    
    public function buscarQtdLikesPrato($idPrato)
    {
        $query = DAL::query("SELECT COUNT(0) AS total
                               FROM like_prato
                              WHERE prato_idprato = {$idPrato}");
                              
        $row = mysqli_fetch_array($query);
        return $row['total'];
    }

    public function buscarLikePorIDUsuarioIDPrato($idUsuario, $idPrato)
    {
        $query = DAL::query("SELECT COUNT(0) AS total
                               FROM like_prato
                              WHERE prato_idprato = {$idPrato}
                                AND usuario_idusuario = {$idUsuario}");
                              
        $row = mysqli_fetch_array($query);
        return $row['total'];
    }
}