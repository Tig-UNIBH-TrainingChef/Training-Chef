<?php
if (isset($_POST['btn_cadastrar']))
{
    if ($_POST['tipo'] == "cozinheiro")
    {
        include_once 'model/CozinheiroModel.php';
        
        $Cozinheiro = new Cozinheiro();
        $Cozinheiro->setNome($_POST['nome']);
        $Cozinheiro->setEmail($_POST['email']);
        $Cozinheiro->setSenha($_POST['senha']);
        
        $CozinheiroModel = new CozinheiroModel();
        $CozinheiroModel->cadastrar($Cozinheiro);
        
        ?><script>alert("Cozinheiro cadastrado com sucesso!");</script><?php
    }
    else if ($_POST['tipo'] == "restaurante")
    {
        include_once 'model/RestauranteModel.php';
        
        $Restaurante = new Restaurante();
        $Restaurante->setNome($_POST['nome']);
        $Restaurante->setEmail($_POST['email']);
        $Restaurante->setSenha($_POST['senha']);
        
        $RestauranteModel = new RestauranteModel();
        $RestauranteModel->cadastrar($Restaurante);
        
        ?><script>alert("Restaurante cadastrado com sucesso!");</script><?php
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
                    <h2>Participe agora do Training Chef!</h2>
                    <br>
                    <div class="row">
                        <div class="col-md-5 col-sm-6">
                            <img src="view/images/cadastrar.png" width="95%"/>
                        </div>
                        <div class="col-sm-7 col-sm-6">
                            <p class="left">Para participar do Training Chef, você precisa preencher o formulário abaixo:</p>
                            <form action="cadastrar.php" method="post" onsubmit="return validarForm(this)">
                                <p><input style="width: 100%" type="text" name="nome" placeholder="Seu nome" /></p>
                                <p><input style="width: 100%" type="email" name="email" placeholder="Seu e-mail" /></p>
                                <p><input style="width: 100%" type="password" name="senha" placeholder="Sua senha" /></p>
                                <p><input style="width: 100%" type="password" name="conf_senha" placeholder="Confirme sua senha" /></p>
                                <p>Você é um:</p>
                                <div class="left">
                                    <p><input type="radio" name="tipo" value="cozinheiro" checked="checked" /> Cozinheiro, porque quero cozinhar em um restaurante.</p>
                                    <p><input type="radio" name="tipo" value="restaurante" /> Restaurante, porque quero procurar um cozinheiro.</p>
                                </div>
                                <br><br>
                                <p>Ao clicar no botão cadastrar, você estará aceitando automaticamente os nossos termos e condições.</p>
                                <p><button class="btn btn-success" name="btn_cadastrar">Cadastrar</button></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php include 'view/rodape.php'; ?>

        <script src="view/js/jquery.js"></script>
        <script type="text/javascript">
            $('.carousel').carousel()
        </script>
        <script src="view/js/bootstrap.min.js"></script>
        <script src="view/js/jquery.prettyPhoto.js"></script>
        <script src="view/js/jquery.isotope.min.js"></script>
        <script src="view/js/main.js"></script>
        <script src="view/js/wow.min.js"></script>
        <script src="view/js/validacoes/validaFormCadastro.js"></script>
    </body>
</html>