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
	$form = new CFormDatabase($this);
	$form->Check();
	$this->views->SetTitle('Installation');
	$this->views->AddInclude(__DIR__ . '/index.tpl.php', array(
    	'db_form'=>$form->GetHTML(),
   
  )); 
} 

public function DoDBCreate(){

	// echo "<br><br><br><br><br><br>";
	// echo "This is the username:".$_POST['username']."<br>";
	// echo "This is the username:".$_POST['password']."<br>";
	// echo "This is the host:".$_POST['host']."<br>";
	// echo "This is the database:".$_POST['database']."<br>";

	//save this information...but where? not in the database :S
}


}