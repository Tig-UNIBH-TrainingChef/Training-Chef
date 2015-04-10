<?php
if (isset($_POST['btn_logar']))
{
    if ($_POST['tipo'] == "cozinheiro")
    {
        include_once 'controller/CozinheiroController.php';
        
        $Cozinheiro = new Cozinheiro();
        $Cozinheiro->setEmail($_POST['email']);
        $Cozinheiro->setSenha($_POST['senha']);
        
        $CozinheiroController = new CozinheiroController();
        if (!$CozinheiroController->autenticar($Cozinheiro))
        {
            ?>
            <script>
                alert("Os dados de autenticação fornecidos não são válidos!");
            </script>
            <?php
        }
    }
    else if ($_POST['tipo'] == "restaurante")
    {
        include_once 'controller/RestauranteController.php';
        
        $Restaurante = new Restaurante();
        $Restaurante->setEmail($_POST['email']);
        $Restaurante->setSenha($_POST['senha']);
        
        $RestauranteController = new RestauranteController();
        if (!$RestauranteController->autenticar($Restaurante))
        {
            ?>
            <script>
                alert("Os dados de autenticação fornecidos não são válidos!");
            </script>
            <?php
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'view/head.php'; ?>
    <body>
        <?php include 'view/cabecalho.php'; ?>
        <section id="about-us">
            <div class="container">
                <div class="center wow fadeInDown">
                    <h2>Acesse a sua conta do Training Chef!</h2>
                    <br>
                    <div class="row">
                        <div class="col-md-5 col-sm-6">
                            <img src="view/images/logar.png" width="95%"/>
                        </div>
                        <div class="col-sm-7 col-sm-6">
                            <p class="left">Acesse com o seu e-mail de cadastro e sua senha:</p>
                            <form action="logar.php" method="post" onsubmit="return validarForm(this);">
                                <p><input style="width: 100%" type="email" name="email" placeholder="Seu e-mail" /></p>
                                <p><input style="width: 100%" type="password" name="senha" placeholder="Sua senha" /></p>
                                <p>Você é um:</p>
                                <div class="left">
                                    <p><input type="radio" name="tipo" value="cozinheiro" checked="checked" /> Cozinheiro</p>
                                    <p><input type="radio" name="tipo" value="restaurante" /> Restaurante</p>
                                </div>
                                <br><br>
                                <p><button class="btn btn-success" name="btn_logar">Entrar</button></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php include 'view/rodape.php'; ?>

        <script src="view/js/jquery.js"></script>
        <script type="text/javascript">
            $('.carousel').carousel();
        </script>
        <script src="view/js/bootstrap.min.js"></script>
        <script src="view/js/jquery.prettyPhoto.js"></script>
        <script src="view/js/jquery.isotope.min.js"></script>
        <script src="view/js/main.js"></script>
        <script src="view/js/wow.min.js"></script>
        <script src="view/js/validacoes/validaFormLogin.js"></script>
    </body>
</html>