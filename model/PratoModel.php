<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

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
        $sql = "INSERT INTO prato (usuario_idusuario,
                                   nome,
                                   descricao,
                                   imagem,
                                   receita)
                           VALUES ( " . $Prato->getUsuario()->getID() . ",
                                   '" . $Prato->getNome() . "',
                                   '" . $Prato->getDescricao() . "',
                                   '" . $Prato->getImagem() . "',
                                   '" . $Prato->getReceita() . "')";
        $DAL = new DAL();
        $DAL->query($sql);
    }

    /**
     * Função para atualizar as informações do prato do cozinheiro
     * @param \Entidade $Prato
     */
    public function atualizar(\Entidade $Prato)
    {
        $arrayUpdate = array();
        
        if ($Prato->getUsuario() != null)
        {
            if ($Prato->getUsuario()->getID() != null)
                $arrayUpdate[] = "usuario_idusuario = " . $Prato->getUsuario()->getID();
        }
        
        if ($Prato->getNome() != null)
            $arrayUpdate[] = "nome = '" . $Prato->getNome() . "'";
        
        if ($Prato->getDescricao() != null)
            $arrayUpdate[] = "descricao = '" . $Prato->getDescricao() . "'";
        
        if ($Prato->getImagem() != null)
            $arrayUpdate[] = "imagem = '" . $Prato->getImagem() . "'";
        
        if ($Prato->getReceita() != null)
            $arrayUpdate[] = "receita = '" . $Prato->getReceita() . "'";
        
        $set = " SET " . implode(", ", $arrayUpdate);
        
        $sql = "UPDATE prato"
             . $set
             . " WHERE idprato = " . $Prato->getID();
        
        $DAL = new DAL();
        $DAL->query($sql);
    }

    /**
     * Função para buscar um determinado prato
     * @param int $id
     * @return \Prato
     */
    public function buscar($id)
    {
        $Pratos = $this->buscarTodos(array("idprato = {$id}"));
        return $Pratos[0];
    }
    
    /**
     * Função para buscar todos os pratos.
     * @return \Prato
     */
    public function buscarTodos($where = null)
    {
        if ($where)
            $where = " WHERE " . implode(" AND ", $where);
        
        $DAL = new DAL();
        
        $sql = "SELECT idprato,
                       usuario_idusuario,
                       nome,
                       descricao,
                       imagem,
                       receita
                  FROM prato
               {$where}";
        
        $query = $DAL->query($sql);
        
        $ListaPratos = array();
        
        while ($row = mysqli_fetch_array($query))
        {
            $Prato = new Prato();
            $Prato->setID($row['idprato']);
            $Prato->setNome($row['nome']);
            $Prato->setDescricao($row['descricao']);
            $Prato->setImagem($row['imagem']);
            $Prato->setReceita($row['receita']);
            
            $UsuarioModel = new UsuarioModel();
            $Prato->setUsuario($UsuarioModel->buscar(array("idusuario = " . $row['usuario_idusuario']))[0]);
            
            $ListaPratos[] = $Prato;
        }
        
        return $ListaPratos;
    }

    /**
     * Função para deletar um determinado prato.
     * @param type $id
     */
    public function deletar($id)
    {
        $DAL = new DAL();
        
        $sql = "DELETE FROM prato
                 WHERE idprato = " . $id;
        
        $DAL->query($sql);
    }

}

?>