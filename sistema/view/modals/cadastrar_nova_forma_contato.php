<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

$UsuarioController = new UsuarioController();
$UsuarioController->validarSessao();

$TipoContatoModel = new TipoContatoModel();
$ListaTipoContato = $TipoContatoModel->buscarTodos();

?>

<form method="post" action="perfil.php">
    <div id="modalCadastrarFormaContato" class="modal fade" style="background-color: white;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="modalCadastrarFormaContatoLabel">Cadastrar forma de contato:</h3>
        </div>
        <div class="modal-body">
            <p>
                Tipo de contato:
                <select name="tipo_contato" class="form-control">
                    <?php for ($i = 0; $i < count($ListaTipoContato); $i++) : ?>
                    <option value="<?=$ListaTipoContato[$i]->getID();?>">
                        <?=$ListaTipoContato[$i]->getDescricao();?>
                    </option>
                    <?php endfor; ?>
                </select>
            </p>
            <p>
                Valor:
                <input name="valor_contato" class="form-control" value="<?=$_POST['valor_contato'];?>" />
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
            <button type="submit" name="btn_cadastrar_forma_contato" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</form>