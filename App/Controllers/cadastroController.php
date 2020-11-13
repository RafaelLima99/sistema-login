<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class CadastroController extends Action 
{
    public function index()
    {
        //verifica se existe $_POST[]
        if( isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){

            $nome  = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            //verifica se as variaveis estão vazias
            if(empty($nome) && empty($email) && empty($senha)){
                header('Location: /cadastro?inputvazio=true');
				return true;
            }

            //variavel hash recebe o hash da senha do usuário
            $hash = password_hash($senha, PASSWORD_BCRYPT);
            $cadastro = Container::getModel('cadastro');
            $cadastro->setNome($nome);
            $cadastro->setEmail($email);
            $cadastro->setSenha($hash);
            //cadastra os dados
            $cadastro->cadastra();

            //se o email for valido (não existir no banco)
            if ($cadastro->getEmailValido()) {
                header('Location: /login');
            }else{
                header('Location: /cadastro?emailvalido=false');
            }
        }
        $this->render('cadastro'); 
    }
}
