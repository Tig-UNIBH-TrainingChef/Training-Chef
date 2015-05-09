<?php

/**
 * Arquivo que faz o include de todos os arquivos do MVC do programa.
 */

// Core:
include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/DAL.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/SiteConfig.php';

// Entidades:
include_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/Entidade.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/Cozinheiro.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/Prato.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/Restaurante.php';

// Modelos:
include_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Model.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Model/CozinheiroModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Model/PratoModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Model/RestauranteModel.php';

// Controladores:
include_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/EntidadeAutenticavel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/CozinheiroController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/RestauranteController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/PratoController.php';