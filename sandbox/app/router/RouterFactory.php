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
			null => array(
				Route::FILTER_IN => function($arr) {
					dump($arr);
					return $arr;
				},
				Route::FILTER_OUT => function($arr) {
					return $arr;
				},
			),
			'id' => array(
				//Route::VALUE => 'Homepage',
				//Route::PATTERN => ...,
				/*Route::FILTER_TABLE => array(
					'uvod' => 'Homepage',
					'prihlasit' => 'Sign',
				),
				Route::FILTER_STRICT => TRUE,*/
				Route::FILTER_IN => function($val) {
					return 'x' . $val;
				},
				Route::FILTER_OUT => function($val) {
					return substr($val, 1);
				},
			),
		));
		return $router;
	}

}
