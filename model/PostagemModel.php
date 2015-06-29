<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

/**
 * Classe modelo para a entidade Postagem
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class PostagemModel implements Model
{
    public function cadastrar(\Entidade $Postagem)
    {
        DAL::query("INSERT INTO postagem (usuario_idusuario,
                                          texto,
                                          data)
                                  VALUES ({$Postagem->getUsuario()->getID()},
                                          '{$Postagem->getTexto()}',
                                          '" . date("Y-m-d h:i:s") . "')");
    }
    
    public function atualizar(\Entidade $Entidade)
    {
        
    }

    public function buscar($where = null)
    {
        $UsuarioModel = new UsuarioModel();
        
        $query = DAL::query("SELECT idpostagem,
                                    usuario_idusuario,
                                    texto,
                                    data
                               FROM postagem
                            " . ($where ? " WHERE " . implode(" AND ", $where) : "") . "
                           ORDER BY idpostagem DESC");
        
        $ListaPostagens = array();
        
        while ($row = mysqli_fetch_array($query))
            $ListaPostagens[] = new Postagem($row['idpostagem'], $UsuarioModel->buscarPorID($row['usuario_idusuario']), $row['texto'], $row['data']);
        
        return $ListaPostagens;
    }

    public function buscarTodos()
    {
        return $this->buscar();
    }
    
    public function buscarPostagensIDUsuario($idUsuario)
    {
        return $this->buscarTodos(array("usuario_idusuario = {$idUsuario}"));
    }

    public function deletar($id)
    {
        DAL::query("DELETE FROM postagem WHERE idpostagem = {$id}");
    }
}