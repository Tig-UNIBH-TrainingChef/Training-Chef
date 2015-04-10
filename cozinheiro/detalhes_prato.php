<?php
include_once 'core/SiteConfig.php';
include_once '../controller/CozinheiroController.php';
include_once '../model/PratoModel.php';

if (isset($_GET['id']))
{
    $PratoModel = new PratoModel();
    $Prato = $PratoModel->buscar($_GET['id']);
}
else
{
    header("Location: meus_pratos.php");
}

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
                    <div class="col-md-12"><h2><?php print $Prato->getNome(); ?></h2></div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="#" onclick="deletarPrato(<?php print $Prato->getID(); ?>)">
                            <span class="glyphicon glyphicon-trash"></span> Apagar Prato
                        </a>
                    </div><br><br>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <image class="img-thumbnail" src="<?php print $Prato->getImagem(); ?>" width="100%" /><br><br>
                    </div>
                    <div class="col-md-8 col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Descrição
                            </div>
                            <div class="panel-body text-justify">
                                <?php print str_replace("\n", "<br>", $Prato->getDescricao()); ?></p>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Receita:
                            </div>
                            <div class="panel-body text-justify">
                                <?php print str_replace("\n", "<br>", $Prato->getReceita()); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="view/js/jquery-1.10.2.js"></script>
        <script src="view/js/bootstrap.min.js"></script>
        <script src="view/js/jquery.metisMenu.js"></script>
        <script src="view/js/morris/raphael-2.1.0.min.js"></script>
        <script src="view/js/morris/morris.js"></script>
        <script src="view/js/custom.js"></script>
        <script src="view/js/validacoes/validaFormNovoPrato.js"></script>
        <script src="view/js/ajax/funcoesAjax.js"></script>
    </body>
</html>