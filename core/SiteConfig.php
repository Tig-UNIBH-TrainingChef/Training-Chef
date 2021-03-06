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
    public static $LOGOTIPO_HORIZONTAL = "http://trainingchef.com.br/view/images/logotipo_horizontal.png";
    
    /**
     * Páginas de menu
     * @var type 
     */
    public static $MENU_PAGINAS_SITE = array(
        array(
            'href' => 'index.php',
            'desc' => 'Home'
        ),
        array(
            'href' => 'quem_somos.php',
            'desc' => 'Sobre o projeto'
        ),
        array(
            'href' => 'acompanhamento.php',
            'desc' => 'Progresso de construção'
        ),
        array(
            'href' => 'cadastrar.php',
            'desc' => 'Cadastrar'
        ),
        array(
            'href' => 'logar.php',
            'desc' => 'Acessar'
        )
    );
    
    /**
     * Páginas de menu
     * @var type 
     */
    public static $MENU_PAGINAS_SITE_COZINHEIRO = array(
        array(
            'href' => 'index.php',
            'desc' => 'Home'
        ),
        array(
            'href' => 'perfil.php',
            'desc' => 'Perfil'
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
    
    /**
     * Links de social
     * @var type 
     */
    public static $MENU_LINKS_SOCIAL = array(
        array(
            'name' => 'facebook',
            'link' => 'https://www.facebook.com/trainningchef'
        ),
        /* array(
            'name' => 'twitter',
            'link' => '#'
        ),
        array(
            'name' => 'linkedin',
            'link' => '#'
        ),
        array(
            'name' => 'dribbble',
            'link' => '#'
        ),
        array(
            'name' => 'skype',
            'link' => '#'
        ) */
    );
}