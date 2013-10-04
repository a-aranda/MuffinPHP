<?php
/**
* Holding a instance of CMuffinPHP to enable use of $this in subclasses.
*
* @package MuffinPhp Core
*/
class CObject {

   /**
    * Members
    */
   public $config;
   public $request;
   public $data;
   public $db;
   

   /**
    * Constructor
    */
   protected function __construct() {
    $muff = CMuffinPHP::Instance();
    $this->config   = &$muff->config;
    $this->request  = &$muff->request;
    $this->data     = &$muff->data;
    $this->db       = &$muff->db;
  }

}