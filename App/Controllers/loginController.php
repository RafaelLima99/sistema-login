<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class LoginController extends Action {

	public function login() {
		try{
			$login = Container::getModel('Login');
			$login->setEmail($_POST['email']);
			$login->setSenha($_POST['senha']);
			$login->validaLogin();

			header('Location: /logou');
			
		} catch(\Exception $e) {
			header('Location: /nao');
		}	
		 $this->render('login');
	}

}


?>