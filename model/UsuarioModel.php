<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

/**
 * Classe modelo para a entidade usuario
 * @author Victor Vaz de Oliveira <victor-vaz@hotmail.com>
 */
class UsuarioModel implements Model
{
    /**
     * Função para cadastrar um usuário.
     * @param Entidade $Usuario
     */
    public function cadastrar(Entidade $Usuario)
    {
        DAL::query("INSERT INTO usuario (nome,
                                         email,
                                         senha,
                                         tipo_usuario,
                                         imagem)
                                 VALUES ('{$Usuario->getNome()}',
                                         '{$Usuario->getEmail()}',
                                         SHA1(MD5('{$Usuario->getSenha()}')),
                                         '{$Usuario->getTipoUsuario()}',
                                         'default.png')");
    }
    
    /**
     * Função para atualizar um usuário
     * @param Entidade $Usuario
     */
    public function atualizar(Entidade $Usuario)
    {
        $arrayUpdate = array();
        
        if ($Usuario->getNome())   $arrayUpdate[] = "nome   = '{$Usuario->getNome()}'";
        if ($Usuario->getEmail())  $arrayUpdate[] = "email  = '{$Usuario->getEmail()}'";
        if ($Usuario->getSenha())  $arrayUpdate[] = "senha  = SHA1(MD5('{$Usuario->getSenha()}'))";
        if ($Usuario->getImagem()) $arrayUpdate[] = "imagem = '{$Usuario->getImagem()}'";
        
        DAL::query("UPDATE usuario
                       SET " . (count($arrayUpdate) > 0 ? implode(",", $arrayUpdate) : "") . "
                     WHERE idusuario = {$Usuario->getID()}");
    }

    /**
     * Função para buscar um usuario por ID
     * @param array where
     * @return \Usuario
     */
    public function buscar($where = null)
    {
        $query = DAL::query("SELECT idusuario,
                                    nome,
                                    email,
                                    tipo_usuario,
                                    imagem
                               FROM usuario
                             " . ($where ? " WHERE " . implode(" AND ", $where) : ""));
        
        $ListaUsuarios = array();
        
        while ($row = mysqli_fetch_array($query))
            $ListaUsuarios[] = new Usuario($row['idusuario'], $row['nome'], $row['email'], null, $row['tipo_usuario'], $row['imagem']);
        
        return $ListaUsuarios;
    }
    
    /**
     * Método para buscar um determinado usuário
     * @param integer $id
     * @return Usuario
     */
    public function buscarPorID($id)
    {
        return $this->buscar(array("idusuario = {$id}"))[0];
    }
    
    /**
     * Função para buscar usuarios por e-mail e senha.
     * @param String $email
     * @param String $senha
     * @return \Usuario Lista de usuarios de acordo com a busca.
     */
    public function buscarPorEmailSenha($email, $senha)
    {
        return $this->buscar(array("email = '{$email}'", "senha = SHA1(MD5('{$senha}'))"))[0];
    }
    
    /**
     * Função para buscar usuarios por e-mail e senha.
     * @param Int id
     * @param String $email
     * @return \Cozinheiro Lista de usuarios de acordo com a busca.
     */
    public function buscarPorIDEmail($id, $email)
    {
        return $this->buscar(array("idusuario = '{$id}'", "email = '{$email}'"))[0];
    }

    public function buscarTodos()
    {
        return $this->buscar();
    }

    public function deletar($id)
    {
        DAL::query("DELETE FROM usuario WHERE idusuario = {$id}");
    }

}

?>