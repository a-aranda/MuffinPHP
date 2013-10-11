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
   public $config;
   public $request;
   public $data;
   public $db;
   public $views;
   public $session;
   

   /**
    * Constructor
    */
   protected function __construct($muff=null) {
    
    if(!$muff) { 
      $muff = CMuffinPHP::Instance(); 
    } 
    
    $this->config   = &$muff->config;
    $this->request  = &$muff->request;
    $this->data     = &$muff->data;
    $this->db       = &$muff->db;
    $this->views    = &$muff->views;
    $this->session  = &$muff->session;
    $this->user = &$muff->user;
  }

  /**
   * Redirect to another url and store the session
   */
  protected function RedirectTo($urlOrController=null, $method=null) {
    $muff = CMuffinPHP::Instance();
    if(isset($muff->config['debug']['db-num-queries']) && $muff->config['debug']['db-num-queries'] && isset($muff->db)) {
      $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries());
    }    
    if(isset($muff->config['debug']['db-queries']) && $muff->config['debug']['db-queries'] && isset($muff->db)) {
      $this->session->SetFlash('database_queries', $this->db->GetQueries());
    }    
    if(isset($muff->config['debug']['timer']) && $muff->config['debug']['timer']) {
      $this->session->SetFlash('timer', $muff->timer);
    }    
    $this->session->StoreInSession();
    header('Location: ' . $this->request->CreateUrl($urlOrController, $method));
  }

  /**
   * Redirect to a method within the current controller. Defaults to index-method. Uses RedirectTo().
   *
   * @param string method name the method, default is index method.
   */
  protected function RedirectToController($method=null) {
    $this->RedirectTo($this->request->controller, $method);
  }


  /**
   * Redirect to a controller and method. Uses RedirectTo().
   *
   * @param string controller name the controller or null for current controller.
   * @param string method name the method, default is current method.
   */
  protected function RedirectToControllerMethod($controller=null, $method=null) {
    $controller = is_null($controller) ? $this->request->controller : null;
    $method = is_null($method) ? $this->request->method : null;   
    $this->RedirectTo($this->request->CreateUrl($controller, $method));
  }


}