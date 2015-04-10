<?php

if (file_exists('controller/EntidadeAutenticavel.php')) { require_once 'controller/EntidadeAutenticavel.php'; }
else { require_once 'EntidadeAutenticavel.php'; }

if (file_exists('../model/RestauranteModel.php')) { require_once '../model/RestauranteModel.php'; }
else { require_once 'model/RestauranteModel.php'; }

/**
 * Classe controladora para a entidade Restaurante
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class RestauranteController implements EntidadeAutenticavel
{
    const SESSION_RESTAURANTE = "RESTAURANTE";
    
    /**
     * Função para autenticar um restaurante
     * @param \Restaurante $Restaurante
     */
    public function autenticar(\Entidade $Restaurante)
    {
        $RestauranteModel = new RestauranteModel();
        $ListaRestaurantes = $RestauranteModel->buscarPorEmailSenha($Restaurante->getEmail(), $Restaurante->getSenha());
        
        if (count($ListaRestaurantes) == 1)
        {
            @session_start();
            $_SESSION[RestauranteController::SESSION_RESTAURANTE] = $ListaRestaurantes[0];
            header("Location: restaurante/index.php");
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
        
        if (isset($_SESSION[RestauranteController::SESSION_RESTAURANTE]))
        {        
            $Restaurante = $_SESSION[RestauranteController::SESSION_RESTAURANTE];

            $RestauranteModel = new RestauranteModel();
            $ListaRestaurantes = $RestauranteModel->buscarPorEmailSenha($Restaurante->getEmail(), $Restaurante->getSenha());
            
            if (count($ListaRestaurantes) == 1)
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