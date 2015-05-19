<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

/**
 * Classe modelo para a entidade Tipo de Contato
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class TipoContatoModel implements Model
{
    /**
     * Função para cadastrar um tipo de contato
     * @param \Entidade $Entidade
     */
    public function cadastrar(\Entidade $Entidade)
    {
        
    }
    
    public function atualizar(\Entidade $Entidade) {
        
    }

    public function buscar($where) {
    }

    /**
     * Função para buscar todos os tipos de contato.
     * @return \TipoContato
     */
    public function buscarTodos()
    {
        $DAL = new DAL();
        
        $sql = "SELECT idtipo_contato,
                       descricao
                  FROM tipo_contato";
        
        $query = $DAL->query($sql);
        
        $ListaTipoContato = array();
        
        while ($row = mysqli_fetch_array($query))
        {
            $TipoContato = new TipoContato();
            $TipoContato->setID($row['idtipo_contato']);
            $TipoContato->setDescricao($row['descricao']);
            
            $ListaTipoContato[] = $TipoContato;
        }
        
        return $ListaTipoContato;
    }

    public function deletar($id) {
        
    }

}