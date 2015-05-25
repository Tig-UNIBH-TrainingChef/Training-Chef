<?php
include 'view/head.php';
include 'view/navegacao.php';

$UsuarioController = new UsuarioController();
$UsuarioController->validarSessao();

$UsuarioModel = new UsuarioModel();

$Usuario = new Usuario();
if (isset($_GET['idusuario']) || trim($_GET['idusuario'] != ""))
    $Usuario = $UsuarioModel->buscar(array("idusuario = " . $_GET['idusuario']))[0];
else
    $Usuario = $UsuarioModel->buscar(array("idusuario = " . $UsuarioController->getInstance()->getID()))[0];

$PostagemModel = new PostagemModel();
$ListaPostagens = $PostagemModel->buscarTodos(array("usuario_idusuario = " . $Usuario->getID()));

$PratoModel = new PratoModel();
$ListaPratos = $PratoModel->buscarTodos(array("usuario_idusuario = " . $Usuario->getID()));

$FormaDeContatoModel = new FormaDeContatoModel();
$ListaFormaDeContato = $FormaDeContatoModel->buscar(array("f.usuario_idusuario = " . $UsuarioController->getInstance()->getID()));
?>
<div class="container">
    <div class="row">

        <div class="col-md-2" style="margin: 15px 15px 15px 15px">
            <div class="row">
                <?php // Foto do perfil ?>
                <div class="panel panel-primary">
                    <div class="panel-body" style="padding: 5px 5px 5px 5px;">
                        <img src="/resources/perfil/cozinheiro/<?= $Usuario->getImagem(); ?>" style="width: 100%;" class="img-responsive"/>
                    </div>
                </div>

                <?php // Informações gerais ?>
                <p style="padding: 5px 5px 5px 5px;">
                    <b><?= $Usuario->getNome(); ?></b>
                    <?php if ($UsuarioController->getInstance()->getID() == $Usuario->getID()) : ?>
                    <a href="#modalAlterarNomeUsuario" data-toggle="modal">Alterar</a><br />
                    <?php endif; ?>
                    
                    <i><?= $Usuario->getEmail(); ?></i>
                </p>
                <br><br>
            </div>
            
            <?php // Forma de contato ?>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">Contate-me</div>
                    <div class="panel-body">
                        <?php if (count($ListaFormaDeContato) == 0) : ?>
                        <p><i>Nenhuma forma de contato cadastrada.</i></p>
                        <?php endif; ?>
                        
                        <?php for ($i = 0; $i < count($ListaFormaDeContato); $i++) : ?>
                        <p>
                            <b><?=$ListaFormaDeContato[$i]->getTipoContato()->getDescricao();?>: </b><br>
                            <i><?=$ListaFormaDeContato[$i]->getValor();?></i>
                            <a href="?action=del&contato=<?=$ListaFormaDeContato[$i]->getIDFormaDeContato();?>">Deletar</a>
                        </p>
                        <?php endfor; ?>
                        
                        <?php if ($UsuarioController->getInstance()->getID() == $Usuario->getID()) : ?>
                        <p><a href="#modalCadastrarFormaContato" role="button" class="btn btn-success" data-toggle="modal">Cadastrar</a></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Modals -->
            <?php include 'view/modals/alterar_nome_usuario.php'; ?>
            <?php include 'view/modals/cadastrar_nova_forma_contato.php'; ?>
        </div>

        <div class="col-md-5" style="margin: 15px 15px 15px 15px">

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
                                        <img src="/resources/perfil/cozinheiro/<?= $ListaPostagens[$i]->getUsuario()->getImagem(); ?>" style="width: 100%;" class="img-responsive"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <span class="text-muted">
                                    Por <a href="perfil.php?idusuario=<?=$ListaPostagens[$i]->getUsuario()->getID();?>"><i><?=$ListaPostagens[$i]->getUsuario()->getNome(); ?></i></a> às 
                                    <i><?= date("d/m/Y h:i:s", strtotime($ListaPostagens[$i]->getData())); ?></i> - 
                                    <a href="?action=del&post=<?= $ListaPostagens[$i]->getIDPostagem(); ?>">Deletar</a>
                                </span>
                                <p><?= $ListaPostagens[$i]->getTexto(); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <?php if ($Usuario->getTipoUsuario() == TIPO_USUARIO_COZINHEIRO) : ?>
        <!-- CADASTRO DE PRATOS DO COZINHEIRO -->
        <div class="col-md-4" style="margin: 15px 15px 15px 15px">
            <?php if ($UsuarioController->getInstance()->getID() == $Usuario->getID()) : ?>
                <div class="row text-left">
                    <a href="#modalCadastrarNovoPrato" role="button" class="btn btn-success" data-toggle="modal">Novo prato</a>
                </div><br>
            <?php endif; ?>
            <div class="row">
                <div class="row">
                    <?php if (count($ListaPratos) == 0) : ?>
                        <p class="text-muted"><i>Sem pratos</i></p>
                    <?php endif; ?>
                    <?php for ($i = 0; $i < count($ListaPratos); $i++) : ?>
                        <?php if ($i % 2 == 0) : ?>
                        </div>
                        <div class="row">
                        <?php endif; ?>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body" style="padding: 5px 5px 5px 5px;">
                                    <p><img src="/resources/prato/<?= $ListaPratos[$i]->getImagem() ?>" width="100%" /></p>
                                    <p><b><?= $ListaPratos[$i]->getNome() ?></b></p>
                                    <p><i><?= $ListaPratos[$i]->getDescricao() ?></i></p>
                                    <p>
                                        <i class="text-muted text-right">
                                            por <a href="perfil.php?idusuario=<?=$ListaPratos[$i]->getUsuario()->getID();?>"><?=$ListaPratos[$i]->getUsuario()->getNome(); ?></a>
                                        </i>
                                    </p>
                                    <p>
                                        <a class="btn btn-default" href="prato.php?idprato=<?= $ListaPratos[$i]->getID(); ?>">Ver detalhes</a>
                                        <?php if ($UsuarioController->getInstance()->getID() == $ListaPratos[$i]->getUsuario()->getID()) : ?>
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                                Opções <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                                <!-- IMPLEMENTAR <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Editar</a></li>-->
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="perfil.php?action=del&prato=<?= $ListaPratos[$i]->getID() ?>">Excluir</a></li>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        <?php endif; ?>
                
            <?php if ($Usuario->getTipoUsuario() == TIPO_USUARIO_RESTAURANTE) : ?>
            <!-- CADASTRO DE INFORMAÇÕES DO RESTAURANTE -->
            <div class="col-md-4" style="margin: 15px 15px 15px 15px">
            <?php if ($UsuarioController->getInstance()->getID() == $Usuario->getID()) : ?>
                <div class="row text-left">
                    <a href="#modalCadastrarNovoRestaurante" role="button" class="btn btn-success" data-toggle="modal">Novo restaurante</a>
                </div><br>
            <?php endif; ?>
            <div class="row">
                <div class="row">
                    <?php if (count($ListaPratos) == 0) : ?>
                        <p class="text-muted"><i>Sem pratos</i></p>
                    <?php endif; ?>
                    <?php for ($i = 0; $i < count($ListaPratos); $i++) : ?>
                        <?php if ($i % 2 == 0) : ?>
                        </div>
                        <div class="row">
                        <?php endif; ?>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body" style="padding: 5px 5px 5px 5px;">
                                    <p><img src="/resources/prato/<?= $ListaPratos[$i]->getImagem() ?>" width="100%" /></p>
                                    <p><b><?= $ListaPratos[$i]->getNome() ?></b></p>
                                    <p><i><?= $ListaPratos[$i]->getDescricao() ?></i></p>
                                    <p>
                                        <i class="text-muted text-right">
                                            por <a href="perfil.php?idusuario=<?=$ListaPratos[$i]->getUsuario()->getID();?>"><?=$ListaPratos[$i]->getUsuario()->getNome(); ?></a>
                                        </i>
                                    </p>
                                    <p>
                                        <a class="btn btn-default" href="prato.php?idprato=<?= $ListaPratos[$i]->getID(); ?>">Ver detalhes</a>
                                        <?php if ($UsuarioController->getInstance()->getID() == $ListaPratos[$i]->getUsuario()->getID()) : ?>
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                                Opções <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                                <!-- IMPLEMENTAR <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Editar</a></li>-->
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="perfil.php?action=del&prato=<?= $ListaPratos[$i]->getID() ?>">Excluir</a></li>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Modais -->
            <?php include 'view/modals/cadastrar_novo_prato.php'; ?>
            <?php include 'view/modals/cadastrar_novo_restaurante.php'; ?>
        </div>

    </div>
