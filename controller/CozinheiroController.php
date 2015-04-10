<?php

if (file_exists('controller/EntidadeAutenticavel.php')) { require_once 'controller/EntidadeAutenticavel.php'; }
else { require_once 'EntidadeAutenticavel.php'; }

if (file_exists('../model/CozinheiroModel.php')) { require_once '../model/CozinheiroModel.php'; }
else { require_once 'model/CozinheiroModel.php'; }

/**
 * Classe controladora para a entidade Cozinheiro
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class CozinheiroController implements EntidadeAutenticavel
{
    const SESSION_COZINHEIRO = "COZINHEIRO";
    
    /**
     * Função para autenticar um cozinheiro
     * @param \Cozinheiro $Cozinheiro
     */
    public function autenticar(\Entidade $Cozinheiro)
    {
        $CozinheiroModel = new CozinheiroModel();
        $ListaCozinheiros = $CozinheiroModel->buscarPorEmailSenha($Cozinheiro->getEmail(), $Cozinheiro->getSenha());
        
        if (count($ListaCozinheiros) == 1)
        {
            @session_start();
            $_SESSION[CozinheiroController::SESSION_COZINHEIRO] = $ListaCozinheiros[0];
            header("Location: cozinheiro/index.php");
        }
        else
        {
            return false;
        }
    }

    /**
     * Função para finalizar uma sessão
     */
    public function finalizarSessao()
    {
        @session_start();
        @session_destroy();
        $this->validarSessao();
    }

    /**
     * Função para validar uma sessão
     * @return boolean
     */
    public function validarSessao()
    {
        @session_start();
        $resultadoValidacao = false;
        
        if (isset($_SESSION[CozinheiroController::SESSION_COZINHEIRO]))
        {        
            $Cozinheiro = $_SESSION[CozinheiroController::SESSION_COZINHEIRO];

            $CozinheiroModel = new CozinheiroModel();
            $ListaCozinheiros = $CozinheiroModel->buscarPorEmailSenha($Cozinheiro->getEmail(), $Cozinheiro->getSenha());
            
            if (count($ListaCozinheiros) == 1)
            {
                $resultadoValidacao = true;
            }
        }
        else
        {
            $resultadoValidacao = false;
        }
        
        if ($resultadoValidacao == false)
        {
            @session_destroy();
            header("Location: ../logar.php");
            return false;
        }
    }

    /**
     * Função para retornar a instância do cozinheiro da sessão.
     * @return \Cozinheiro
     */
    public function getInstance()
    {
        @session_start();
        return $_SESSION[CozinheiroController::SESSION_COZINHEIRO];
    }

}

?>