<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

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
        DAL::query("INSERT INTO restaurante (usuario_idusuario,
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
        DAL::query("DELETE FROM restaurante WHERE idrestaurante = {$id}");
    }
    
    /**
     * Método para editar um restaurante
     * @param \Restaurante $Entidade
     */
    public function atualizar(\Entidade $Entidade)
    {
        $arrayUpdate = array();
        
        if ($Entidade->getNome() != "")         $arrayUpdate[] = "nome = '{$Entidade->getNome()}'";
        if ($Entidade->getImagem() != "")       $arrayUpdate[] = "imagem = '{$Entidade->getImagem()}'";
        if ($Entidade->getEndereco() != "")     $arrayUpdate[] = "endereco = '{$Entidade->getEndereco()}'";
        if ($Entidade->getCidade() != "" )      $arrayUpdate[] = "cidade = '{$Entidade->getCidade()}'";
        if ($Entidade->getCodigoPostal() != "") $arrayUpdate[] = "codigo_postal = '{$Entidade->getCodigoPostal()}'";
        
        DAL::query("UPDATE restaurante
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
        $UsuarioModel = new UsuarioModel();
        
        $query = DAL::query("SELECT idrestaurante,
                                    nome,
                                    imagem,
                                    endereco,
                                    cidade,
                                    codigo_postal
                            " . ($where ? " WHERE " . implode(" AND ", $where) : ""));
        
        $ListaRestaurantes = array();
        
        while ($row = mysqli_fetch_array($query))
            $ListaRestaurantes[] = new Restaurante($row['idrestaurante'], $UsuarioModel->buscar(array("idusuario = " . $row['usuario_idusuario']))[0], $row['nome'], $row['imagem'], $row['endereco'], $row['cidade'], $row['codigo_postal']);
        
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