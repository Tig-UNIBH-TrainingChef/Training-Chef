<?php
include 'view/head.php';
include 'view/navegacao.php';

if ($_GET['idprato'] == "" || !isset($_GET['idprato']))
    header("Location: index.php");

$UsuarioController = new UsuarioController();
$UsuarioController->validarSessao();

$UsuarioModel = new UsuarioModel();
$Usuario = $UsuarioModel->BuscarPorID($UsuarioController->getInstance()->getID());

$PratoModel = new PratoModel();
$Prato = $PratoModel->buscarPorID($_GET['idprato']);
?>
<div class="container">
    <div class="row">
        
        <div class="col-md-4" style="margin: 15px 15px 15px 15px">
            <div class="row">
                <?php // Foto do prato ?>
                <div class="panel panel-primary">
                    <div class="panel-body" style="padding: 5px 5px 5px 5px;">
                        <p><img src="../resources/prato/<?=$Prato->getImagem();?>" style="width: 100%;" class="img-responsive"/></p>
                        <p>
                            <!-- Likes -->
                            <?php
                            $LikePratoModel = new LikePratoModel();
                            $ListaLikesPrato = $LikePratoModel->buscarLikesPrato($Prato->getID());

                            if ($LikePratoModel->buscarLikePorIDUsuarioIDPrato($Prato->getUsuario()->getID(), $Prato->getID()) > 0)
                            {
                                ?>
                                <a href="prato.php?action=unlike&idprato=<?=$Prato->getID()?>">
                                    <img src="../resources/like/like.png" width="16" />
                                </a>
                                <?php
                            }
                            else
                            {

                                ?>
                                <a href="prato.php?action=like&idprato=<?=$Prato->getID()?>">
                                    <img src="../resources/like/unlike.png" width="16" />
                                </a>
                                <?php
                            }
                            ?>
                            <?=count($ListaLikesPrato);?>
                            </a>
                        </p>
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
                                        <img src="../resources/perfil/cozinheiro/<?=$Prato->getUsuario()->getImagem();?>" style="width: 100%;" class="img-responsive"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <p><b>Cozinheiro:</b> <?=$Prato->getUsuario()->getNome();?></p>
                                <p><a role="button" class="btn btn-primary" href="perfil.php?idcozinheiro=<?=$Prato->getUsuario()->getID();?>">Ver perfil</a></p>
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

<?php
if ($_GET['action'] == 'like')
{
    if (isset($_GET['idprato']))
    {
        $LikePratoController = new LikePratoController();
        $LikePratoController->like($UsuarioController->getInstance()->getID(), $_GET['idprato']);
        ?>
        <script>
            window.location = "prato.php?idprato=<?=$_GET['idprato']?>";
        </script>
        <?php
    }
}
else if ($_GET['action'] == 'unlike')
{
    if (isset($_GET['idprato']))
    {
        $LikePratoController = new LikePratoController();
        $LikePratoController->unlike($UsuarioController->getInstance()->getID(), $_GET['idprato']);
        ?>
        <script>
            window.location = "prato.php?idprato=<?=$_GET['idprato']?>";
        </script>
        <?php
    }
}
?>