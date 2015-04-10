<?php

/*
 * Esta classe é responsável por gerenciar todas as informações estáticas do site,
 * como, por exemplo, o nome do site.
 */

/**
 * Classe de configuração
 * @author Victor Vaz de Oliveira <victor-vaz@hotmail.com>
 */
class SiteConfig
{
    /**
     * Nome do site
     * @var String
     */
    public static $NOME_SITE = "Training Chef";
    
    /**
     * Caminho da logotipo do site
     * @var String
     */
    public static $LOGOTIPO_HORIZONTAL = "../view/images/logotipo_horizontal.png";
    
    /**
     * Diretório para upload de imagens de perfil.
     * @var String
     */
    public static $DIRETORIO_IMAGENS_PERFIL = "view/images/perfil/";
    
    /**
     * Diretório para upload de imagens de pratos.
     * @var String
     */
    public static $DIRETORIO_IMAGENS_PRATO = "view/images/prato/";
    
    /**
     * Prefixo do endereço para as páginas
     * @var type 
     */
    public static $PREFIXO_ENDERECO = "/trainingchef/cozinheiro/";
    
    /**
     * Páginas de menu
     * @var type 
     */
    public static $MENU_PAGINAS = array(
        array(
            'href' => 'index.php',
            'desc' => 'Home'
        ),
        array(
            'href' => 'novo_prato.php',
            'desc' => 'Novo prato'
        ),
        array(
            'href' => 'meus_pratos.php',
            'desc' => 'Meus pratos'
        ),
    );
}