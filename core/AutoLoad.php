<?php

$diretorioConfig = "{$_SERVER['DOCUMENT_ROOT']}/trainingchef";
$arrayMVC = array(
    
    'Core' => array(
        'DAL.php',
        'SiteConfig.php'
    ),
    
    'Entity' => array(
        'Entidade.php',
        'FormaDeContato.php',
        'Postagem.php',
        'Prato.php',
        'Restaurante.php',
        'TipoContato.php',
        'Usuario.php',
        'LikePrato.php'
    ),
    
    'Model' => array(
        'Model.php',
        'FormaDeContatoModel.php',
        'PostagemModel.php',
        'PratoModel.php',
        'RestauranteModel.php',
        'TipoContatoModel.php',
        'UsuarioModel.php',
        'LikePratoModel.php'
    ),
    
    'Controller' => array(
        'EntidadeAutenticavel.php',
        'FormaDeContatoController.php',
        'PostagemController.php',
        'PratoController.php',
        'RestauranteController.php',
        'UsuarioController.php',
        'LikePratoController.php'
    )
);

foreach ($arrayMVC as $diretorio => $listaArquivo)
    foreach ($listaArquivo as $nomeArquivo)
        require_once "$diretorioConfig/$diretorio/$nomeArquivo";