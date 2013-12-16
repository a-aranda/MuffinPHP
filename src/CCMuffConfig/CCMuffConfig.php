<?php 
/** 
* A blog controller to display a blog-like list of all content labelled as "post". 
* 
* @package MuffinPHP Core
*/ 
class CCMuffConfig extends CObject implements IController { 


/** 
* Constructor 
*/ 
public function __construct() { 
	parent::__construct(); 
} 

/** 
* Display all content of the type "post". 
*/ 
public function Index() { 
	// $form = new CFormDB($this);
	$this->views->SetTitle('Installation');
	$this->views->AddInclude(__DIR__ . '/index.tpl.php', array(
    
    // 'db_form'=>$form->GetHTML(),
   
  )); 
} 


public function DoDBCreate(){

	$username = $_POST['username'];
	$password = $_POST['password'];

	$this->RedirectToController();

}


}