<form method="post" action="perfil.php" enctype="multipart/form-data">
    <div id="modalCadastrarNovoRestaurante" class="modal fade" style="background-color: white;"
         tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="modalCadastrarNovoRestauranteLabel">Cadastrar novo restaurante:</h3>
        </div>
        <div class="modal-body">
            <p>
                Nome: 
                <input name="nome_restaurante" class="form-control" value="<?=@$_POST['nome_restaurante'];?>" />
            </p>
            <p>
                Endereço: 
                <input name="endereco_restaurante" class="form-control" value="<?=@$_POST['endereco_restaurante'];?>" />
            </p>
            <p>
                Cidade: 
                <input name="cidade_restaurante" class="form-control" value="<?=@$_POST['cidade_restaurante'];?>" />
            </p>
            <p>
                Código Postal: 
                <input name="codigo_postal_restaurante" class="form-control" value="<?=@$_POST['codigo_postal_restaurante'];?>" />
            </p>
            <p>
                Imagem: <input type="file" name="foto" />
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
            <button type="submit" name="btn_cadastrar_novo_restaurante" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</form>