</div>
<?php include 'view/footer.php'; ?>
<?php
// Tratamento de post
if (isset($_POST['btn_alterar_nome_usuario']))
{
    $UsuarioController->alterarNome($UsuarioController->getInstance()->getID(), $_POST['novo_nome']);
    ?><script>window.location = "perfil.php";</script><?php
}

if (isset($_POST['btn_postar_texto'])) {
    $postagem = trim($_POST['texto_post']);
    if (strlen(str_replace(" ", "", $postagem)) == "") {
        ?><script>alert("Por favor, escreva um texto válido");</script><?php
    } else {
        $Postagem = new Postagem();

        $Usuario = $UsuarioController->getInstance();
        $Postagem->setUsuario($Usuario);
        $Postagem->setTexto($postagem);

        $PostagemModel = new PostagemModel();
        $PostagemModel->cadastrar($Postagem);
        ?>
        <script>
            window.location = "perfil.php";
        </script>
        <?php
    }
}

if (isset($_POST['btn_cadastrar_forma_contato']))
{
    if (strlen(trim($_POST['valor_contato'])) == "")
    {
        ?>
        <script>
            alert("Por favor, escreva um valor válido");
            window.location = "perfil.php";
        </script>
        <?php
    }
    else
    {
        $TipoContato = new TipoContato();
        $TipoContato->setID($_POST['tipo_contato']);
        
        $FormaDeContato = new FormaDeContato();
        $FormaDeContato->setUsuario($UsuarioController->getInstance());
        $FormaDeContato->setTipoContato($TipoContato);
        $FormaDeContato->setValor($_POST['valor_contato']);
        
        $FormaDeContatoModel = new FormaDeContatoModel();
        $FormaDeContatoModel->cadastrar($FormaDeContato);
        
        ?>
            <script>
                alert("Contato cadastrado com sucesso!");
                window.location = "perfil.php";
            </script>
        <?php
    }
}

