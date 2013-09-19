<?php 
/** 
* Standard controller layout. 
* 
* @package MuffinPHP Core
*/ 
class CCIndex implements IController { 

/** 
* Implementing interface IController. All controllers must have an index action. 
*/ 
public function Index() { 
	global $muff; 
	$muff->data['title'] = "The Index Controller"; 
} 

}