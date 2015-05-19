<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

/**
 * Classe modelo para a entidade Postagem
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class PostagemModel implements Model
{
    public function cadastrar(\Entidade $Postagem)
    {
        $sql = "INSERT INTO postagem (usuario_idusuario,
                                      texto,
                                      data)
                              VALUES (" . $Postagem->getUsuario()->getID() . ",
                                      '" . $Postagem->getTexto() . "',
                                      '" . date("Y-m-d h:i:s") . "')";
        
        $DAL = new DAL();
        $DAL->query($sql);
    }
    
    public function atualizar(\Entidade $Entidade)
    {
        
    }

    public function buscar($id) {
        
    }

    public function buscarTodos($where = null)
    {
        if ($where)
            $where = " WHERE " . implode(" AND ", $where);
        
        $sql = "SELECT idpostagem,
                       usuario_idusuario,
                       texto,
                       data
                  FROM postagem
               {$where}
              ORDER BY idpostagem DESC";
        
        $DAL = new DAL();
        $query = $DAL->query($sql);
        
        $ListaPostagens = array();
        
        while ($row = mysqli_fetch_array($query))
        {
            $Postagem = new Postagem;
            $Postagem->setIDPostagem($row['idpostagem']);
            $Postagem->setTexto($row['texto']);
            $Postagem->setData($row['data']);
            
            $UsuarioModel = new UsuarioModel();
            $Postagem->setUsuario($UsuarioModel->buscar(array("idusuario = " . $row['usuario_idusuario']))[0]);
            
            $ListaPostagens[] = $Postagem;
        }
        
        return $ListaPostagens;
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM postagem
                      WHERE idpostagem = {$id}";
        
        $DAL = new DAL();
        $DAL->query($sql);
    }
}