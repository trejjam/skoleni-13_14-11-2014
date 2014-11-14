<?php

namespace App\Presenters;

use Nette,
	App\Forms\SignFormFactory;


/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter
{
	/** @var SignFormFactory @inject */
	public $factory;


	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm($name)
	{
		//$form = $this->factory->create();
		$form = new Nette\Application\UI\Form;
		//$this[$name] = $form;

		$form->addSelect('master', 'Master:', ['A', 'bb', 'xxx']);

		$form->addSelect('slave', 'Slave:');

		$form['master']
			->setAttribute('data-slave', $form['slave']->getHtmlId())
			->setAttribute('data-source', $this->link('getData'));

		//dump( $form->getHttpData($form::DATA_LINE, 'files[]') );

		$form->onSuccess[] = function ($form) {
			//$form->getPresenter()->redirect('Homepage:');
		};
		return $form;
	}


	private function getData($val)
	{
		return range(1, rand(5, 10));
	}

	function actionGetData($val)
	{
		$data = $val ? $this->getData($val) : NULL;
		$this->sendJson($data);
	}

	public function actionOut()
	{
		/*$this->getComponent('myForm')->getComponent('firstItem')
			->getComponent('name');

		$this['myForm']['firstItem']['name'];

		$this['myForm-firstItem-name'];*/


		$this->getUser()->logout();
		$this->flashMessage('You have been signed out.');
		$this->redirect('in');
	}

}
