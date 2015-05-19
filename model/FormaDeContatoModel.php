<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

/**
 * Classe modelo para a entidade Forma de Contato
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class FormaDeContatoModel implements Model
{
    public function cadastrar(\Entidade $Entidade)
    {
        $DAL = new DAL();
        
        $sql = "INSERT INTO forma_contato (tipo_contato_idtipo_contato,
                                           usuario_idusuario,
                                           valor)
                                   VALUES ( " . $Entidade->getTipoContato()->getID() . ",
                                            " . $Entidade->getUsuario()->getID() . ",
                                           '" . $Entidade->getValor() . "')";
        
        $DAL->query($sql);
    }
    
    public function atualizar(\Entidade $Entidade) {
        
    }

    /**
     * Função para buscar as formas de contato cadastradas.
     * @param string $where
     * @return \FormaDeContato
     */
    public function buscar($where = null)
    {
       if ($where)
            $where = " WHERE " . implode(" AND ", $where);
       
       $DAL = new DAL();
       
       $sql = "SELECT f.idforma_contato,
                      f.usuario_idusuario,
                      f.valor,
                      t.idtipo_contato,
                      t.descricao
                 FROM forma_contato f
           INNER JOIN tipo_contato t
                   ON f.tipo_contato_idtipo_contato = t.idtipo_contato
              {$where}";
              
       $query = $DAL->query($sql);
       
       $ListaTipoContato = array();
       
       while ($row = mysqli_fetch_array($query))
       {
           $TipoContato = new TipoContato();
           $TipoContato->setID($row['idtipo_contato']);
           $TipoContato->setDescricao($row['descricao']);
           
           $Usuario = new Usuario();
           $Usuario->setID($row['usuario_idusuario']);
           
           $FormaDeContato = new FormaDeContato();
           $FormaDeContato->setIDFormaDeContato($row['idforma_contato']);
           $FormaDeContato->setTipoContato($TipoContato);
           $FormaDeContato->setUsuario($Usuario);
           $FormaDeContato->setValor($row['valor']);
           
           $ListaTipoContato[] = $FormaDeContato;
       }
       
       return $ListaTipoContato;
    }

    public function buscarTodos() {
        
    }

    public function deletar($id)
    {
        $DAL = new DAL();
        
        $sql = "DELETE FROM forma_contato WHERE idforma_contato = {$id}";
        
        $DAL->query($sql);
    }

}