<?php

if (file_exists('../entity/Entidade.php')) { require_once '../entity/Entidade.php'; }
else { require_once 'entity/Entidade.php'; }

/**
 * Interface para implementação de classes modelo
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
interface Model
{
    /**
     * Função para cadastrar uma entidade
     * @param Entidade $Entidade
     */
    public function cadastrar(Entidade $Entidade);
    
    /**
     * Função para atualizar uma entidade
     * @param Entidade $Entidade
     */
    public function atualizar(Entidade $Entidade);
    
    /**
     * Função para buscar uma unica entidade pelo seu ID unico
     * @param int $id
     */
    public function buscar($id);
    
    /**
     * Função para buscar todas as entidades
     */
    public function buscarTodos();
    
    /**
     * Função para deletar uma entidade pelo seu ID unico
     * @param int $id
     */
    public function deletar($id);
}

?>