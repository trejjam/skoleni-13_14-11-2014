<?php

namespace App;

use Nette,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


/**
 * Router factory.
 */
class RouterFactory
{

	/**
	 * @return \Nette\Application\IRouter
	 */
	public function createRouter()
	{
		//return new SimpleRouter('Homepage:default');
		$router = new RouteList();
		//$router[] = new Route('sign', 'Sign:in');
		//$router[] = new Route('<slug .+>', 'Sign:in');
		$router[] = new Route('<presenter>/<action=default>[/<id>]', array(
			'presenter' => array(
				//Route::VALUE => 'Homepage',
				//Route::PATTERN => ...,
				Route::FILTER_TABLE => array(
					'uvod' => 'Homepage'
				),
			),
		));
		return $router;
	}

}
