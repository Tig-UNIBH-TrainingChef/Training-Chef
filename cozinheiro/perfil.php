<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

$CozinheiroController = new CozinheiroController();
$Cozinheiro = new Cozinheiro();

if (isset($_GET['id']))
{
    $CozinheiroModel = new CozinheiroModel();
    $Cozinheiro = $CozinheiroModel->buscar($_GET['id']);
}
else
{
    $Cozinheiro = $CozinheiroController->getInstance();
}

if ($Cozinheiro->getID() == "")
{
    ?>
    <script>
        alert("Esse cozinheiro não existe!");
        window.location = "perfil.php";
    </script>
    <?php
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
                    <div class="col-md-12">
                        <h2><?=$Cozinheiro->getNome();?></h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">Forma de contato:</div>
                        <div class="panel-body text-justify">
                            E-mail: <?=$Cozinheiro->getEmail()?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>