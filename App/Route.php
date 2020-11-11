<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['login'] = array(
			'route' => '/login',
			'controller' => 'loginController',
			'action' => 'login'
		);

		$routes['dashboard'] = array(
			'route' => '/dashboard',
			'controller' => 'dashboardController',
			'action' => 'index'
		);

		$routes['sair'] = array(
			'route' => '/sair',
			'controller' => 'loginController',
			'action' => 'sair'
		);

		$this->setRoutes($routes);
	}

}

?>