# NestedSortableControl

Nette Control for http://mjsarfatti.com/sandbox/nestedSortable/

## License

MIT

## Dependencies

jQuery 1.9

jQuery UI 1.10.2

nestedSortable jQuery Plugin 2.0

## Usage

### Presenter

```php
<?php

use AcidClick\UI\Controls\NestedSortableControl;

class NestedsortablecontrolPresenter extends BasePresenter
{

	public function actionDefault(){
		$this['nestedSortableControl']->records = 
			[
				0 => (Object)[
					'id'=>1,
					'name'=>'Object 1',
					'children'=> [
						0 => (Object)[
							'id'=>2,
							'name'=>'Object 1-1'							
						],
						1 => (Object)[
							'id'=>2,
							'name'=>'Object 1-2'							
						]						
					]
				]
			];		
	}

	public function createComponentNestedSortableControl(){
		$control = new NestedSortableControl();
		$control->onSuccess[] = function($data){
			/** SAVE DATA */
			\Nette\Diagnostics\Debugger::dump($data);
		};
		return $control;
	}



}
?>
```