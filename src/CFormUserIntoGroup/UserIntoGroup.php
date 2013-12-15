<?php 
/** 
* A form for creating a new user. 
* 
* @package MuffinPHP Core 
*/ 
class CFormUserIntoGroup extends CForm { 

/** 
* Constructor 
*/ 
/** 
* Constructor 
*/ 
public function __construct($object, $userId) { 
parent::__construct(); 
$this->AddElement(new CFormElementHidden('id', array('value'=>$userId))) 
->AddElement(new CFormElementText('id', array('required'=>true)))  
->AddElement(new CFormElementSubmit('save', array('callback'=>array($object, 'DoUserIntoGroupSave')))); 
} 

}