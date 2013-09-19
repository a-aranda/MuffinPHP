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
	$muff->data['header'] = '<h1>Header: Lydia</h1>';
	$muff->data['main'] = "";
    $muff->data['footer'] = '<p>Alvaro Aranda on MuffinPHP</p>';
    $muff->data['title'] = "This is the title";
} 

}