<?php

/**
 * Arquivo que faz o include de todos os arquivos do MVC do programa.
 */

// Core:
include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/DAL.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/SiteConfig.php';

// Entidades:
include_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/Entidade.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/Usuario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/Prato.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/Postagem.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/FormaDeContato.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/TipoContato.php';

// Modelos:
include_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Model.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Model/UsuarioModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Model/PratoModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Model/PostagemModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Model/FormaDeContatoModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Model/TipoContatoModel.php';

// Controladores:
include_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/EntidadeAutenticavel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/UsuarioController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/PratoController.php';