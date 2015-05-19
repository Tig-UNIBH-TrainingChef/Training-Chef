<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

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
        $sql = "INSERT INTO usuario (nome,
                                     email,
                                     senha,
                                     tipo_usuario,
                                     imagem)
                             VALUES ('" . $Usuario->getNome() . "',
                                     '" . $Usuario->getEmail() . "',
                                     '" . $Usuario->getSenha() . "',
                                     '" . $Usuario->getTipoUsuario() . "',
                                     'default.png')";
        $DAL = new DAL();
        $DAL->query($sql);
    }
    
    /**
     * Função para atualizar um usuário
     * @param Entidade $Usuario
     */
    public function atualizar(Entidade $Usuario)
    {
        $arrayUpdate = array();
        
        if ($Usuario->getNome() != "")
            $arrayUpdate[] = "nome = '" . $Usuario->getNome() . "'";
        if ($Usuario->getEmail() != "")
            $arrayUpdate[] = "email = '" . $Usuario->getEmail() . "'";
        if ($Usuario->getSenha() != "")
            $arrayUpdate[] = "senha = '" . $Usuario->getSenha() . "'";
        if ($Usuario->getImagem() != "")
            $arrayUpdate[] = "imagem = '" . $Usuario->getImagem() . "'";
        
        $update = implode(",", $arrayUpdate);
        
        $sql = "UPDATE usuario
                   SET " . $update . "
                 WHERE idusuario = " . $Usuario->getID();
        
        $DAL = new DAL();
        $DAL->query($sql);
    }

    /**
     * Função para buscar um usuario por ID
     * @param array where
     * @return \Usuario
     */
    public function buscar($where = null)
    {
        if ($where)
            $where = " WHERE " . implode(" AND ", $where);
        
        $sql = "SELECT idusuario,
                       nome,
                       email,
                       senha,
                       tipo_usuario,
                       imagem
                  FROM usuario
               {$where}";
        
        $DAL = new DAL();
        $query = $DAL->query($sql);
        
        $ListaUsuarios = array();
        
        while ($row = mysqli_fetch_array($query))
        {                
            $Usuario = new Usuario();
            $Usuario->setID($row['idusuario']);
            $Usuario->setNome($row['nome']);
            $Usuario->setEmail($row['email']);
            $Usuario->setSenha($row['senha']);
            $Usuario->setTipoUsuario($row['tipo_usuario']);
            $Usuario->setImagem($row['imagem']);
            
            $ListaUsuarios[] = $Usuario;
        }
        
        return $ListaUsuarios;
    }
    
    /**
     * Função para buscar cozinheiros por e-mail e senha.
     * @param String $email
     * @param String $senha
     * @return \Cozinheiro Lista de cozinheiros de acordo com a busca.
     */
    public function buscarPorEmailSenha($email, $senha)
    {
        $ListaUsuarios = $this->buscar(array("email = '{$email}'", "senha = '{$senha}'"));
        return $ListaUsuarios[0];
    }

    public function buscarTodos()
    {
        
    }

    public function deletar($id)
    {
        
    }

}

?>