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
        //verfica se a senha existe
        //se existir armaena o nome e o logado = true

        $query = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->execute();

        if($stmt->rowCount()){
            $usuario = $stmt->fetch();
            $this->id = $usuario['id'];
            $this->nome = $usuario['nome'];
        }

        return $stmt->rowCount();

        
           
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
    public function  getId(){
        return $this->id;
    }
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