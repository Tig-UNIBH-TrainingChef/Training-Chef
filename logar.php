<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

$UsuarioController = new UsuarioController();

if (isset($_POST['btn_logar']))
    if (!$UsuarioController->autenticar(new Usuario(null, null, $_POST['email'], $_POST['senha'])))
    {
        ?>
        <script>
            alert("Os dados de autenticação fornecidos não são válidos!");
        </script>
        <?php
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
                                <p>
                                    <button class="btn btn-success" name="btn_logar">Entrar</button>
                                    <a href="#">Esqueci minha senha</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'view/rodape.php'; ?>
    </body>
</html>