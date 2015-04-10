<?php
include_once 'core/SiteConfig.php';
include_once '../controller/CozinheiroController.php';
include_once '../model/PratoModel.php';

if (isset($_POST['btn_cadastrar']))
{
    $uploadfile = SiteConfig::$DIRETORIO_IMAGENS_PRATO . basename($_FILES['foto']['name']);
    
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile))
    {
        $Prato = new Prato();
        $Prato->setNome($_POST['nome']);
        $Prato->setDescricao($_POST['descricao']);
        $Prato->setReceita($_POST['receita']);
        $Prato->setImagem($uploadfile);
        
        $CozinheiroController = new CozinheiroController();
        $Prato->setCozinheiro($CozinheiroController->getInstance());
        
        $PratoModel = new PratoModel();
        $PratoModel->cadastrar($Prato);
        
        ?>
        <script>
            alert("Prato cadastrado com sucesso!.");
            window.location = "meus_pratos.php";
        </script>
        <?php
    }
    else
    {
        ?><script>alert("Não foi possível fazer upload da imagem.");</script><?php
    }
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
                    <div class="col-md-12"><h2>Cadastrar novo prato</h2></div>
                </div>
                <hr />
                <form role="form" enctype="multipart/form-data" method="post" onsubmit="return validaForm(this);">
                    <div class="row">
                        <div class="col-md-12 col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Dados de identificação:
                                </div>
                                <div class="panel-body">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="nome" placeholder="Nome do prato *" />
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" type="text" name="descricao" placeholder="Descricao do prato *"></textarea>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Receita:
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="10" type="text" name="receita" placeholder="Receita do prato* "></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Imagem:
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input type="file" name="foto" placeholder="Foto do prato *" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-4">
                            <div style="float: right;"><button class="btn btn-success" name="btn_cadastrar">Cadastrar</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="view/js/jquery-1.10.2.js"></script>
        <script src="view/js/bootstrap.min.js"></script>
        <script src="view/js/jquery.metisMenu.js"></script>
        <script src="view/js/morris/raphael-2.1.0.min.js"></script>
        <script src="view/js/morris/morris.js"></script>
        <script src="view/js/custom.js"></script>
        <script src="view/js/validacoes/validaFormNovoPrato.js"></script>
    </body>
</html>