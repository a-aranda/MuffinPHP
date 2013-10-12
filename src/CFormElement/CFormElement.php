<?php 
/** 
* A utility class to easy creating and handling of forms 
* 
* @package MuffinPHP Core 
*/ 
class CFormElement implements ArrayAccess{ 

/** 
* Properties 
*/ 
public $attributes; 


/** 
* Constructor 
* 
* @param string name of the element. 
* @param array attributes to set to the element. Default is an empty array. 
*/ 
public function __construct($name, $attributes=array()) { 
$this->attributes = $attributes; 
$this['name'] = $name; 
} 


/** 
* Implementing ArrayAccess for this->attributes 
*/ 
public function offsetSet($offset, $value) { if (is_null($offset)) { $this->attributes[] = $value; } else { $this->attributes[$offset] = $value; }} 
public function offsetExists($offset) { return isset($this->attributes[$offset]); } 
public function offsetUnset($offset) { unset($this->attributes[$offset]); } 
public function offsetGet($offset) { return isset($this->attributes[$offset]) ? $this->attributes[$offset] : null; } 


/** 
* Get HTML code for a element. 
* 
* @returns HTML code for the element. 
*/ 
public function GetHTML() { 
$id = isset($this['id']) ? $this['id'] : 'form-element-' . $this['name']; 
$class = isset($this['class']) ? " class='{$this['class']}'" : null; 
$name = " name='{$this['name']}'"; 
$label = isset($this['label']) ? ($this['label'] . (isset($this['required']) && $this['required'] ? "<span class='form-element-required'>*</span>" : null)) : null; 
$autofocus = isset($this['autofocus']) && $this['autofocus'] ? " autofocus='autofocus'" : null; 
$readonly = isset($this['readonly']) && $this['readonly'] ? " readonly='readonly'" : null; 
$type = isset($this['type']) ? " type='{$this['type']}'" : null; 
$value = isset($this['value']) ? " value='{$this['value']}'" : null; 

if($type && $this['type'] == 'submit') { 
return "<p><input id='$id'{$type}{$class}{$name}{$value}{$autofocus}{$readonly} /></p>\n"; 
} else { 
return "<p><label for='$id'>$label</label><br><input id='$id'{$type}{$class}{$name}{$value}{$autofocus}{$readonly} /></p>\n"; 
} 
} 


/** 
* Use the element name as label if label is not set. 
*/ 
public function UseNameAsDefaultLabel() { 
if(!isset($this['label'])) { 
$this['label'] = ucfirst(strtolower(str_replace(array('-','_'), ' ', $this['name']))).':'; 
} 
} 


/** 
* Use the element name as value if value is not set. 
*/ 
public function UseNameAsDefaultValue() { 
if(!isset($this['value'])) { 
$this['value'] = ucfirst(strtolower(str_replace(array('-','_'), ' ', $this['name']))); 
} 
} 

}
