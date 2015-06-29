<form method="post" action="perfil.php">
    <div id="modalAlterarNomeUsuario" class="modal fade" style="background-color: white;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="modalAlterarNomeUsuarioLabel">Alterar nome</h3>
        </div>
        <div class="modal-body">
            <p>Novo nome: <input class="form-control" name="novo_nome" type="text" value="<?=@$_POST['novo_nome'];?>" /></p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
            <button type="submit" name="btn_alterar_nome_usuario" class="btn btn-primary">Salvar mudanças</button>
        </div>
    </div>
</form>