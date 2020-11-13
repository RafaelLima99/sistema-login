<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class LoginController extends Action
{
	public function login() 
	{
		//verifica se existe o $_POST[]
		if(isset($_POST['email']) && isset($_POST['senha'])){
			
			//verifica se os $_POST estão vazios
			if(empty($_POST['email']) && empty($_POST['senha'])){
				header('Location: /login?inputvazio=true');
				return true;
			}

			$login = Container::getModel('Login');
			$login->setEmail($_POST['email']);
			$login->setSenha($_POST['senha']);

			//se a senha e o e-mail é o mesmo do banco
			if($login->login()){
				//cria as sessões
				session_start();
				$_SESSION['logado'] = true;
				$_SESSION['id'] 	= $login->getId();
				$_SESSION['nome'] 	= $login->getNome();
				header('Location: /dashboard');
			}else{
				header('Location: /login?logado=false');
			}
		}
		$this->render('login');
	}
	//faz logoff
	public function sair()
	{
		session_start();
		session_destroy();
		header('Location: /login');
	}
}
