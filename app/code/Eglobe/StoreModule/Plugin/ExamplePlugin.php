<?php

namespace Eglobe\StoreModule\Plugin;
class ExamplePlugin
{

	public function beforeSetTitle(\Eglobe\StoreModule\Controller\Index\Example $subject, $title)
	{
		echo "Setting Welcome text before Title<br>";
		$title = "<b>Welcome to</b> " .$title;
		// echo __METHOD__."</br>";
		return [$title];
		echo "<br>";
	}


	public function afterGetTitle(\Eglobe\StoreModule\Controller\Index\Example $subject, $result)
	{
		echo "<br>";
		// echo __METHOD__ . "</br>";
		echo "<br>After Appending text at End<br>";
		return '<h3>'. $result . 'Solutions' .'</h3>';

	}


	// public function aroundGetTitle(\Eglobe\StoreModule\Controller\Index\Example $subject, callable $proceed)
	// {

	// 	echo __METHOD__ . " - Before proceed() </br>";
	// 	 $result = $proceed();
	// 	echo __METHOD__ . " - After proceed() </br>";


	// 	return $result;
	// }

}