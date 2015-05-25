<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

/**
 * Classe modelo para a entidade Restaurante
 * @author Victor Vaz de Oliveira <victor-vaz@hotmail.com>
 */
class RestauranteModel implements Model
{
    /**
     * Método para cadastrar um restaurante no banco de dados.
     * @param \Restaurante $Entidade
     */
    public function cadastrar(\Entidade $Entidade)
    {
        $DAL = new DAL();        
        $DAL->query("INSERT INTO restaurante (usuario_idusuario,
                                              nome,
                                              imagem,
                                              endereco,
                                              cidade,
                                              codigo_postal)
                                      VALUES ({$Entidade->getUsuario()->getID()},
                                              '{$Entidade->getNome()}',
                                              '{$Entidade->getImagem()}',
                                              '{$Entidade->getEndereco()}',
                                              '{$Entidade->getCidade()}',
                                              '{$Entidade->getCodigoPostal()}')");
    }

    /**
     * Método para deletar um restaurante
     * @param type $id
     */
    public function deletar($id)
    {
        $DAL = new DAL();        
        $DAL->query("DELETE FROM restaurante WHERE idrestaurante = {$id}");
    }
    
    /**
     * Método para editar um restaurante
     * @param \Restaurante $Entidade
     */
    public function atualizar(\Entidade $Entidade)
    {
        $arrayUpdate = array();
        
        if (isset($Entidade->getNome()))         $arrayUpdate[] = "nome = '{$Entidade->getNome()}'";
        if (isset($Entidade->getImagem()))       $arrayUpdate[] = "imagem = '{$Entidade->getImagem()}'";
        if (isset($Entidade->getEndereco()))     $arrayUpdate[] = "endereco = '{$Entidade->getEndereco()}'";
        if (isset($Entidade->getCidade()))       $arrayUpdate[] = "cidade = '{$Entidade->getCidade()}'";
        if (isset($Entidade->getCodigoPostal())) $arrayUpdate[] = "codigo_postal = '{$Entidade->getCodigoPostal()}'";
        
        $DAL = new DAL();
        
        $DAL->query("UPDATE restaurante
                        SET " . implode(",", $arrayUpdate) ."
                      WHERE idrestaurante = {$Entidade->getIDRestaurante()}");
    }

    /**
     * Método para buscar todos os Restaurantes
     * @param string $where
     * @return \Restaurante
     */
    public function buscar($where = null)
    {
        $DAL = new DAL();
        
        $query = $DAL->query("SELECT idrestaurante,
                                     nome,
                                     imagem,
                                     endereco,
                                     cidade,
                                     codigo_postal
                             " . ($where != null ? " WHERE " . implode(" AND ", $where) : ""));
        
        $ListaRestaurantes = array();
        
        while ($row = mysqli_fetch_array($query))
        {
            $Restaurante = new Restaurante();
            $Restaurante->setIDRestaurante($row['idrestaurante']);
            $Restaurante->setNome($row['nome']);
            $Restaurante->setImagem($row['imagem']);
            $Restaurante->setEndereco($row['endereco']);
            $Restaurante->setCidade($row['cidade']);
            $Restaurante->setCodigoPostal($row['codigo_postal']);
            
            $UsuarioModel = new UsuarioModel();
            $Restaurante->setUsuario($UsuarioModel->buscar(array("idusuario = " . $row['usuario_idusuario']))[0]);
            
            $ListaRestaurantes[] = $Restaurante;
        }
        
        return $ListaRestaurantes;
    }

    /**
     * Método para buscar todos os restaurantes no banco de dados.
     */
    public function buscarTodos()
    {
        return $this->buscar();
    }

}