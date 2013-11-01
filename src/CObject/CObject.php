<?php
/**
* Holding a instance of CMuffinPHP to enable use of $this in subclasses.
*
* @package MuffinPHP Core
*/
class CObject {

/**
* Members
*/
 protected $muff;
 public $config;
 public $request;
 public $data;
 public $db;
 public $views;
 public $session;
 protected $user;

/**
* Constructor
*/
 protected function __construct($muff=null) {
  
    if(!$muff) { 
      $muff = CMuffinPHP::Instance(); 
    } 
    
    $this->muff     = &$muff;
    $this->config   = &$muff->config;
    $this->request  = &$muff->request;
    $this->data     = &$muff->data;
    $this->db       = &$muff->db;
    $this->views    = &$muff->views;
    $this->session  = &$muff->session;
    $this->user = &$muff->user;
  }

/**
* Wrapper for same method in CLydia. See there for documentation.
*/
  protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    $this->muff->RedirectTo($urlOrController, $method, $arguments);
  }

/**
* Wrapper for same method in CLydia. See there for documentation.
*/
protected function RedirectToController($method=null, $arguments=null) {
    $this->muff->RedirectToController($method, $arguments);
}

/**
* Redirect to a controller and method. Uses RedirectTo().
*
* @param string controller name the controller or null for current controller.
* @param string method name the method, default is current method.
*/
protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
    $this->muff->RedirectToControllerMethod($controller, $method, $arguments);
}

/**
 * Save a message in the session. Uses $this->session->AddMessage()
 *
 * @param $type string the type of message, for example: notice, info, success, warning, error.
 * @param $message string the message.
 * @param $alternative string the message if the $type is set to false, defaults to null.
 */
protected function AddMessage($type, $message, $alternative=null) {
  return $this->muff->AddMessage($type, $message, $alternative);
}

/**
* Create an url. Uses $this->request->CreateUrl()
*
* @param $urlOrController string the relative url or the controller
* @param $method string the method to use, $url is then the controller or empty for current
* @param $arguments string the extra arguments to send to the method
*/
protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
  return $this->muff->CreateUrl($urlOrController, $method, $arguments);
}

}