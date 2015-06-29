<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

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

    public function buscar($where = null)
    {
        $query = DAL::query("SELECT idtipo_contato,
                                    descricao
                               FROM tipo_contato
                            " . ($where ? " WHERE " . implode(" AND ", $where) : ""));
        
        $ListaTipoContato = array();
        
        while ($row = mysqli_fetch_array($query))
            $ListaTipoContato[] = new TipoContato($row['idtipo_contato'], $row['descricao']);
        
        return $ListaTipoContato;
    }

    /**
     * Função para buscar todos os tipos de contato.
     * @return \TipoContato
     */
    public function buscarTodos()
    {
        return $this->buscar();
    }

    public function deletar($id) {
        
    }

}