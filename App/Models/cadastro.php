<?php

namespace App\Models;
use MF\Model\Model;

class Cadastro extends Model
{
    private $nome;
    private $email;
    private $senha;
    private $emailValido;
    private $teste;

    public function cadastra()
    {
        //se o e-mail a ser cadastrado for válido
        if($this->verificaEmail())
        {
            //cadastra os dados do usuário
            $query = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":email", $this->email);
            $stmt->bindValue(":senha", $this->senha);
            $stmt->execute();
            
            $this->emailValido = true;

        }else{
            $this->emailValido = false;
        }
    }

    //verifica se o email a ser cadastrado já existe no banco
    //caso exista retorna false
    public function verificaEmail()
    {
        $query = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();

       if($stmt->rowCount()){
            return false;
       }else{
           return true;
       }   
    }

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

    public function getEmailValido()
    {
        return $this->emailValido;
    }
    
}
