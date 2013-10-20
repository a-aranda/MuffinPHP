<?php 
/** 
* A test controller for themes. 
* 
* @package MuffinPHP Core
*/ 
class CCTheme extends CObject implements IController { 


/** 
* Constructor 
*/ 
public function __construct() { parent::__construct(); } 


/** 
* Display what can be done with this controller. 
*/ 
public function Index() { 
$this->views->SetTitle('Theme'); 
$this->views->AddInclude(__DIR__ . '/index.tpl.php', array( 
'theme_name' => $this->config['theme']['name'], 
)); 
} 


}