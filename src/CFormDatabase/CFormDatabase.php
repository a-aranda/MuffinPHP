<?php
/**
* A form for saving database credentials.
* 
* @package MuffinPHP
*/
class CFormDatabase extends CForm {

/**
* Constructor
*/
public function __construct($object) {
parent::__construct();
$this->AddElement(new CFormElementText('host', array('required'=>true)))
     ->AddElement(new CFormElementText('database', array('required'=>true)))
     ->AddElement(new CFormElementText('username'))
     ->AddElement(new CFormElementPassword('password'))
     ->AddElement(new CFormElementSubmit('createdb', array('callback'=>array($object, 'DoDBCreate'))));
     
$this->SetValidation('host', array('not_empty'))
     ->SetValidation('database', array('not_empty'));
}
  
}