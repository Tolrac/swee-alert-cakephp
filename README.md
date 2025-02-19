# SweetAlertHelper plugin for CakePHP

# Requirements

- CakePHP 5.x

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require tolrac/cakephp-5-sweet-alert-helper
```

# Usage

In your `src/View/AppView.php`, put the helpers

```
public function initialize()
{
	...
	$this->loadHelper('SweetAlertHelper.Form');
	$this->loadHelper('SweetAlertHelper.Html');
	...
}
```

and in the template layout (or in the views), load the js file:

```
<?php
	...
	echo $this->Html->script('SweetAlertHelper.sweetalert2.min');
	...
?>
```

Then you can use the `confirm` option of

- `postLink` method of `FormHelper`
- `link` method of `HtmlHelper`
  to show a Sweet Alert at the place of a normal alert, with your message:

```
<?= $this->Html->link('home',['action'=>'display','home'],['confirm'=>'Etes-vous vraiment sûr ?']); ?>
<?= $this->Form->postLink('home',['action'=>'display','home'],['confirm'=>'Etes-vous vraiment sûr ?']) ?>
```
