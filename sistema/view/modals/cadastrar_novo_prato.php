<form method="post" action="perfil.php" enctype="multipart/form-data">
    <div id="modalCadastrarNovoPrato" class="modal fade" style="background-color: white;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="modalCadastrarNovoPratoLabel">Cadastrar novo prato:</h3>
        </div>
        <div class="modal-body">
            <p>Nome: <input name="nome_prato" class="form-control" value="<?=$_POST['nome_prato'];?>" /></p>
            <p>Descrição: <textarea name="desc_prato" class="form-control"><?=$_POST['desc_prato'];?></textarea></p>
            <p>Receita: <textarea name="receita_prato" rows="10" class="form-control"><?=$_POST['receita_prato'];?></textarea></p>
            <p>Imagem: <input type="file" name="foto" /></p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
            <button type="submit" name="btn_cadastrar_novo_prato" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</form>