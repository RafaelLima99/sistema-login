<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class LoginController extends Action {

	public function login() {

		$email = isset($_POST['email']) ? $_POST['email'] : null;
		$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

		if($email != null && $senha != null){

			$login = Container::getModel('Login');
			$login->setEmail($_POST['email']);
			$login->setSenha($_POST['senha']);

			if($login->login()){

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

	public function sair()
	{
		session_start();
		session_destroy();
		header('Location: /login');
	}

}


?>