<?php
include 'view/head.php';
include 'view/navegacao.php';

if ($_GET['idprato'] == "" || !isset($_GET['idprato']))
    header("Location: index.php");

$UsuarioController = new CozinheiroController();
$UsuarioController->validarSessao();

$UsuarioModel = new CozinheiroModel();
$Usuario = $UsuarioModel->buscar($UsuarioController->getInstance()->getID());

$PratoModel = new PratoModel();
$Prato = $PratoModel->buscar($_GET['idprato']);
?>
<div class="container">
    <div class="row">
        
        <div class="col-md-4" style="margin: 15px 15px 15px 15px">
            <div class="row">
                <?php // Foto do prato ?>
                <div class="panel panel-primary">
                    <div class="panel-body" style="padding: 5px 5px 5px 5px;">
                        <img src="/resources/prato/<?=$Prato->getImagem();?>" style="width: 100%;" class="img-responsive"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-body" style="padding: 5px 5px 5px 5px;">
                                        <img src="/resources/perfil/cozinheiro/<?=$Prato->getCozinheiro()->getImagem();?>" style="width: 100%;" class="img-responsive"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <p><b>Cozinheiro:</b> <?=$Prato->getCozinheiro()->getNome();?></p>
                                <p><a role="button" class="btn btn-primary" href="perfil.php?idcozinheiro=<?=$Prato->getCozinheiro()->getID();?>">Ver perfil</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7" style="margin: 15px 15px 15px 15px">
            <div class="row">
                <h2><?=$Prato->getNome();?></h2><br>
            </div>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">Descrição</div>
                    <div class="panel-body">
                        <?=$Prato->getDescricao();?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">Receita</div>
                    <div class="panel-body">
                        <?=str_replace("\n", "<br>", $Prato->getReceita());?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'view/footer.php'; ?>