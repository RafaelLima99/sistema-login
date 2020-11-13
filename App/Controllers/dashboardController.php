<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class DashboardController extends Action
{
    public function index()
    {
        session_start();
        $this->verificaLogin();
		$this->render('dashboard');
		 
    }
    
    //verifica se está logado
    public function verificaLogin()
    {
        if(!$_SESSION['logado']){
            header('Location: /login?logado=false');
            return true;
        }
    }
}
