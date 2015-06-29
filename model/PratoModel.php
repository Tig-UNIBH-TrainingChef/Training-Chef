<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

/**
 * Classe modelo para a entidade Prato
 * @author Victor Vaz de Oliveira <victor-vaz@hotmail.com>
 */
class PratoModel implements Model
{
    /**
     * Função para cadastrar um prato no banco de dados
     * @param \Prato $Prato
     */
    public function cadastrar(\Entidade $Prato)
    {
        DAL::query("INSERT INTO prato (usuario_idusuario,
                                       nome,
                                       descricao,
                                       imagem,
                                       receita)
                               VALUES ({$Prato->getUsuario()->getID()},
                                       '{$Prato->getNome()}',
                                       '{$Prato->getDescricao()}',
                                       '{$Prato->getImagem()}',
                                       '{$Prato->getReceita()}')");
    }

    /**
     * Função para atualizar as informações do prato do cozinheiro
     * @param \Entidade $Prato
     */
    public function atualizar(\Entidade $Prato)
    {
        $arrayUpdate = array();
        
        if ($Prato->getUsuario() && $Prato->getUsuario()->getID())
            $arrayUpdate[] = "usuario_idusuario = {$Prato->getUsuario()->getID()}";
        
        if ($Prato->getNome())      $arrayUpdate[] = "nome      = '{$Prato->getNome()}'";
        if ($Prato->getDescricao()) $arrayUpdate[] = "descricao = '{$Prato->getDescricao()}'";
        if ($Prato->getImagem())    $arrayUpdate[] = "imagem    = '{$Prato->getImagem()}'";
        if ($Prato->getReceita())   $arrayUpdate[] = "receita   = '{$Prato->getReceita()}'";
        
        DAL::query("UPDATE prato
                       SET " . implode(", ", $arrayUpdate) . " 
                     WHERE idprato = {$Prato->getID()}");
    }

    /**
     * Função para buscar um determinado prato
     * @param int $id
     * @return \Prato
     */
    public function buscarPorID($id)
    {
        return $this->buscar(array("idprato = {$id}"))[0];
    }
    
    public function buscar($where)
    {
        $UsuarioModel = new UsuarioModel();
        
        $query = DAL::query("SELECT idprato,
                                    usuario_idusuario,
                                    nome,
                                    descricao,
                                    imagem,
                                    receita
                               FROM prato
                            " . ($where ? " WHERE " . implode(" AND ", $where) : ""));
        
        $ListaPratos = array();
        
        while ($row = mysqli_fetch_array($query))
            $ListaPratos[] = new Prato($row['idprato'], $UsuarioModel->buscarPorID($row['usuario_idusuario']), $row['nome'], $row['descricao'], $row['imagem'], $row['receita']);
        
        return $ListaPratos;
    }
    
    /**
     * Função para buscar todos os pratos.
     * @return \Prato
     */
    public function buscarTodos()
    {
        return $this->buscar();
    }
    
    public function buscarPratosPorIDUsuario($idUsuario)
    {
        return $this->buscar(array("usuario_idusuario = {$idUsuario}"));
    }

    /**
     * Função para deletar um determinado prato.
     * @param type $id
     */
    public function deletar($id)
    {
        DAL::query("DELETE FROM prato WHERE idprato = {$id}");
    }

}

?>