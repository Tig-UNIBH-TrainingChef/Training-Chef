<?php
include 'view/head.php';
include 'view/navegacao.php';

if (isset($_GET['action']))
{
    if ($_GET['action'] == 'deslogar')
    {
        $UsuarioController = new UsuarioController();
        $UsuarioController->finalizarSessao();
    }
}

header("Location: feed.php");

?>

<?php include 'view/footer.php'; ?>