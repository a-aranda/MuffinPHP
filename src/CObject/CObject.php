<?php
/**
* Holding a instance of CMuffinPHP to enable use of $this in subclasses.
*
* @package MuffinPHP Core
*/
class CObject {

   public $config;
   public $request;
   public $data;

   /**
    * Constructor
    */
   protected function __construct() {
    $muff = CMuffinPHP::Instance();
    $this->config   = &$muff->config;
    $this->request  = &$muff->request;
    $this->data     = &$muff->data;
  }

}