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
        $sql = "INSERT INTO prato (cozinheiro_idcozinheiro,
                                   nome,
                                   descricao,
                                   imagem,
                                   receita)
                           VALUES ( " . $Prato->getCozinheiro()->getID() . ",
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
        
        if ($Prato->getCozinheiro() != null)
        {
            if ($Prato->getCozinheiro()->getID() != null)
                $arrayUpdate[] = "cozinheiro_idcozinheiro = " . $Prato->getCozinheiro()->getID();
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
        $sql = "SELECT idprato,
                       cozinheiro_idcozinheiro,
                       nome,
                       descricao,
                       imagem,
                       receita
                  FROM prato
                 WHERE idprato = " . $id;
        
        $DAL = new DAL();
        $query = $DAL->query($sql);
        
        $row = mysqli_fetch_array($query);
        
        $Prato = new Prato();
        $Prato->setID($row['idprato']);
        $Prato->setNome($row['nome']);
        $Prato->setDescricao($row['descricao']);
        $Prato->setImagem($row['imagem']);
        $Prato->setReceita($row['receita']);

        $CozinheiroModel = new CozinheiroModel();
        $Prato->setCozinheiro($CozinheiroModel->buscar($row['cozinheiro_idcozinheiro']));
            
        return $Prato;
    }
    
    /**
     * Função para buscar pratos por cozinheiro
     * @param int $idCozinheiro
     * @return \Prato
     */
    public function buscarPorCozinheiro($idCozinheiro)
    {
        $DAL = new DAL();
        
        $sql = "SELECT idprato,
                       cozinheiro_idcozinheiro,
                       nome,
                       descricao,
                       imagem,
                       receita
                  FROM prato
                 WHERE cozinheiro_idcozinheiro = " . $idCozinheiro;
        
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
            
            $CozinheiroModel = new CozinheiroModel();
            $Prato->setCozinheiro($CozinheiroModel->buscar($row['cozinheiro_idcozinheiro']));
            
            $ListaPratos[] = $Prato;
        }
        
        return $ListaPratos;
    }

    /**
     * Função para buscar todos os pratos.
     * @return \Prato
     */
    public function buscarTodos()
    {
        $DAL = new DAL();
        
        $sql = "SELECT idprato,
                       cozinheiro_idcozinheiro,
                       nome,
                       descricao,
                       imagem,
                       receita
                  FROM prato";
        
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
            
            $CozinheiroModel = new CozinheiroModel();
            $Prato->setCozinheiro($CozinheiroModel->buscar($row['cozinheiro_idcozinheiro']));
            
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
        
        $query = $DAL->query($sql);
    }

}

?>