<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

$PratoModel = new PratoModel();
$CozinheiroController = new CozinheiroController();
$ListaPratos = $PratoModel->buscarPorCozinheiro($CozinheiroController->getInstance()->getID());

?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include 'view/head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include_once 'view/cabecalho.php'; ?> 
            <?php include_once 'view/menu_esquerda.php'; ?>
            <div id="page-wrapper" >
                <div class="row">
                    <div class="col-md-12"><h2>Meus pratos</h2></div>
                </div>
                <hr />
                <div class="row">
                    <?php if (count($ListaPratos) == 0) : ?>
                    <div class="alert alert-info" role="alert">
                        Você ainda não cadastrou um prato. <a href="novo_prato.php">Cadastre agora!</a>
                    </div>
                    <?php endif; ?>
                    <?php for ($i = 0; $i < count($ListaPratos); $i++) : ?>
                        <?php if ($i % 3 == 0) : ?>
                            </div>
                            <div class="row">
                        <?php endif; ?>
                        <div class="col-md-4 col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php print $ListaPratos[$i]->getNome(); ?>
                                </div>
                                <div class="panel-body">
                                    <div class="center">
                                        <image class="img-thumbnail" width="100%" src="<?php print $ListaPratos[$i]->getImagem(); ?>" />
                                    </div>
                                    <br>
                                    <b>Nome: </b><?php print $ListaPratos[$i]->getNome(); ?>
                                    <br>
                                    <b>Descrição: </b><?php print $ListaPratos[$i]->getDescricao(); ?>
                                    <div class="text-right">
                                        <a href="detalhes_prato.php?id=<?php print $ListaPratos[$i]->getID(); ?>">Ver mais</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </body>
</html>
