# NestedSortableControl

Nette Control for http://mjsarfatti.com/sandbox/nestedSortable/

Demo - http://playground.acidclick.cz/nestedsortablecontrol/

## License

MIT

## Dependencies

jQuery 1.9

jQuery UI 1.10.2

nestedSortable jQuery Plugin 2.0

## Usage

### Basic

Copy NestedSortableControl.latte, NestedSortableControl.php to libs or components folder folder.

Copy jquery.acidclick.nestedSortableControl.js to js folder in document root.

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

### View 

```html
{block head}
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css">
	<style>
		ol.sortable li div{
			border:1px solid #666;
			background-color:whiteSmoke;
			padding:10px;
			margin:10px 0;
		}
	</style>
{/block}
{block scripts}
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script src="{$basePath}/js/jquery.mjs.nestedSortable.js"></script>
	<script src="{$basePath}/js/jquery.acidclick.nestedSortableControl.js"></script>
{/block}
{block content}
	{widget nestedSortableControl}
{/block}
```