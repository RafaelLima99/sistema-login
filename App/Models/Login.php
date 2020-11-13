<?php

namespace App\Models;
use MF\Model\Model;

class Login extends Model
{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function login()
    {
        //verifica se o email do usuário existe no banco
        $query = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();

        //se exisitr
        //verifica se a senha digitada é a mesma que condiz com o hash da senha que está no banco
        if($stmt->rowCount()){
            $usuario = $stmt->fetch();
            if(password_verify($this->senha, $usuario['senha'])){
                //insere o id e nome do usuário nos atribustos
                $this->id   = $usuario['id'];
                $this->nome = $usuario['nome'];
                return true;
            }
        }
        return false;
    }
    //seters
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    //geters
    public function  getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
}
