<?php
include 'view/head.php';
include 'view/navegacao.php';

$UsuarioController = new UsuarioController();
$UsuarioController->validarSessao();

$UsuarioModel = new UsuarioModel();

$Usuario = new Usuario();
if (isset($_GET['idusuario']) || trim($_GET['idusuario'] != ""))
    $Usuario = $UsuarioModel->buscar(array("idusuario = " . $_GET['idusuario']));
else
    $Usuario = $UsuarioModel->buscar(array("idusuario = " . $UsuarioController->getInstance()->getID()))[0];

$PostagemModel = new PostagemModel();
$ListaPostagens = $PostagemModel->buscarTodos();
?>
<div class="container">
    <div class="row">
        
        <div class="col-md-2" style="margin: 15px 15px 15px 15px">
            <div class="row">
                <?php // Foto do perfil ?>
                <div class="panel panel-primary">
                    <div class="panel-body" style="padding: 5px 5px 5px 5px;">
                        <img src="/resources/perfil/cozinheiro/<?=$Usuario->getImagem();?>" style="width: 100%;" class="img-responsive"/>
                    </div>
                </div>
                
                <?php // Informações gerais ?>
                <p style="padding: 5px 5px 5px 5px;">
                    <b><?=$Usuario->getNome();?></b> <a href="#modalAlterarNomeUsuario" data-toggle="modal">Alterar</a><br />
                    <i><?=$Usuario->getEmail();?></i>
                </p>
                
                <!-- Modals -->
                <?php include 'view/modals/alterar_nome_usuario.php'; ?>
            </div>
        </div>
        
        <div class="col-md-9" style="margin: 15px 15px 15px 15px">
            
            <?php if ($UsuarioController->getInstance()->getID() == $Usuario->getID()) : ?>
            <div class="row text-right">
                <form method="post" name="form_postagem" action="">
                    <textarea name="texto_post" class="form-control texto-postagem" placeholder="Digite uma postagem!"></textarea>
                    <button name="btn_postar_texto" class="btn btn-primary" type="submit">Postar</button>
                </form>
            </div><br><br>
            <?php endif; ?>
            
            <div class="row">
                <?php if (count($ListaPostagens) == 0) : ?>
                <p class="text-muted"><i>Sem postagens</i></p>
                <?php endif; ?>
                <?php for ($i = 0; $i < count($ListaPostagens); $i++) : ?>
                <div class="panel panel-default">
                    <div class="panel-body" style="padding: 5px 5px 5px 5px;">
                        <div class="col-md-2">
                            <div class="panel panel-primary">
                                <div class="panel-body" style="padding: 5px 5px 5px 5px;">
                                    <img src="/resources/perfil/cozinheiro/<?=$ListaPostagens[$i]->getUsuario()->getImagem();?>" style="width: 100%;" class="img-responsive"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <span class="text-muted">
                                Por <a href="perfil.php?idusuario=<?=$ListaPostagens[$i]->getUsuario()->getID();?>"><i><?=$ListaPostagens[$i]->getUsuario()->getNome();?></i></a> às 
                                <i><?=date("d/m/Y h:i:s", strtotime($ListaPostagens[$i]->getData()));?></i> - 
                                <a href="?action=del&post=<?=$ListaPostagens[$i]->getIDPostagem();?>">Deletar</a>
                            </span>
                            <p><?=$ListaPostagens[$i]->getTexto();?></p>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>        
    </div>
</div>
<?php include 'view/footer.php'; ?>
<?php
// Tratamento de post
if (isset($_POST['btn_alterar_nome_usuario']))
{
    $UsuarioController->alterarNome($UsuarioController->getInstance()->getID(), $_POST['novo_nome']);
    ?><script>window.location = "feed.php";</script><?php
}

if (isset($_POST['btn_postar_texto']))
{
    $postagem = trim($_POST['texto_post']);
    if (strlen(str_replace(" ", "", $postagem)) == "")
    {
        ?><script>alert("Por favor, escreva um texto válido");</script><?php
    }
    else
    {
        $Postagem = new Postagem();
        
        $Usuario = $UsuarioController->getInstance();
        $Postagem->setUsuario($Usuario);
        $Postagem->setTexto($postagem);
        
        $PostagemModel = new PostagemModel();
        $PostagemModel->cadastrar($Postagem);
        
        ?>
        <script>
            window.location = "feed.php";
        </script>
        <?php
    }
}

if (isset($_GET['action']))
{
    if ($_GET['action'] == 'del')
    {
        if (isset($_GET['post']))
        {
            $PostagemModel = new PostagemModel();
            $PostagemModel->deletar($_GET['post']);
            
            ?>
            <script>
                alert("Postagem deletada com sucesso!");
                window.location = "feed.php";
            </script>
            <?php
        }
        else if (isset($_GET['prato']))
        {
            $PratoModel = new PratoModel();
            $PratoModel->deletar($_GET['prato']);
            
            ?>
            <script>
                alert("Prato deletado com sucesso!");
                window.location = "feed.php";
            </script>
            <?php
        }
    }
}
?>