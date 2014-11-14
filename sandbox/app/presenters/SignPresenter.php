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
		$form = $this->factory->create();
		$this[$name] = $form;

		dump( $form->getHttpData($form::DATA_LINE, 'files[]') );

		$form->onSuccess[] = function ($form) {
			//$form->getPresenter()->redirect('Homepage:');
		};
		return $form;
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
