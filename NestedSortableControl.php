<?php

namespace AcidClick\UI\Controls;

use Nette\Application\UI\Control,
	Nette\Utils\JSON;

class NestedSortableControl extends Control {

	private $records;

	private $key = 'id';

	private $value = 'name';

	private $children = 'children';

    /** @var array */
    public $onSuccess;


	public function setRecords($records){
		$this->records = $records;
	}

	public function getRecords(){
		return $this->records;
	}

	public function getKey(){
		return $this->key;
	}

	public function setKey($key){
		$this->key = $key;
	}

	public function getValue(){
		return $this->value;
	}

	public function setValue($value){
		$this->value = $value;
	}

	public function getChildren(){
		return $this->children;
	}

	public function setChildren($children){
		$this->children = $children;
	}

	public function render(){
		$template = $this->template;
		$template->setFile(__DIR__ . '/NestedSortableControl.latte');
		$template->key = $this->template;
		$template->value = $this->value;
		$template->children = $this->children;
		$template->records = $this->records;
		$template->render();		
	}

	protected function createComponentForm($name){
		$form = new \Nette\Application\UI\Form($this,$name);
		$form->addHidden('hierarchy');
		$form->addSubmit('saveBtn','Uložit');
		$control = $this;
		$form->onSuccess[] = function($form) use ($control){
			$data = JSON::decode($form->getValues()->hierarchy);
			$control->onSuccess($data);
		};
		return $form;
	}
}