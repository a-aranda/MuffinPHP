<?php 
/** 
* A form for creating a new user. 
* 
* @package MuffinPHP Core 
*/ 
class CFormGroupCreate extends CForm { 

/** 
* Constructor 
*/ 
public function __construct($object) { 
parent::__construct(); 
$this->AddElement(new CFormElementText('acronym', array('required'=>true))) 
->AddElement(new CFormElementText('name', array('required'=>true))) 
->AddElement(new CFormElementSubmit('create', array('callback'=>array($object, 'DoGroupCreate')))); 

$this->SetValidation('acronym', array('not_empty')) 
->SetValidation('name', array('not_empty'));
} 

}