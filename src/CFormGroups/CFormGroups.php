<?php
/** 
* A form for editing the user profile. 
* 
* @package MuffinPHP Core
*/ 
class CFormGroups extends CForm { 

/** 
* Constructor 
*/ 
public function __construct($object, $group) { 
parent::__construct(); 
$this->AddElement(new CFormElementText('acronym', array('readonly'=>true, 'value'=>$group['acronym'])))
->AddElement(new CFormElementHidden('id', array('value'=>$group['id']))) 
->AddElement(new CFormElementText('name', array('value'=>$group['name'], 'required'=>true))) 
->AddElement(new CFormElementSubmit('save', array('callback'=>array($object, 'DoGroupSave')))); 
} 

}