if (isset($_POST['btn_cadastrar_novo_prato'])) {
    if (strlen(trim($_POST['nome_prato'])) == 0) {
        ?>
        <script>
            alert("Por favor, escreva um nome válido");
            window.location = "perfil.php";
        </script>
        <?php
    } else if (strlen(trim($_POST['desc_prato'])) == 0) {
        ?>
        <script>
            alert("Por favor, escreva uma descrição válida");
            window.location = "perfil.php";
        </script>
        <?php
    } else if (strlen(trim($_POST['receita_prato'])) == 0) {
        ?>
        <script>
            alert("Por favor, escreva uma receita válida");
            window.location = "perfil.php";
        </script>
        <?php
    } else {
        $uploadfile = $_SERVER['DOCUMENT_ROOT'] . '/resources/prato/' . date("Ymdhisisi") . basename($_FILES['foto']['name']);

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
            $Prato = new Prato();
            $Prato->setNome($_POST['nome_prato']);
            $Prato->setDescricao($_POST['desc_prato']);
            $Prato->setReceita($_POST['receita_prato']);
            $Prato->setImagem(date("Ymdhisisi") . basename($_FILES['foto']['name']));

            $UsuarioController = new UsuarioController();
            $Prato->setUsuario($UsuarioController->getInstance());

            $PratoModel = new PratoModel();
            $PratoModel->cadastrar($Prato);
            ?>
            <script>
                alert("Prato cadastrado com sucesso!");
                window.location = "perfil.php";
            </script>
            <?php
        } else {
            ?><script>alert("Não foi possível fazer upload da imagem.");</script><?php
        }
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
                window.location = "perfil.php";
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
                window.location = "perfil.php";
            </script>
            <?php
        }
        else if (isset($_GET['contato']))
        {
            $FormaDeContatoModel = new FormaDeContatoModel();
            $FormaDeContatoModel->deletar($_GET['contato']);
            ?>
            <script>
                alert("Contato deletado com sucesso!");
                window.location = "perfil.php";
            </script>
            <?php
        }
    }
}
?>