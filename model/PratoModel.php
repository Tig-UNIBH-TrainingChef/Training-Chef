<?php

if (file_exists('../core/DAL.php')) { require_once '../core/DAL.php'; }
else { require_once 'core/DAL.php'; }

if (file_exists('../entity/Cozinheiro.php')) { require_once '../entity/Cozinheiro.php'; }
else { require_once 'entity/Cozinheiro.php'; }

if (file_exists('../entity/Prato.php')) { require_once '../entity/Prato.php'; }
else { require_once 'entity/Prato.php'; }

if (file_exists('model/Model.php')) { require_once 'model/Model.php'; }
else { require_once 'Model.php'; }

if (file_exists('model/CozinheiroModel.php')) { require_once 'model/CozinheiroModel.php'; }
else { require_once 'CozinheiroModel.php'; }

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
        $DAL = new DAL();
        $DAL->conectar();
        
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
        $query = mysql_query($sql)
            or die ("Aconteceu um erro: Não foi possível cadastrar o prato.");
    }

    public function atualizar(\Entidade $Prato)
    {
        
    }

    /**
     * Função para buscar um determinado prato
     * @param int $id
     * @return \Prato
     */
    public function buscar($id)
    {
        $DAL = new DAL();
        $DAL->conectar();
        
        $sql = "SELECT idprato,
                       cozinheiro_idcozinheiro,
                       nome,
                       descricao,
                       imagem,
                       receita
                  FROM prato
                 WHERE idprato = " . $id;
        
        $query = mysql_query($sql)
            or die ("Aconteceu um erro: Não foi possível buscar os pratos cadastrados.");
        
        $row = mysql_fetch_array($query);
        
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
        $DAL->conectar();
        
        $sql = "SELECT idprato,
                       cozinheiro_idcozinheiro,
                       nome,
                       descricao,
                       imagem,
                       receita
                  FROM prato
                 WHERE cozinheiro_idcozinheiro = " . $idCozinheiro;
        
        $query = mysql_query($sql)
            or die ("Aconteceu um erro: Não foi possível buscar os pratos cadastrados.");
        
        $ListaPratos = array();
        
        while ($row = mysql_fetch_array($query))
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
        $DAL->conectar();
        
        $sql = "SELECT idprato,
                       cozinheiro_idcozinheiro,
                       nome,
                       descricao,
                       imagem,
                       receita
                  FROM prato";
        
        $query = mysql_query($sql)
            or die ("Aconteceu um erro: Não foi possível buscar os pratos cadastrados.");
        
        $ListaPratos = array();
        
        while ($row = mysql_fetch_array($query))
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
        $DAL->conectar();
        
        $sql = "DELETE FROM prato
                 WHERE idprato = " . $id;
        
        $query = mysql_query($sql)
            or die ("Aconteceu um erro: Não foi possível apagar o prato.");
    }

}

?>