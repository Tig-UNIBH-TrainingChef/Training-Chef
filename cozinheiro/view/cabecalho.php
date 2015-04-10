<?php
include_once '../controller/CozinheiroController.php';
include_once 'core/SiteConfig.php';
$CozinheiroController = new CozinheiroController();
$CozinheiroController->validarSessao();

if (isset($_GET['logout']))
{
    $CozinheiroController->finalizarSessao();
}
?>
<nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">
            <img src="<?php print SiteConfig::$LOGOTIPO_HORIZONTAL; ?>" width="100%">
        </a>
    </div>
    <div style="color: white; padding: 15px 50px 5px 50px; float: right;">
        <a href="index.php?logout=" class="btn btn-danger square-btn-adjust">Logout</a>
    </div>
</nav>  