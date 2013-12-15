<?php 
/** 
* A form for creating a new user. 
* 
* @package MuffinPHP Core 
*/ 
class CFormDeleteUserIntoGroup extends CForm { 

/** 
* Constructor 
*/ 
/** 
* Constructor 
*/ 
public function __construct($object, $userId) { 
parent::__construct(); 
$this->AddElement(new CFormElementHidden('userId', array('value'=>$userId))) 
->AddElement(new CFormElementText('groupId', array('required'=>true)))  
->AddElement(new CFormElementSubmit('save', array('callback'=>array($object, 'DoUserIntoGroupDelete')))); 
} 

}