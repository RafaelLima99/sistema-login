<?php

namespace App\Models;
use MF\Model\Model;

class Login extends Model
{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function validaLogin()
    {
        //seleciona o usuario que tenha o mesmo email do informado
        $query = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();

        if($stmt->rowCount()){
            $result = $stmt->fetch();

            if($result['senha'] === $this->senha){
                $_SESSION['usuario'] = $result['id'];
                return true;
            }
        }

        throw new \Exception('Login Invalido');
        
        
        //verificar senha

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
    public function getNome(){
        return $this->nome;
    }

    public function getEmail(){
        return $this->nome;
    }

    public function getSenha(){
        return $this->nome;
    }
    
}