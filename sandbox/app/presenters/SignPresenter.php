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

		$this[$name] = $form;
		$val = $form['master']->getValue();
		$data = $val === NULL ? [] : $this->getData($val);
		$form->addSelect('slave', 'Slave:', $data);

		$form['master']
			->setAttribute('data-slave', $form['slave']->getHtmlId())
			->setAttribute('data-source', $this->link('getData'));

		$form->addSubmit('send', 'Odeslat');

		//dump( $form->getHttpData($form::DATA_LINE, 'files[]') );

		$form->onSuccess[] = function ($form) {
			dump($form->getValues());
			dump($form->getHttpData($form::DATA_LINE, 'slave'));
			dump($form['slave']->getRawValue());
			//$form->getPresenter()->redirect('Homepage:');
		};
		return $form;
	}


	private function getData($val)
	{
		return range(rand(5,10), rand(5, 10));
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
