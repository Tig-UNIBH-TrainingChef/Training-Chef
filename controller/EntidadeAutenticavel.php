<?php

if (file_exists('../entity/Entidade.php')) { require_once '../entity/Entidade.php'; }
else { require_once 'entity/Entidade.php'; }

/**
 * Interface para controllers de entidades autenticáveis
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
interface EntidadeAutenticavel
{
    /**
     * Função para autenticar uma entidade.
     * @param Entidade $Entidade
     */
    public function autenticar(Entidade $Entidade);
    
    /**
     * Função para validar uma sessão.
     */
    public function validarSessao();
    
    /**
     * Função para finalizar uma sessão.
     */
    public function finalizarSessao();
    
    /**
     * Função para retornar a instancia da entidade autenticavel.
     */
    public function getInstance();
}

?>